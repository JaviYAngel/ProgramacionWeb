<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 21/06/15
 * Time: 20:07
 */

require_once('../conexion.php');
use \conexion;
$conexion = new conexion();
sleep(1);

if($_POST['accion']=='visualizacion'){

$datos = $conexion->visualizacion();

    $table = '    <thead><tr>
                    <th>Codigo del cliente</th>
                    <th>Lugar</th>
                  </tr></thead>';

    $long = count($datos);
    for ($i = 0; $i < $long; $i++) {
        $table .= '<tr>';
        $table .= '<td>'. $datos[$i][0] . '</td>';
        $table .= '<td>'. $datos[$i][1] . '</td>';
        $table .= '</tr>';
    }
    echo $table;
}