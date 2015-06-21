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
    if($tipo=='profesional') {
        $result = $conexion->selectRecursoProfesional($profesional);
        $long = count($result);
        for ($i = 0; $i < $long; $i++) {
            $option .= "<option value='" . $result[$i][0] . " '>" . $result[$i][0] . "</option>";
        }
    }else {
        $result1 = $conexion->selectRecurso();
        $long = count($result1);
        for ($i = 0; $i < $long; $i++) {
            $option .= "<option value='" . $result1[$i][0] . " '>" . $result1[$i][0] . "</option>";
        }
    }
    echo $option;
}elseif($_POST['accion']=='modifica'){
    $cod = strtoupper($_POST['nombre']);
    $nombre = $_POST['nombre'];
    $descripcion = $_POST['descripcion'];
    $lugar = $_POST['lugar'];
    $hora = $_POST['fecha'];
    $profesional = $_POST['dni'];
    $tipo = $_SESSION['tipo'];
    $conexion->modificaRecurso($cod,$nombre,$descripcion,$lugar,$hora,$profesional);

    if($tipo=='profesional'){
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
    $profesional = $_POST['dni'];

    if($tipo=='profesional'){
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
}elseif($_POST['accion']=='usuario'){
    $COD_ =strtoupper($_POST["cod"]);
    $datos = $conexion->getClientes($_POST['cod']);
    $long = count($datos);
    $table = '    <thead><tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Prioridad</th>
                    <th>Atender Cliente</th>
                    <th colspan="2">Subir y Bajar prioridad</th>
                  </tr></thead>';
    for ($i = 0; $i < $long; $i++) {
        $table .= '<tr>';
        $table .= '<td>'. $datos[$i][0] . '</td>';
        $table .= '<td>'. $datos[$i][1] . '</td>';
        $table .= '<td>'. $datos[$i][2] . '</td>';
        $table .= '<td><button id="botoneliminar" class="btn btn-success" aria-hidden="true" ><i class="glyphicon glyphicon-ok-circle"></i></button> </td>';
        $table .= '<td><button id="upPrioridad" class="btn btn-primary" aria-hidden="true" ><i class="glyphicon glyphicon-chevron-up"></i></button> </td>';
        $table .= '<td><button id="downPrioridad" class="btn btn-primary" aria-hidden="true"><i class="glyphicon glyphicon-chevron-down"></i></button> </td>';
        $table .= '</tr>';
    }
    echo $table;

}elseif($_POST['accion']=='unirseCola'){
    $prioridad = $conexion->getPrioridad2($_POST['cod']);
    $cod_cola = substr($_POST['cod'],0,3);
    $cod_cola .= $prioridad;
    echo $prioridad;
    $dni = $_POST['dni'];
    $cod = $_POST['cod'];
    $conexion->unirseaCola($dni,$cod,$prioridad,$cod_cola);



        $result = $conexion->getUsuariosenCola($_POST['dni']);
        $long = count($result);
    $option='';
        for ($i = 0; $i < $long; $i++) {
            $option .= "<option value='" . $result[$i][0] . " '>" . $result[$i][0] . "</option>";
        }
    echo $option;
}elseif($_POST['accion']=='eliminardelaCola'){

    $conexion->salirdeCola($_POST['dni'],$_POST['cod']);

    $result = $conexion->getUsuariosTiene($_POST['dni']);
    $long = count($result);
    $option='';
    for ($i = 0; $i < $long; $i++) {
        $option .= "<option value='" . $result[$i][0] . " '>" . $result[$i][0] . "</option>";
    }
    $resultado[0]=$option;
    echo $option;

}elseif($_POST['accion']=='quitardeCola'){

    $COD_ =strtoupper($_POST["cod"]);
    $conexion->atendido($_POST['dni'],$COD_);
    $datos = $conexion->getClientes($_POST['cod']);
    $long = count($datos);
    $table = '    <thead><tr>
                    <th>DNI</th>
                    <th>Nombre</th>
                    <th>Prioridad</th>
                    <th>Atender Cliente</th>
                    <th colspan="2">Subir y Bajar prioridad</th>
                  </tr></thead>';
    for ($i = 0; $i < $long; $i++) {
        $table .= '<tr>';
        $table .= '<td>'. $datos[$i][0] . '</td>';
        $table .= '<td>'. $datos[$i][1] . '</td>';
        $table .= '<td>'. $datos[$i][2] . '</td>';
        $table .= '<td><button id="botoneliminar" class="btn btn-success" aria-hidden="true" ><i class="glyphicon glyphicon-ok-circle"></i></button> </td>';
        $table .= '<td><button id="upPrioridad" class="btn btn-primary" aria-hidden="true" ><i class="glyphicon glyphicon-chevron-up"></i></button> </td>';
        $table .= '<td><button id="downPrioridad" class="btn btn-primary" aria-hidden="true" ><i class="glyphicon glyphicon-chevron-down"></i></button> </td>';
        $table .= '</tr>';
    }
    echo $table;

}