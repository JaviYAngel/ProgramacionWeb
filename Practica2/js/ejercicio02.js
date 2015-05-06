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

    //Creaccion del objeto paleta de colores
    var paleta_aux = document.createElement("table");
    var paleta = document.getElementById("Paleta");

    tr = document.createElement("tr");

    for(var i=0;i<10;i++){
        td = document.createElement("td");
        td.setAttribute("id","c"+i);
        td.setAttribute("class","c"+i);
        tr.appendChild(td);
    }
    paleta_aux.appendChild(tr);
    paleta_aux.setAttribute("border","1");
    paleta.appendChild(paleta_aux);

    //Creamos el mensaje de estado con una tabla
    var Pincel_aux = document.createElement("table");
    var pincel = document.getElementById("Pincel");
    var label = document.createElement("table")
    td = document.createElement("td");
    tr = document.createElement("tr");
    var texto = document.createTextNode("Haga click en el color para empezar a pintar ");
    td.appendChild(texto);
    tr.appendChild(td);
    Pincel_aux.appendChild(tr);
    pincel.appendChild(Pincel_aux);
}

// Funcion para añadir los listeners de las acciones
function addListeners(){

	pintaTablero();

	// Función para asignar un evento a cada tr de la paleta de colores
	if(window.addEventListener){
		for(var i = 0 ; i < 10 ; i++ ){
			e0 = document.getElementById('c'+i);
			e0.addEventListener("click", dameColor, false);
		}
	}

	// Función para deseleccionar los colores
	function desmarcaTodo(){
		for( var i = 0 ; i < 10 ; i++ ){
			e0 = document.getElementById('c'+i);
			e0.style.border = "1px solid black";
		}
	}

	// Función para activar y desactivar los colores
	function dameColor(){
		if(color == this.id && estaMarcado){
			desmarcaTodo();
			color = "c3";
			estaMarcado = false;
			return;
		}
			desmarcaTodo();
			color = this.id;
			this.style.border = "3px solid #993399";
			estaMarcado = true;

	}

	// Función para cambiar el estado del pincel y escribir el estado actual en el div pinceld
	function cambiaPincel(){
		if(!pincel)this.className=color;
		pincel = !pincel;
		pinceld.innerHTML='';

		var tabla = document.createElement("table");
		var tr = document.createElement("tr");
		var td = document.createElement("td");
		if(pincel) var texto = document.createTextNode("PINCEL ACTIVADO");
		else var texto = document.createTextNode("PINCEL DESACTIVADO");
		td.appendChild(texto);
		tr.appendChild(td);
		tabla.appendChild(tr);
		var lista = document.getElementById("pinceld");
		lista.appendChild(tabla);
	}

	// Función para añadir eventos a cada td de la tabla
	for( var i = 0 ; i < 2500 ; i++ ){
		if(window.addEventListener){
			e = document.getElementById(i);
			e.addEventListener("click",cambiaPincel, false);
			e.addEventListener("mouseover", function(){if(pincel==true)this.className=color;}, false);
		}
	}
}

window.onload = addListeners;




