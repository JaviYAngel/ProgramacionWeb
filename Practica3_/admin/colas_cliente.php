<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 20/06/15
 * Time: 19:18
 */
?>

<ul id="tabs" class="nav nav-tabs nav-justified" xmlns="http://www.w3.org/1999/html">
    <li class="active"><a href="#añadir" data-toggle="tab">Añadir</a></li>
    <li><a href="#eliminar" data-toggle="tab">Eliminar</a></li>
</ul>

<div id="my-tab-content" class="tab-content">
    <div class="tab-pane fade in active" id="añadir">
        <div class="panel panel-default col-sm-offset-2 col-sm-8">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Darse de alta en una cola.</h3>
            </div>
            <form action="index.php" class="form-horizontal" method="post">
                <div class="form-group ">
                    <label for="AñadeArecurso" class="col-sm-3 control-label">Nombre Recurso</label>
                    <div class="col-sm-4">
                        <select class="form-control " name="dni" id="AñadeArecurso">
                            <?php

                            $result = $conexion->selectRecurso();
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
                        <button id="eliminaRecurso" type="button" class=" btn btn-primary" value="Elimina"/>Unirse a la cola</button>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <div class="tab-pane fade" id="eliminar">
        <form action="index.php" class="form-horizontal" method="post">
            <div class="form-group ">
                <label for="nombreCola" class="col-sm-3 control-label">Nombre Recurso</label>
                <div class="col-sm-4">
                    <select class="form-control " name="dni" id="recursoElimina">
                        <?php

                        $result = $conexion->selectRecurso();
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
                    <button id="eliminaRecurso" type="button" class=" btn btn-primary" value="Elimina"/>Darse de baja</button>
                </div>
            </div>
            <script type="application/javascript">
                //añade funcionalidad al boton por JQUERY cuando clicamos en él
                $('#eliminaRecurso').on('click',function(){
                    eliminaRecurso();
                });
            </script>
            <div class="form-group col-sm-3 " id="recursoSuccesElimina">
            </div>
        </form>
    </div>
</div>