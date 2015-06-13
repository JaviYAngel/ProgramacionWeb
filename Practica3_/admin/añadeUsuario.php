<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 13/06/15
 * Time: 15:59
 */
?>

<div class="row">
    <div class="col-lg-2">

    </div>
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Añadir <?php echo $clase;?></h3>
            </div>

            <form action="index.php" class="form-horizontal" method="post">


                <div class="form-group">
                    <label for="dni" class="col-sm-2 control-label">DNI</label>
                    <div class="col-sm-7">
                        <input type="text" class="form-control" id="dni" placeholder="Escribe el DNI"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="nombre" class="col-sm-2 control-label">Nombre</label>
                    <div class="col-sm-7">
                        <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre">
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass" class="col-sm-2 control-label">Contraseña</label>
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
                        <button type="submit" class="btn btn-primary">Añadir</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-4">

    </div>
</div>