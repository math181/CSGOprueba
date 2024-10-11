<?php

require_once 'conexion.php';
require_once 'funciones.php';


$id_caja = $_POST['id_caja'];
$id_usuario = 1; 


$objeto = abrirCaja($pdo, $id_caja);


registrarSimulacion($pdo, $id_usuario, $id_caja, $objeto['id_objeto']);


echo "Has obtenido: " . $objeto['nombre_objeto'] . " (" . $objeto['rareza'] . ")";
?>
