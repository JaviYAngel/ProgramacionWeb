<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 10/06/15
 * Time: 14:01
 */
?>

<div class="row">
    <div class="col-lg-2">

    </div>
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Modificar <?php echo $clase;?></h3>
            </div>

            <form action="index.php" class="form-horizontal" method="post">


                <div class="form-group">
                    <label for="dni" class="col-sm-2 control-label">DNI</label>
                    <div class="col-sm-7">
                        <select name="dnimodifica" id="dnimodifica">
                        <?php

                        $result = $conexion->selectUsuarios($clase);
                        $long=count($result);
                        for($i=0;$i<$long;$i++) {
                            echo "<option value='". $result[$i][0] ." '>" . $result[$i][0] . "</option>";
                        }
                        ?>
                        </select>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-7">
                        <input name="nombremodifica" type="text" class="form-control" id="nombremodifica" placeholder="<?php echo $datos[0][0] ?>">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass" class="col-sm-2 control-label">Contraseña</label>
                    <div class="col-sm-7">
                        <input name="passmodifica" type="password" class="form-control" id="passmodifica" placeholder="Pass">
                    </div>
                </div>
                <?php
                if($clase=="admin") {
                    ?>
                    <div class="form-group">
                        <label for="tipo_usuariomodifica" class="col-sm-2 control-label">Tipo Usuario</label>

                        <div class="col-sm-4">
                            <select class="form-control " id="tipo_usuariomodifica" name="tipo_usuariomodifica">
                                <option value="cliente">Cliente</option>
                                <option value="admin">Administrador</option>
                                <option value="profesional">Profesional</option>
                            </select>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-3">
                        <button type="button" class="btn btn-primary" id="modificaUsuario" data-loading-text="Enviando..." autocomplete="off">Guardar</button>
                    </div>
                    <script>
                        //script para pulsar un boton
                        $('#modificaUsuario').on('click',function(){
                            var $btn = $(this).button('loading')
                            modificaUsuario();
                            $btn.button('reset')
                        });
                    </script>
                    <div class="col-sm-7" id="resultadoModifica1">
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-4">

    </div>
</div>