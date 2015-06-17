<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 10/06/15
 * Time: 14:03
 */

if($tipo=='admin'){?>
    <ul id="tabs" class="nav nav-tabs nav-justified" xmlns="http://www.w3.org/1999/html">
        <li class="active"><a href="#añadir" data-toggle="tab">Añadir</a></li>
        <li><a href="#modificar" data-toggle="tab">Modificar</a></li>
        <li><a href="#eliminar" data-toggle="tab">Eliminar</a></li>
    </ul>
    <div id="my-tab-content" class="tab-content">
        <div class="tab-pane fade in active" id="añadir">
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
                            añadeRecurso();
                        });
                    </script>
                        <div class="form-group col-sm-3 " id="recursoSucces">
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <div class="tab-pane fade" id="modificar">

        </div>
        <div class="tab-pane fade" id="eliminar">

        </div>
    </div>

<?php
}elseif($tipo=='profesional'){

}elseif($tipo=='cliente'){
?>
    <div class="row">
        <div class="col-lg-1">
        </div>
        <div class="col-lg-9">


        </div>
        <div class="col-lg-4">

        </div>
    </div>
<?php
}
?>