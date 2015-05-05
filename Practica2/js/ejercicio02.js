var color = "c3";
var estaMarcado = false;
var pincel = false;

function PintarTablero(){

    //creamos la tabla con nodos
    var tabla = document.createElement("table");

    //creamos la variable tablero que se asignará al nodo del elemento html
    var tablero = document.getElementById("TableroDibujo");


    //creamos la tabla como una matriz de 50x50

    for(var i = 0; i < 50; i++){
        var tr = document.createElement("tr");
        for(var j = 0; j < 50;j++){
            var td = document.createElement("td");
            td.setAttribute("id",50*i+j);
            td.setAttribute("class","c0");
            tr.appendChild(td);
        }
        tabla.appendChild(tr);
    }
    tabla.setAttribute("border","0");
    tablero.appendChild(tabla);
}



