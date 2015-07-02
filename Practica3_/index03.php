<?php
    session_start();
    if(!isset($_SESSION['existeUsuario'])){$_SESSION['existeUsuario']="vacio";}

?>


<!DOCTYPE html>
<html lang="es">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Bienvenido a Nuestra Aplicacion de Tickets</title>

    <!-- Bootstrap Core CSS -->
    <link href="admin/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="estilo03.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="admin/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Framework CSS Material Desing -->
    <link href="admin/css/materialize.min.css" rel="stylesheet" type="text/css">

    <!--<script src="admin/js/jquery.js"></script> -->
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>
    <!-- validacion a traves de Jquery-->
    <script type="text/javascript" src="ejercicio03.js"></script>

    <!-- Validacion  -->
    <script type="text/javascript" src="./admin/js/jquery.validate.min.js"></script>

    <script type="text/javascript" src="./admin/js/additional-methods.min.js"></script>

</head>

<body class="cyan lighten-5">
   <main>
    <nav class="cyan">


    </nav>


    <div class="container">
        <div class="row">
            <div class="col s10 offset-s1">
                <div class="section">
                    <h3>Bienvenido a Consulta Doctor</h3>
                    <div class="divider"></div>
                </div>
            </div>
        </div>


        <div class="row">
            <div class="col s4 "></div>
            <div class="col offset-s4 s4 offset-m4 m4">
                <ul class="collapsible popout" data-collapsible="accordion">
                    <li>
                        <div class="collapsible-header cyan lighten-2"><i class="mdi-action-perm-identity"></i>Registrarse como cliente</div>
                        <div class="collapsible-body cyan lighten-4">
                            <br/>
                            <?php
//                                require_once('./conexion.php');
//                                $con = new conexion();
//                                if(isset($_POST['nombre'])) {
//                                    $res = $con->setClientes(array($_POST['dni'], $_POST['nombre'],
//                                        $_POST['pass']));
//                                }
                            ?>
                            <form id="form1" class="col s12" action="" method="post">
                                <div id="groupDiv" class="row">
                                    <div class="input-field col s10" id="nombre">
                                        <input name="nombre" id="nombre" type="text" class="validate" required data-toggle="tooltip" data-placement="right">
                                        <label for="nombre"  >Nombre</label>

                                    </div>
                                    <div class="input-field col s10">
                                        <input name="dni" id="dni" type="text" class="validate" required>
                                        <label for="dni" required>Dni</label>
                                    </div>
                                    <div class="input-field col s10">
                                        <input name="pass" id="pass" type="password" class="validate" required>
                                        <label for="pass" required >Contraseña</label>
                                    </div>
                                    <div class="col offset-s1 s8">
                                        <button class="btn waves-effect waves-light cyan" type="submit" name="action" onclick="setCliente()">Enviar
                                            <i class="mdi-content-send right"></i>
                                        </button>

                                        <script type="text/javascript">
                                          function setCliente() {
                                              var nombre = $('#nombre').val();
                                              var dni = $('#dni').val();
                                              var pass = $('#pass').val();

                                              $.ajax({
                                                  type: 'POST',
                                                  data: ('snombre=' + nombre + '&dni=' + dni + '&pass=' + pass),
                                                  url: 'validacion2.php',

                                                  beforeSend: function () {
                                                      $('h5#resultado').html('Procesando, espere por favor...');
                                                  },
                                                  success: function (response) {
                                                      $('h5#resultado').html(response);
                                                  }
                                              });
                                              return false;
                                          }
                                        </script>


                                    </div>
                                </div>
                            </form>
                            <br/>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header cyan lighten-2"><i class="mdi-maps-place"></i>LogIn</div>
                        <div class="collapsible-body cyan lighten-4">
                            <form id="form1" class="col s12" action="validacion.php" method="post">
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input name="dni" id="dni2" type="text" class="validate">
                                        <label for="dni">Dni</label>

                                    </div>
                                    <div class="input-field col s6">
                                        <input name="pass1" id="pass2" type="password" class="validate">
                                        <label for="pass1">Contraseña</label>

                                    </div>
                                    <div class="col offset-s2 s8">
                                        <button class="btn waves-effect waves-light cyan" type="submit" name="action" >Enviar
                                            <i class="mdi-content-send " ></i>
                                        </button>
                                    </div>
                                    <div id="final">
                                        <?php

                                        ?>
                                    </div>
                                </div>

                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col s4"><br/></div>
        </div>
    <h5 id="resultado"><?php

            if(isset($_POST["dni"])){
                echo "Cliente registrado correctamente";
            }elseif($_SESSION['login_vacio']==true ){
                echo "Campos vacíos.";
            }elseif($_SESSION['existeUsuario']=="vacio"){

            }elseif($_SESSION['existeUsuario']=="noUsuario"){
            echo "Contraseña o usuario inválidos.";}?>
    </h5>

    </div>
   </main>
    <footer class="page-footer cyan lighten-2">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text"><a href="index03.php">Cola de tickets</a></h5>
                    <p class="cyan-text text-lighten-4">Aplicación creada para la asignatura de Programación Web</p>
                </div>

            </div>

        </div>
    </footer>


    <!-- jQuery -->

    <!-- Bootstrap Core JavaScript -->
    <script src="admin/js/bootstrap.min.js"></script>
    <script src="admin/js/materialize.min.js"></script>
<script>
    //$(".button-collapse").sideNav();
    $(".button-collapse").sideNav({
            menuWidth: 300, // Default is 240
            edge: 'left', // Choose the horizontal origin
            closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
        }
    );




</script>
</body>
</html>