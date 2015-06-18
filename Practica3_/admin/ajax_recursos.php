<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 16/06/15
 * Time: 19:51
 */
require_once('../conexion.php');
use \conexion;
session_start();
$conexion = new conexion();
sleep(1);

if($_POST['accion']=='add'){

    $cod = strtoupper($_POST['nombre']);
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $lugar = $_POST['lugar'];
    $hora = $_POST['fecha'];
    $profesional = $_POST['dni'];
    $tipo = $_SESSION['tipo'];
    $conexion->addRecurso($cod,$nombre,$descripcion,$lugar,$hora,$profesional);
    if($tipo='profesional') {
        $result = $conexion->selectRecurso($profesional);
        $long = count($result);
        for ($i = 0; $i < $long; $i++) {
            $option .= "<option value='" . $result[$i][0] . " '>" . $result[$i][0] . "</option>";
        }
    }else {
        $result = $conexion->selectRecurso();
        $long = count($result);
        for ($i = 0; $i < $long; $i++) {
            $option .= "<option value='" . $result[$i][0] . " '>" . $result[$i][0] . "</option>";
        }
    }
    echo $option;
}elseif($_POST['accion']=='modifica'){
    $cod = strtoupper($_POST['nombre']);
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $lugar = $_POST['lugar'];
    $hora = $_POST['fecha'];
    $profesional = $_SESSION['dni'];
    $tipo = $_SESSION['tipo'];
    $conexion->modificaRecurso($cod,$nombre,$descripcion,$lugar,$hora,$profesional);

    if($tipo='profesional'){
        $result = $conexion->selectRecursoProfesional($profesional);
        $long = count($result);
        for ($i = 0; $i < $long; $i++) {
            $option .= "<option value='" . $result[$i][0] . " '>" . $result[$i][0] . "</option>";
        }
    }else {
        $result = $conexion->selectRecurso();
        $long = count($result);
        for ($i = 0; $i < $long; $i++) {
            $option .= "<option value='" . $result[$i][0] . " '>" . $result[$i][0] . "</option>";
        }
    }
    echo $option;

}elseif($_POST['accion']=='elimina'){
    $cod = strtoupper($_POST['nombre']);

    $conexion->eliminaRecurso($cod);
    $tipo = $_SESSION['tipo'];
    if($tipo='profesional'){
        $result = $conexion->selectRecursoProfesional($profesional);
        $long = count($result);
        for ($i = 0; $i < $long; $i++) {
            $option .= "<option value='" . $result[$i][0] . " '>" . $result[$i][0] . "</option>";
        }
    }else {
        $result = $conexion->selectRecurso();
        $long = count($result);
        for ($i = 0; $i < $long; $i++) {
            $option .= "<option value='" . $result[$i][0] . " '>" . $result[$i][0] . "</option>";
        }
    }
    echo $option;
}