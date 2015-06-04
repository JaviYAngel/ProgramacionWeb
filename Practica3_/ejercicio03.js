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
    });*/
});