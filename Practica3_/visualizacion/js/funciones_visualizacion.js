/**
 * Created by angel on 21/06/15.
 */
function visualizacion(){
    var accion = 'visualizacion';

    $.ajax({
        type: 'POST',
        data:('accion='+accion),
        url:'ajax_visualizacion.php',

        beforeSend: function(){
            $('#recursoSuccesElimina').html('Procesando, espere por favor...');
        },
        success:function (response){
           $('#tablaVisualizacion').html(response);
        }
    });
}

$(document).ready(function(){
    setInterval(visualizacion,20000);
});