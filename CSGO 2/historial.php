<?php
function historial($pdo, $id_usuario, $id_caja, $id_objeto) {
    $sql = "INSERT INTO simulaciones (id_usuario, id_caja, id_objeto) VALUES (:id_usuario, :id_caja, :id_objeto)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id_usuario' => $id_usuario,
        'id_caja' => $id_caja,
        'id_objeto' => $id_objeto
    ]);
}
?>