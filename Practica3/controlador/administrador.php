<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 13/05/15
 * Time: 16:05
 */

require_once("../modelo/usuarios.php");

$admin = new administrador();
$profesional = new profesional();
$cliente = new cliente();

$lista_clientes = $cliente->getClientes();











require_once("../vista/profesional.php");