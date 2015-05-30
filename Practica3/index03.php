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
    <link href="vista/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="vista/css/estilo03.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="vista/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Framework CSS Material Desing -->
    <link href="vista/css/materialize.min.css" rel="stylesheet" type="text/css">

</head>

<body class="cyan lighten-5">
   <main>
    <nav class="cyan">


    </nav>


    <div class="container">
        <div class="row">
            <div class="col s10 offset-s1">
                <div class="section">
                    <h3>Bienvenido a la aplicación de tickets</h3>
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
                            <form class="col s12" action="controlador/administrador.php" method="post">
                                <div class="row">
                                    <div class="input-field col s10">
                                        <input name="nombre" id="nombre" type="text" class="validate">
                                        <label for="nombre">Nombre</label>
                                    </div>
                                    <div class="input-field col s10">
                                        <input name="dni" id="dni" type="text" class="validate">
                                        <label for="dni">Dni</label>
                                    </div>
                                    <div class="input-field col s10">
                                        <input name="pass" id="pass" type="password" class="validate">
                                        <label for="pass">Contraseña</label>
                                    </div>
                                    <div class="col offset-s1 s8">
                                        <button class="btn waves-effect waves-light cyan" type="submit" name="action">Enviar
                                            <i class="mdi-content-send right"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                            <br/>
                        </div>
                    </li>
                    <li>
                        <div class="collapsible-header cyan lighten-2"><i class="mdi-maps-place"></i>LogIn</div>
                        <div class="collapsible-body cyan lighten-4">
                            <form class="col s12" action="controlador/administrador.php" method="post">
                                <div class="row">
                                    <div class="input-field col s6">
                                        <input name="dni" id="dni" type="text" class="validate">
                                        <label for="dni">Dni</label>
                                    </div>
                                    <div class="input-field col s6">
                                        <input name="pass" id="pass" type="password" class="validate">
                                        <label for="pass">Contraseña</label>

                                    </div>
                                    <div class="col offset-s2 s8">
                                        <button class="btn waves-effect waves-light cyan" type="submit" name="action">Enviar
                                            <i class="mdi-content-send "></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>
                </ul>
            </div>
            <div class="col s4"><br/></div>
        </div>

    </div>
   </main>
    <footer class="page-footer cyan lighten-2">
        <div class="container">
            <div class="row">
                <div class="col l6 s12">
                    <h5 class="white-text">Cola de tickets</h5>
                    <p class="cyan-text text-lighten-4">Aplicación creada para la asignatura de Programación Web</p>
                </div>

            </div>

        </div>
    </footer>



    <!-- jQuery -->
    <script src="vista/js/jquery.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="vista/js/bootstrap.min.js"></script>
    <script src="vista/js/materialize.min.js"></script>
<script>
    $(".button-collapse").sideNav();
    $(".button-collapse").sideNav({
            menuWidth: 300, // Default is 240
            edge: 'left', // Choose the horizontal origin
            closeOnClick: true // Closes side-nav on <a> clicks, useful for Angular/Meteor
        }
    );
</script>
</body>
</html>