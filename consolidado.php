<?php 
include ("./conectar4.php"); 
?>
<html>
	<head>
	<title>PORTAIL LACROIX</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

		
    
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">

<link rel="stylesheet" href="./estilos/bootstrap.css" media="screen" type="text/css">

<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<script language="javascript">

function inicio() {
        
       	var fecha = new Date()
		var hora = fecha.getHours()
		var minuto = fecha.getMinutes()
        var segundo = fecha.getSeconds()
		if (hora < 10) {hora = "0" + hora}
		if (minuto < 10) {minuto = "0" + minuto}
		if (segundo < 10) {segundo = "0" + segundo}
		var horita = hora + ":" + minuto; 
		tiempo = setTimeout('hora()',1000)
		var date = new Date();
		var d  = date.getDate();
		var day = (d < 10) ? '0' + d : d;
		var m = date.getMonth() + 1;
		var month = (m < 10) ? '0' + m : m;
		var yy = date.getYear();
		var year = (yy < 1000) ? yy + 1900 : yy;
		var e=(year + "-" + month + "-" + day);
		var z=(date.getHours()+":"+date.getMinutes());
       
		document.getElementById("fecha").value=e;

		var revs = "NO";
		document.getElementById("fecha").focus();
		}

 		function validar() 
		{
		document.getElementById("formulario").submit();
		}


		function cancelar() {
			location.href="./accueilc.php";
		}

				
		</script>
	</head>
	<body onload=inicio()>
    <?php 
	include ("./indexg1.php"); 
   // 	include ("./novom.php"); 
	?>
	<form id="formulario" name="formulario" method="post" action="./index02pdf.php" style="margin-top: 85px;  border: none; width: 40%; background-color: rgba(10, 10, 10, 0.1);
" class="container" >		
	    <div class="form-group" style="text-align: center">
	    <p style="text-align: center; font-size: 18px; font-weight: bold;">Rapport Consolidé</p>	
		<label style="text-align: center; font-size: 18px; font-weight: bold;">Data</label>
		<div>
    	<input type="date" class="" id="fecha" name="fecha" aria-describedby="emailHelp" style="text-align: center; font-size: 24px; width: 67%; margin-left: auto;
  margin-right: auto;">
		</div>
		</div>    	
		<div class="form-group" style="text-align: center;"> 
        <a href="javascript:void(0);" onclick="validar()">
        <img class="img-thumbnail" style="width: 105px; height: 80px; border:none" src="./img/valider.png" alt="Sauvegarder"> </a>                    
        <a href="javascript:void(0);" onclick="cancelar()">
        <img  class="img-thumbnail" style="width: 105px; height: 80px; border: none" src="./img/canceler.jpg" alt="Canceller"></a>  
        </div>   

	</form>
	

       
	</body>
</html>
