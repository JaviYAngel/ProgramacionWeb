<?php
    require_once('../conexion.php');
    $conexion = new conexion();
    session_start();

    $tipo=$_SESSION['tipo'];
    $active="active";
    $dni_profesional = $_SESSION['dni'];
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
    <script src="js/funciones_ajax.js"></script>


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
                        $datos=$con->existeUsuario($_SESSION['dni']);
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
<!--                            <li class="--><?php //if($_GET['class']=='cliente') echo $active;?><!--">-->
<!--                                <a href="./index.php?class=cliente"><i class="fa fa-fw fa-dashboard"></i>-->
<!--                                    Cliente</a>-->
<!--                            </li>-->
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
                    <script type="text/javascript">
                        //Funcion Elimina un usuario mediante AJAX
                        function eliminaUsuario(){
                            var dni = document.getElementById('dniElimina').value;
                            var elimina='elimina';
                            var clase = '<?php echo $clase;?>';
                            $.ajax({
                                type: 'POST',
                                data:('dni='+dni+'&ajax='+elimina+'&clase='+clase),
                                url:'ajax_eliminar.php',

                                beforeSend: function(){
                                    $('#resultadoElimina').html('Procesando, espere por favor...');
                                },
                                success:function (response){
                                    $('#resultadoElimina').html('<p class="text-success"><span class="label label-success">Success</span> Eliminado correctamente.</p>');
                                    $('#dniElimina').html(response);
                                    $('#dnimodifica').html(response);

                                }
                            });
                        }
                        //Funcion para añadir un usuario mediante AJAX.
                        function addUsuario(){
                            var dni = document.getElementById('dniAdd').value;
                            var nombre = document.getElementById('nombreAdd').value;
                            var pass = document.getElementById('passAdd').value;
                            var clase = '<?php echo $clase;?>';
                            <?php if($clase=='admin'){?>
                            var tipo_usuario = document.getElementById('tipo_usuario').value;
                            <?php
                            }else{?>
                            var tipo_usuario = '<?php echo $clase; ?>';
                            <?php
                            }
                            ?>
                            var add ='add';
                            $.ajax({
                                type: 'POST',
                                data:('ajax='+add+'&dni='+dni+'&nombre='+nombre+'&pass='+pass+'&tipo_usuario='+tipo_usuario+'&clase='+clase),
                                url:'ajax_eliminar.php',
                                beforeSend: function(){
                                    $('#resultadoModifica').html('Procesando, espere por favor...');

                                },
                                success:function (response){
                                    $('#resultadoModifica').html('<p class="text-success"><span class="label label-success">Success</span> Añadido correctamente.</p>');
                                    $('#dniElimina').html(response);
                                    $('#dnimodifica').html(response);
                                    document.getElementById('dniAdd').value='';
                                    document.getElementById('nombreAdd').value='';
                                    document.getElementById('passAdd').value='';
                                }
                            });
                        }
                        function modificaUsuario(){
                            var dni = document.getElementById('dnimodifica').value;
                            var nombre = document.getElementById('nombremodifica').value;
                            var pass = document.getElementById('passmodifica').value;
                            var clase = '<?php echo $clase;?>';
                            <?php if($clase=='admin'){?>
                            var tipo_usuario = document.getElementById('tipo_usuariomodifica').value;
                            <?php
                            }else{?>
                            var tipo_usuario = '<?php echo $clase; ?>';
                            <?php
                            }
                            ?>
                            var add ='modifica';
                            $.ajax({
                                type: 'POST',
                                data:('ajax='+add+'&dni='+dni+'&nombre='+nombre+'&pass='+pass+'&tipo_usuario='+tipo_usuario+'&clase='+clase),
                                url:'ajax_eliminar.php',
                                beforeSend: function(){
                                    $('#resultadoModifica1').html('Procesando, espere por favor...');

                                },
                                success:function (response){
                                    $('#resultadoModifica1').html('<p class="text-success"><span class="label label-success">Modificado correctamente</span> Modificado correctamente.</p>');
                                    $('#dnimodifica').html(response);
                                    $('#dniElimina').html(response);
                                    document.getElementById('nombremodifica').value='';
                                    document.getElementById('passmodifica').value='';
                                }
                            });
                        }

                    </script>

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
                            Bienvenidos a Consulta Doctor <small>
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
                                if($clase=="admin"){
                                    echo "Administrador";
                                }elseif($clase=="profesional"){
                                    echo "Profesional";
                                }elseif($clase=="cliente"){
                                    echo "Cliente";
                                }elseif($clase=="cola"){
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
                        <?php if($tipo == "admin") {

                            echo '<li class="active" ><a href = "#añadir" data-toggle="tab" > Añadir</a ></li>';
                        }?>
                        <li <?php if($tipo == "cliente" || $tipo =='profesional'){echo "class='active'";} ?> ><a href="#modificar" data-toggle="tab">Modificar</a></li>
                        <li><a href="#eliminar" data-toggle="tab">Eliminar</a></li>
                    </ul>
                    <div id="my-tab-content" class="tab-content ">
                        <div class="tab-pane fade <?php if($tipo == "admin"){echo "in active";} ?>" id="añadir">
                            <?php
                            include_once("añadeUsuario.php");
                            ?>
                        </div>
                        <div class="tab-pane fade  <?php if($tipo == "cliente" || $tipo =='profesional'){echo "in active";} ?>" id="modificar">
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