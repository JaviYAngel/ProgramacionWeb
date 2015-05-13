<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 13/05/15
 * Time: 16:05
 */

require_once("../modelo/administrador.php");
require_once("../modelo/profesional.php");
require_once("../modelo/cliente.php");

$admin = new administrador();
$profesional = new cliente();
$cliente = new cliente();



require_once("../vista/profesional.php");