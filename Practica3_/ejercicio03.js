$(document).ready(function() {
    //Validacion del primer formulario
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

    //Validacion del segundo formulario
    $('#form2').validate({
        rules: {
            dni2:{
                required: true,
                rangelength:[8,9]
            },
            pass2:{
                required:true,
                rangelength:[3,9]
            }
        },
        messages: {
            dni2: "Introduce DNI.",
            pass2: "Campo vacío. Rango entre 3-9"
        },
        errorPlacement: function(error, element){
            if((element.attr("name")=="dni2") ||(element.attr("name")=="pass2")){
                error.insertAfter("#groupDiv2","form2");
            }else{
                error.insertAfter(element);

            }
        },
        submitHandler: function(){
            var dni = $('#dni2').val();
            var pass = $('#pass2').val();

            $.ajax({
                type: 'POST',
                data: ('dni=' + dni + '&pass1=' + pass),
                url: './validacion.php',

                beforeSend: function () {
                    $('h5#resultado').html('Procesando, espere por favor...');
                },
                success: function (response) {
                    //$('h5#resultado').html(response);
                    $('#dni2').val("");
                    $('#pass2').val("");
                    if(response=="Login correcto"){
                        window.location="./admin/index.php";
                    }else{
                        $('h5#resultado').html(response);
                    }
                }
            });
            return false;
        }
    });
});