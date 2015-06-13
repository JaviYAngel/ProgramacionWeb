<?php
/**
 * Created by PhpStorm.
 * User: angel
 * Date: 13/06/15
 * Time: 16:04
 */
?>

<div class="row">
    <div class="col-lg-2">

    </div>
    <div class="col-lg-8">
        <div class="panel panel-default">
            <div class="panel-heading">
                <h3 class="panel-title"><i class="fa fa-clock-o fa-fw"></i> Elimina usuario:  <?php echo $tipo;?></h3>
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
                    <div class="col-sm-offset-2 col-sm-10">
                        <button type="submit" class="btn btn-primary">Eliminar</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
    <div class="col-lg-4">

    </div>
</div>