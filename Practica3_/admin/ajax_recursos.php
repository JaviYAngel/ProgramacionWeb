<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 16/06/15
 * Time: 19:51
 */
require_once('../conexion.php');
use \conexion;
$conexion = new conexion();
sleep(1);

if($_POST['accion']=='add'){

    $cod = strtoupper($_POST['nombre']);
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $lugar = $_POST['lugar'];
    $hora = $_POST['fecha'];

    $conexion->addRecurso($cod,$nombre,$descripcion,$lugar,$hora);

    $result = $conexion->selectRecurso($cod);
    $long=count($result);
    for($i=0;$i<$long;$i++) {
        $option .=  "<option value='" . $result[$i][0] . " '>" . $result[$i][0] . "</option>";
    }
    echo $option;
}