<!DOCTYPE html>
<html>
<head lang="es">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">


    <title>Colas del Hospital</title>

    <!-- Bootstrap Core CSS -->
    <link href="./css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom CSS -->
    <link href="./css/sb-admin.css" rel="stylesheet">

    <!-- Morris Charts CSS -->
    <!--<link href="css/plugins/morris.css" rel="stylesheet">

    <!-- Custom Fonts -->
    <link href="./font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <script src="http://code.jquery.com/jquery-2.1.1.min.js"></script>

    <script src="js/funciones_visualizacion.js"></script>


</head>
<body>




    <!-- Barra de Navegacion -->
    <nav class="navbar navbar-inverse navbar-fixed-top" role="navigation">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">

            <a class="navbar-brand" href="index.php">Panel de Visualización de Colas del Hospital</a>
        </div>
        <!-- Top Menu Items -->


    </nav>

    <div id="page-wrapper">

        <div class="container-fluid">

            <!-- Page Heading -->
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">
                        Consulta Doctor <small>Espere su turno para ser atendido</small>
                    </h1>
                </div>
            </div>
            <!-- /.row -->



            <div class="row">
                <div class="col-lg-3">

                </div>

                <div class="col-lg-6">
                    <div class="panel panel-default">

                        <div class="panel-body">
                            <div class="table-responsive">
                                <table id="tablaVisualizacion" class="table table-bordered table-hover table-striped">
                                    <thead>
                                    <tr>
                                        <th>Codigo de cliente</th>
                                        <th>Lugar</th>
                                    </tr>
                                    </thead>
                                    <tbody>
                                    </tbody>
                                </table>
                            </div>
                            <div class="text-left">
                                <p> Informacion auxiliar </p>
                                <div class="panel panel-default">
                                    <div class="panel-body">

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-2">

                </div>

            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </div>
    <!-- /#page-wrapper -->










<!-- jQuery <script src="./js/jquery.js"></script>-->

<!-- Validacion  -->
<script src="./js/jquery.validate.min.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="./js/bootstrap.min.js"></script>
</body>
</html>