<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 13/05/15
 * Time: 16:05
 */

require_once("../modelo/conexion.php");

$admin = new usuarios();

$dni=$_POST['dni'];

$aux = $admin->existeUsuario($dni);
//Si el usuario existe
if(isset($aux)){
    $usuario = $aux[0]['nombre'];
}
if(isset($_POST['nombre'])) {
    $admin->setClientes(array($_POST['dni'], $_POST['nombre'],
        $_POST['pass']));
}
$_SESSION['usuario']=$usuario;
//variables que le pasamos a la admin

if(isset($_SESSION['usuario'])){

}

if($aux[0]['tipo_usuario']=="admin"){
    $titulo='Panel de Administración';
    $tipo = 'admin';
}elseif($aux[0]['tipo_usuario']=='profesional'){
    $titulo = 'Profesional';
    $tipo = 'profesional';
}elseif($aux[0]['tipo_usuario']=='cliente'){
    $titulo = 'Clientes';
    $tipo = 'clientes';
}else{
    $titulo = 'Aplicacion de Tickets';
}
require_once("../vista/admin.php");