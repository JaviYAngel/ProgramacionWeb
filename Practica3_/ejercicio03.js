$(document).ready(function(){
    $("#form1").validate({
        rules: {
            nombre: {
                required: true
            },
            dni:{
                required: true
            },
            pass:{
                required:true
            }


        },
        messages: {
            nombre: "Especifica tu nombre.",
            dni: "Introduce DNI con letra en mayuscula.",
            pass: "Campo vacío."
        }
    });
    $("#nombre").validate({
       rules:{

       },
        messages:{

        }
    });
});