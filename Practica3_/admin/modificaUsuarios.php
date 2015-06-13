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
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Modificar <?php echo $tipo;?></h3>
            </div>

            <form action="index.php" class="form-horizontal" method="post">


                <div class="form-group">
                    <label for="dni" class="col-sm-2 control-label">DNI</label>
                    <div class="col-sm-7">
                        <select name="dni" id="dni">
                        <?php

                        $result = $conexion->selectUsuarios($clase);
                        $long=count($result);
                        for($i=0;$i<$long;$i++) {
                            echo "<option>" . $result[$i][0] . "</option>";
                        }
                        ?>
                        </select>
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
                <?php
                if($clase=="admin") {
                    ?>
                    <div class="form-group">
                        <label for="tipo_usuario" class="col-sm-2 control-label">Tipo Usuario</label>

                        <div class="col-sm-4">
                            <select class="form-control ">
                                <option>cliente</option>
                                <option>admin</option>
                                <option>profesional</option>
                            </select>
                        </div>
                    </div>
                <?php
                }
                ?>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Guardar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-4">

    </div>
</div>