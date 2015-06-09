<?php
require_once('../conexion.php');
$conexion = new conexion();
session_start();

$tipo=$_SESSION['tipo'];
$active="active";

?>

<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Modificar perfil</title>

    <!-- Bootstrap Core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./css/sb-admin.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
</head>
<body>
    <div id="wrapper">

        <!-- Barra de Navegacion -->
        <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-ex1-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="index.php">Panel de Administración</a>
            </div>
            <!-- Top Menu Items -->
            <ul class="nav navbar-right top-nav">
                <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-user">
                        </i> <?php
                        require_once('../conexion.php');
                        $con = new conexion();
                        $datos=$con->existeUsuario($_POST['dni']);
                        echo $_SESSION['usuario'];


                        ?> <b class="caret"></b></a>
                    <ul class="dropdown-menu">
                        <li>
                            <a href="#"><i class="fa fa-fw fa-user"></i>Modificar Perfil</a>
                        </li>
                        <li class="divider"></li>
                        <li>
                            <a href="../index03.php"><i class="fa fa-fw fa-power-off"></i> Log Out<?php $_SESSION['existeUsuario']=false; ?></a>
                        </li>
                    </ul>
                </li>
            </ul>
            <!-- Sidebar Menu Items - These collapse to the responsive navigation menu on small screens -->
            <div class="collapse navbar-collapse navbar-ex1-collapse">
                <ul class="nav navbar-nav side-nav">
                    <?php
                    //tipo cliente
                    if($tipo == "cliente") {
                        ?>

                        <li class="<?php if($_GET['class']=='cliente') echo $active;?>">
                            <a href="./index.php?class=cliente"><i class="fa fa-fw fa-dashboard"></i>
                                Cliente</a>
                        </li>
                        <li class="<?php if($_GET['class']=='cola') echo $active;?>">
                            <a href="./index.php?class=cola"><i class="fa fa-fw fa-wrench"></i> Colas</a>
                        </li>
                    <?php
                    }
                    //tipo Profesional
                    if($tipo == "profesional"){
                        ?>
                        <li class="<?php if($_GET['class']=='cliente') echo $active;?>">
                            <a href="./index.php?class=cliente"><i class="fa fa-fw fa-dashboard"></i>
                                Cliente</a>
                        </li>
                        <li class="<?php if($_GET['class']=='profesional') echo $active;?>">
                            <a href="./index.php?class=profesional"><i class="fa fa-fw fa-edit"></i> Profesional</a>
                        </li>
                        <li class="<?php if($_GET['class']=='cola') echo $active;?>">
                            <a href="./index.php?class=cola"><i class="fa fa-fw fa-wrench"></i> Colas</a>
                        </li>
                    <?php
                    }
                    //tipo Administrador
                    if($tipo == "admin") {

                        ?>
                        <li class="<?php if($_GET['class']=='cliente') echo $active;?>">
                            <a href="./index.php?class=cliente"><i class="fa fa-fw fa-dashboard"></i>
                                Cliente</a>
                        </li>
                        <li class="<?php if($_GET['class']=='profesional') echo $active;?>">
                            <a href="./index.php?class=profesional"><i class="fa fa-fw fa-edit"></i> Profesional</a>
                        </li>
                        <li class="<?php if($_GET['class']=='admin') echo $active;?>">
                            <a href="./index.php?class=admin"><i class="fa fa-fw fa-desktop"></i>
                                Administrador</a>
                        </li>
                        <li class="<?php if($_GET['class']=='cola') echo $active;?>">
                            <a href="./index.php?class=cola"><i class="fa fa-fw fa-wrench"></i> Colas</a>
                        </li>
                    <?php
                    }
                    ?>

                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </nav>

        <div id="page-wrapper">

            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="row">
                    <div class="col-lg-12">
                        <h1 class="page-header">
                            Datos <small>Modificación Usuario</small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i> datos de usuario
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->



                <div class="row">
                    <div class="col-lg-1">

                    </div>

                    <div class="col-lg-10">
                        <div class="panel panel-default">
                            <div class="panel-heading">
                                <h3 class="panel-title"><i class="fa fa-money fa-fw"></i> Datos de Usuario</h3>
                            </div>

                            <?php
                            if(isset($_SESSION)) {
                                $datos=$conexion->existeUsuario($_SESSION['dni']);
                            }
                            echo 'hola'. $_SESSION['dni'];
                            if(isset($_POST['nombre'])){
                                $conexion->updateUsuarios(array($_SESSION['dni'],$_POST['nombre'],$_POST['pass']));
                                $datos=$conexion->existeUsuario($_SESSION['dni']);
                                $_SESSION['dni']=$datos[0][0];
                            }
                            ?>
                            <div class="panel-body">
                                <form action="modificarPerfil.php" class="form-horizontal" method="post">
                                    <div class="form-group">
                                        <label for="dni" class="col-sm-2 control-label">DNI</label>
                                        <div class="col-sm-7">
                                            <input name="dni" type="text" class="form-control" id="dni" placeholder="<?php echo $datos[0][1] ?>" disabled value="<?php echo $datos[0][1] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                                        <div class="col-sm-7">
                                            <input name="nombre" type="text" class="form-control" id="nombre" placeholder="<?php echo $datos[0][0] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="pass" class="col-sm-2 control-label">Nombre</label>
                                        <div class="col-sm-7">
                                            <input name="pass" type="password" class="form-control" id="pass" placeholder="Pass">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="tipo_usuario" class="col-sm-2 control-label">Tipo Usuario</label>
                                        <div class="col-sm-2">
                                            <select class="form-control ">
                                                <option>cliente</option>
                                                <option>admin</option>
                                                <option>profesional</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <div class="col-sm-offset-2 col-sm-10">
                                            <button type="submit" class="btn btn-primary">Guardar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.row -->

            </div>
            <!-- /.container-fluid -->

        </div>
        <!-- /#page-wrapper -->

    </div>
    <!-- /#wrapper -->







<!-- jQuery <script src="./js/jquery.js"></script>-->

<!-- Validacion  -->
<script src="./js/jquery.validate.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="./js/bootstrap.min.js"></script>
</body>
</html>