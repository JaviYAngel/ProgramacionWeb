/**
 * Created by angel on 16/06/15.
 */

function añadeRecurso(dni){
    var nombre = document.getElementById('nombreCola').value;
    var descripcion = document.getElementById('descripcion').value;
    var lugar = document.getElementById('lugar').value;
    var fecha = document.getElementById('fecha').value;
    var accion = 'add';
    //var clase = '<?php echo $clase;?>';
    $.ajax({
        type: 'POST',
        data:('nombre='+nombre+'&descripcion='+descripcion+'&lugar='+lugar
                +'&fecha='+fecha+'&accion='+accion+'&dni='+dni),
        url:'ajax_recursos.php',

        beforeSend: function(){
            $('#recursoSucces').html('Procesando, espere por favor...');
        },
        success:function (response){
            $('#recursoSucces').html('<p class="text-success">' +
            '<span class="label label-success">Creado nuevo recurso</span></p>');
            $('#recursoSucces').stop(1000);
            $('#recursoSucces').hide(5000);
            $('#recursoModifica').html(response);
            $('#recursoElimina').html(response);
            $('#nombreCola').val('');
            $('#descripcion').val('');
            $('#lugar').val('');
        }
    });
}

function modificaRecurso(){
    var nombre = document.getElementById('recursoModifica').value;
    var descripcion = document.getElementById('descripcionModifica').value;
    var lugar = document.getElementById('lugarmodifica').value;
    var fecha = document.getElementById('fechamodifica').value;
    var accion = 'modifica';
    var clase = '<?php echo $clase;?>';
    var dni = '<?php echo _SESSION["dni"]; ?>';
    $.ajax({
        type: 'POST',
        data:('nombre='+nombre+'&descripcion='+descripcion+'&lugar='+lugar
        +'&fecha='+fecha+'&accion='+accion+'&clase='+clase+'&dni='+dni),
        url:'ajax_recursos.php',

        beforeSend: function(){
            $('#recursoSucces').html('Procesando, espere por favor...');
        },
        success:function (response){
            $('#recursoSuccesModifica').html('<p class="text-success">' +
            '<span class="label label-success">Guardando modificación del recurso</span></p>');
            //$('#recursoSucces').stop(1000);
            $('#recursoSuccesModifica').hide(5000);
            $('#descripcionModifica').val('');
            $('#lugarmodifica').val('');
        }
    });
}
function eliminaRecurso(){
    var nombre = document.getElementById('recursoElimina').value;
    var accion = 'elimina';

    $.ajax({
        type: 'POST',
        data:('nombre='+nombre+'&accion='+accion),
        url:'ajax_recursos.php',

        beforeSend: function(){
            $('#recursoSuccesElimina').html('Procesando, espere por favor...');
        },
        success:function (response){
            $('#recursoSuccesElimina').html('<p class="text-success">' +
            '<span class="label label-success">Eliminando recurso</span></p>');
            $('#recursoSuccesElimina').stop(1000);
            $('#recursoSuccesEliminas').hide(5000);
            $('#recursoModifica').html(response);
            $('#recursoElimina').html(response);
        }
    });
}
