<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 13/06/15
 * Time: 19:12
 */

require_once('../conexion.php');

$conexion = new conexion();
sleep(2);
if ($_POST['ajax']=='elimina') {
    $resul = $conexion->eliminaUsuario($_POST['dni']);
    echo "Eliminado correctamente.";
}elseif($_POST['ajax']=='add'){
    $resul = $conexion->addUsuario($_POST['dni'],$_POST['nombre'],$_POST['pass'],$_POST['tipo_usuario']);
    echo "Añadido correctamente.";
}

