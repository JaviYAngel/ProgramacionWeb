/**
 * Created by angel on 16/06/15.
 */

function añadeRecurso(){
    var nombre = document.getElementById('nombreCola').value;
    var descripcion = document.getElementById('descripcion').value;
    var lugar = document.getElementById('lugar').value;
    var fecha = document.getElementById('fecha').value;
    var accion = 'add'
    $.ajax({
        type: 'POST',
        data:('nombre='+nombre+'&descripcion='+descripcion+'&lugar='+lugar
                +'&fecha='+fecha+'&accion='+add+'&clase='+clase),
        url:'ajax_recursos.php',

        beforeSend: function(){
            $('#recursoSucces').html('Procesando, espere por favor...');
        },
        success:function (response){
            $('#recursoSucces').html('<p class="text-success"><span class="label label-success">Creado nuevo recurso</span></p>');


        }
    });
}
