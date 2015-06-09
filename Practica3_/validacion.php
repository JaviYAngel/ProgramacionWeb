<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 7/06/15
 * Time: 17:00
 */

require_once("./conexion.php");
session_start();

$conexion = new conexion();

$dni = $_POST['dni'];
$pass = $_POST['pass1'];


$datos=$conexion->existeUsuario($dni);
//echo $datos[0][0];
//echo $datos[0][1];
if ($dni!="" && $pass!="") {
    if ($dni == $datos[0][1] && $pass == $datos[0][2]) {
        $_SESSION['usuario'] = $datos[0][0];
        $_SESSION['existeUsuario'] = "siUsuario";
        $_SESSION['login_vacio']=false;
        $_SESSION['tipo']=$datos[0][3];
        $_SESSION['dni']=$dni;
        header("Location: ./admin/index.php");
    } else {
        $_SESSION['existeUsuario'] = "noUsuario";
        $_SESSION['login_vacio']=false;
        header("Location: ./index03.php");
    }
}else{
    $_SESSION['login_vacio']=true;
    header("Location: ./index03.php");
}
