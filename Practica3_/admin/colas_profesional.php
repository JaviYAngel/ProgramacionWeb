<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 18/06/15
 * Time: 21:32
 */
?>

<ul id="tabs" class="nav nav-tabs nav-justified" xmlns="http://www.w3.org/1999/html">
    <li class="active"><a href="#Colas" data-toggle="tab">Mis Colas</a></li>
    <li><a href="#añadir" data-toggle="tab">Añadir</a></li>
    <li><a href="#modificar" data-toggle="tab">Modificar</a></li>
    <li><a href="#eliminar" data-toggle="tab">Eliminar</a></li>

</ul>
<div id="my-tab-content" class="tab-content">
    <div class="tab-pane fade in active" id="Colas">
        <form class="form-inline" ">
            <div class="form-group col-sm-7 col-sm-offset-3 center">
                <label for="cola" class=" control-label">Nombre Recurso</label>
<!--                <div class="col-sm-4">-->
                    <select class="form-control " name="dni" id="colaSelect">
                        <?php

                        $result = $conexion->selectRecursoProfesional($_SESSION['dni']);
                        $long=count($result);
                        for($i=0;$i<$long;$i++) {
                            echo "<option value='". $result[$i][0] ." '>" . $result[$i][0] . "</option>";
                        }
                        ?>
                    </select>
                    <button id="mostrarUsuarios" type="button" class=" btn btn-primary " value="Nuevo"/>Mostrar Usuarios en cola</button>
<!--                </div>-->
            </div>
        <script type="application/javascript">
            $('#mostrarUsuarios').on('click',function(){
                muestraUsuarios();
            });

        </script>
        </form>
        <table id="tablaUsuarios" class="table-responsive table-hover table">

        </table>
        <script>

        </script>
    </div>
    <div class="tab-pane fade " id="añadir">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Colas usuario.</h3>
            </div>
            <form action="index.php" class="form-horizontal" method="post">
                <div class="form-group">
                    <label for="nombreCola" class="col-sm-3 control-label">Nombre Recurso</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="nombreCola"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="descripcion" class="col-sm-3 control-label">Descripción</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="descripcion"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="lugar" class="col-sm-3 control-label">Lugar</label>
                    <div class="col-sm-4">
                        <input type="text" class="form-control" id="lugar"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fecha" class="col-sm-3 control-label">Fecha de Inicio</label>
                    <div class='col-sm-4' id='date'>
                        <input type='date' class="form-control" id="fecha"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-3 col-sm-offset-3">
                        <button id="nuevoRecurso" type="button" class=" btn btn-primary" value="Nuevo"/>Nuevo</button>
                    </div>

                    <script type="application/javascript">
                        //añade funcionalidad al boton por JQUERY cuando clicamos en él
                        $('#nuevoRecurso').on('click',function(){
                            var data = '<?php echo $dni_profesional; ?>';
                            añadeRecurso(data);
                        });
                    </script>
                    <div class="form-group col-sm-3 " id="recursoSucces">

                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="tab-pane fade" id="modificar">
        <form action="index.php" class="form-horizontal" method="post">
            <div class="form-group ">
                <label for="nombreCola" class="col-sm-3 control-label">Nombre Recurso</label>
                <div class="col-sm-4">
                    <select class="form-control " name="dni" id="recursoModifica">
                        <?php

                        $result = $conexion->selectRecursoProfesional($_SESSION['dni']);
                        $long=count($result);
                        for($i=0;$i<$long;$i++) {
                            echo "<option value='". $result[$i][0] ." '>" . $result[$i][0] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <label for="descripcion" class="col-sm-3 control-label">Descripción</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="descripcionModifica"/>
                </div>
            </div>
            <div class="form-group">
                <label for="lugar" class="col-sm-3 control-label">Lugar</label>
                <div class="col-sm-4">
                    <input type="text" class="form-control" id="lugarmodifica"/>
                </div>
            </div>
            <div class="form-group">
                <label for="fecha" class="col-sm-3 control-label">Fecha de Inicio</label>
                <div class='col-sm-4' id='date'>
                    <input type='date' class="form-control" id="fechamodifica"/>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 col-sm-offset-3">
                    <button id="modificaRecurso" type="button" class=" btn btn-primary" value="Modifica"/>Modifica</button>
                </div>

                <script type="application/javascript">
                    //añade funcionalidad al boton por JQUERY cuando clicamos en él
                    $('#modificaRecurso').on('click',function(){
                        var data = <?php echo $dni_profesional; ?>;
                        modificaRecurso(data);
                    });
                </script>
                <div class="form-group col-sm-3 " id="recursoSuccesModifica">
                </div>
            </div>
        </form>
    </div>
    <div class="tab-pane fade" id="eliminar">
        <form action="index.php" class="form-horizontal" method="post">
            <div class="form-group ">
                <label for="nombreCola" class="col-sm-3 control-label">Nombre Recurso</label>
                <div class="col-sm-4">
                    <select class="form-control " name="dni" id="recursoElimina">
                        <?php

                        $result = $conexion->selectRecursoProfesional($_SESSION['dni']);
                        $long=count($result);
                        for($i=0;$i<$long;$i++) {
                            echo "<option value='". $result[$i][0] ." '>" . $result[$i][0] . "</option>";
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group">
                <div class="col-sm-3 col-sm-offset-3">
                    <button id="eliminaRecurso" type="button" class=" btn btn-primary" value="Elimina"/>Elimina</button>
                </div>
            </div>
            <script type="application/javascript">
                //añade funcionalidad al boton por JQUERY cuando clicamos en él
                $('#eliminaRecurso').on('click',function(){
                    var data = '<?php echo $dni_profesional; ?>';
                    eliminaRecurso(data);
                });
            </script>
            <div class="form-group col-sm-3 " id="recursoSuccesElimina">
            </div>
        </form>
    </div>
</div>