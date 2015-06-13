<?php
    require_once('../conexion.php');
    $conexion = new conexion();
    session_start();

    $tipo=$_SESSION['tipo'];
    $active="active";
    //if(isset($_POST["dni"]))
    if(isset($_GET['class'])){
        $clase=$_GET['class'];
    }else{
        $clase="cola";
    }
?>

<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Panel de Administración de: <?php echo $tipo ?></title>

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
                            <a href="./modificarPerfil.php"><i class="fa fa-fw fa-user"></i>Modificar Perfil</a>
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
                            Dashboard <small>
                                <?php
                                if($tipo=="admin"){
                                    echo "Administrador";
                                }elseif($tipo=="profesional"){
                                    echo "Profesional";
                                }elseif($tipo=="cliente"){
                                    echo "Cliente";
                                }
                                ?>
                            </small>
                        </h1>
                        <ol class="breadcrumb">
                            <li class="active">
                                <i class="fa fa-dashboard"></i>
                                <?php
                                if($_GET['class']=="admin"){
                                    echo "Administrador";
                                }elseif($_GET['class']=="profesional"){
                                    echo "Profesional";
                                }elseif($_GET['class']=="cliente"){
                                    echo "Cliente";
                                }elseif($_GET['class']=="cola"){
                                    echo "Colas del ".$tipo;
                                }
                                ?>
                            </li>
                        </ol>
                    </div>
                </div>
                <!-- /.row -->


                <!-- /.row -->
                <?php
                if($clase=="cola"){
                    include_once("colas.php");
                }else{?>
                    <ul id="tabs" class="nav nav-tabs nav-justified">
                        <li class="active"><a href="#añadir" data-toggle="tab">Añadir</a></li>
                        <li><a href="#modificar" data-toggle="tab">Modificar</a></li>
                        <li><a href="#eliminar" data-toggle="tab">Eliminar</a></li>
                    </ul>
                    <div id="my-tab-content" class="tab-content">
                        <div class="tab-pane fade in active" id="añadir">
                            <?php
                            include_once("añadeUsuario.php");
                            ?>
                        </div>
                        <div class="tab-pane fade" id="modificar">
                            <?php
                            include_once("modificaUsuarios.php");
                            ?>
                        </div>
                        <div class="tab-pane fade" id="eliminar">
                            <?php
                            include_once("eliminaUsuario.php");
                            ?>
                        </div>
                    </div>
                            <?php
                            }
                            ?>

                <script type="text/javascript">

                </script>
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