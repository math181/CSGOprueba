<?php
function aperturaCaja($pdo, $id_caja) {
   
    $sql_posibilidades = "SELECT rareza, probabilidad FROM posibilidades WHERE id_caja = :id_caja";
    $probabilidad = $pdo->prepare($sql_posibilidades);
    $probabilidad->execute(['id_caja' => $id_caja]);
    $probabilidades = $probabilidad->fetchAll(PDO::FETCH_ASSOC);


    $suerte = mt_rand(1, 100);
    $rareza_seleccionada = '';
    $acumulador = 0;

    foreach ($probabilidades as $fila) {
        $acumulador += $fila['probabilidad'];
        if ($suerte <= $acumulador) {
            $rareza_seleccionada = $fila['rareza'];
            break;
        }
    }

    $sql_objeto = "SELECT * FROM objetos WHERE id_caja = :id_caja AND rareza = :rareza ORDER BY RAND() LIMIT 1";
    $stmt = $pdo->prepare($sql_objeto);
    $stmt->execute(['id_caja' => $id_caja, 'rareza' => $rareza_seleccionada]);
    $objeto = $stmt->fetch(PDO::FETCH_ASSOC);

    return $objeto;
}
?>

  

?>
