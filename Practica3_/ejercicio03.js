$(document).ready(function(){
    $("#form1").validate({
        groups:{
            grupo: "nombre dni pass"
        },
        rules: {
            nombre: {
                required: true
            },
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
            nombre: "Especifica tu nombre.",
            dni: "Introduce DNI con letra en mayuscula.",
            pass: "Campo vacío. Rango entre 3-9"
        },
        //errorLabelContainer:"#message a",
        //wrapper:"a ", debug:true,
        errorPlacement: function(error, element){
            if((element.attr("name")=="nombre") || (element.attr("name")=="dni") ||(element.attr("name")=="pass")){
                error.insertAfter("#groupDiv","form1");
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