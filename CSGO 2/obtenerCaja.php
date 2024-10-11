<?php

function obtencionObjeto($pdo) {
    $sql = "select * from cajas";
    $resultado = $pdo->query($sql);
    return $resultado->fechALL(PDO::FETCH_ASSOC);

}


?>