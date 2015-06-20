<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 10/06/15
 * Time: 14:03
 */

if($tipo=='admin'){
    require_once('colas_admin.php');
}elseif($tipo=='profesional'){
    require_once('colas_profesional.php');
}elseif($tipo=='cliente'){
    require_once('colas_cliente.php');
}
?>