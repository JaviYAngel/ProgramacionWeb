<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 13/06/15
 * Time: 19:12
 */

require_once('../conexion.php');

$conexion = new conexion();
sleep(1);



$option ='';



if ($_POST['ajax']=='elimina') {
    $resul = $conexion->eliminaUsuario($_POST['dni']);
    //echo "Eliminado correctamente.";

    $result = $conexion->selectUsuarios($_POST['clase']);
    $long=count($result);
    for($i=0;$i<$long;$i++) {
        $option .=  "<option value='" . $result[$i][0] . " '>" . $result[$i][0] . "</option>";

        //echo 'por aqui';
    }
        //$resultado = array("Eliminado correctamente.", $option);
        echo $option;

}elseif($_POST['ajax']=='add'){
    $resul = $conexion->addUsuario($_POST['dni'],$_POST['nombre'],$_POST['pass'],$_POST['tipo_usuario']);

    $result = $conexion->selectUsuarios($_POST['clase']);
    $long=count($result);
    for($i=0;$i<$long;$i++) {
        $option .=  "<option value='" . $result[$i][0] . " '>" . $result[$i][0] . "</option>";

        //echo 'por aqui';
    }
    echo $option;
    //echo 'Añadido correctamente.';
}elseif($_POST['ajax']=='modifica'){
    $conexion->modificaUsuario($_POST['dni'],$_POST['nombre'],$_POST['pass'],$_POST['tipo_usuario']);
    $result = $conexion->selectUsuarios($_POST['clase']);
    $long=count($result);
    for($i=0;$i<$long;$i++) {
        $option .=  "<option value='" . $result[$i][0] . "'>" . $result[$i][0] . "</option>";

        //echo 'por aqui';
    }
    echo $option;
}

