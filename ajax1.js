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
	divContenido = document.getElementById('ProSpaelected1');

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
		//alert ("Numero de Pagina:"+nropagina+"  "+fechai+"  "+fechaf+"  "+codigo+"  "+tipoc);
		/*
	  $('table#your-table-id tr#item').remove();

		let data = new FormData();
	  data.append('pag', nropagina);
		data.append('b', codigo);
	  data.append('c', fechai);
		data.append('d', fechaf);
		data.append('tipoc', tipoc);
    */
		var dataString = '&pag=' + nropagina;


		console.log("iniciando proceso");
		$.ajax({
					type: "GET",
					url: "paginador.php",
					data: dataString,
					dataType: "html",
					beforeSend: function(){
								console.log("BeforeSend");
								//imagen de carga
								$("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
					},
					error: function(){
								console.log("ERROR");
								alert("error petición ajax");
					},
					success: function(data){
								console.log("Recibe el data");
	 						  console.log(data);
								$("#ProSelected1").show();
								$("#ProSelected1").empty();
								$("#ProSelected1").append(data);
					}
		});
	//como hacemos uso del metodo GET
	//colocamos null ya que enviamos
	//el valor por la url ?pag=nropagina

}
