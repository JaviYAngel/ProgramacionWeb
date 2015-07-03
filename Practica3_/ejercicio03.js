$(document).ready(function() {

        $("#form1").validate({
            groups: {
                grupo: "nombre dni pass"
            },
            rules: {
                name: {
                    required: true
                },
                dni: {
                    required: true,
                    rangelength: [8, 9]
                },
                pass: {
                    required: true,
                    rangelength: [3, 9]
                }
            },
            messages: {
                name: "Especifica tu nombre.",
                dni: "Introduce DNI con letra en mayuscula.",
                pass: "Campo vacío. Rango entre 3-9"
            },
            //errorLabelContainer:"#message a",
            //wrapper:"a ", debug:true,
            errorPlacement: function (error, element) {
                if ((element.attr("name") == "name") || (element.attr("name") == "dni") || (element.attr("name") == "pass")) {
                    error.insertAfter("#groupDiv", "form1");
                } else {
                    error.insertAfter(element);
                }
            },
            submitHandler: function(){
                var nombre = $('#name').val();
                var dni = $('#dni').val();
                var pass = $('#pass').val();

                $.ajax({
                    type: 'POST',
                    data: ('nombre=' + nombre + '&dni=' + dni + '&pass=' + pass),
                    url: './validacion2.php',

                    beforeSend: function () {
                        $('h5#resultado').html('Procesando, espere por favor...');
                    },
                    success: function (response) {
                        $('h5#resultado').html(response);
                        $('#name').val("");
                        $('#dni').val("");
                        $('#pass').val("");
                    }
                });
            }
        });


    $('#form2').validate({
        rules: {
            dni:{
                required: true,
                rangelength:[8,9]
            },
            pass:{
                required:true,
                rangelength:[3,9]
            }
        },
        messages: {
            dni: "Introduce DNI con letra en mayuscula.",
            pass: "Campo vacío. Rango entre 3-9"
        },
        errorPlacement: function(error, element){
            if((element.attr("name")=="dni") ||(element.attr("name")=="pass")){
                error.insertAfter("#groupDiv","form2");
            }else{
                error.insertAfter(element);

            }
        }
    });


   /* $("#nombre").validate({
       rules:{

       },
        messages:{

        }
    });

    function verificar(){
    $.ajax({type:"GET",
    url:"validacion.php",
    data:"dni="+document.dni.valueOf(),
    succes: function (msg) {
    $("#final").html(msg);;
    }})
    }


    */
});