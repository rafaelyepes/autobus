function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function Pagina(nropagina){
	//donde se mostrar� los registros
	divContenido = document.getElementById('ProSelected1');

	ajax=objetoAjax();
	//uso del medoto GET
	//indicamos el archivo que realizar� el proceso de paginar
	//junto con un valor que representa el nro de pagina
    fechai=document.getElementById("favis1").value;
    fechaf=document.getElementById("favis2").value;
    tipoc=document.getElementById("cate").value;
    codigo=(document.getElementById("d1").value);
    // 	codigo="plantill086a.php";
    //  alert (tipoc);
		alert (nropagina+"  "+fechai+"  "+fechaf+"  "+codigo+"  "+tipoc);
	$('table#your-table-id tr#item').remove();

	ajax.open("GET", "paginador.php?pag="+nropagina+"&c="+fechai+"&d="+fechaf+"&tipoc="+tipoc+"&b="+codigo);



	divContenido.innerHTML= '<img src="anim.gif">';
	ajax.onreadystatechange=function() {
		if (ajax.readyState==4) {
			//mostrar resultados en esta capa
			divContenido.innerHTML = ajax.responseText
		}
	}
	//como hacemos uso del metodo GET
	//colocamos null ya que enviamos
	//el valor por la url ?pag=nropagina
	//ajax.send(null)
}
