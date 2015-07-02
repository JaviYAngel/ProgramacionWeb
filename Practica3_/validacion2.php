<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 2/07/15
 * Time: 21:01
 */

require_once('./conexion.php');
$con = new conexion();
sleep(1);
if (isset($_POST)) {
    $res = $con->setClientes(array($_POST['dni'], $_POST['nombre'],$_POST['pass']));

    echo "Cliente añadido correctamente";
} else {
    echo 'No se ha podido completar el proceso.';
}
