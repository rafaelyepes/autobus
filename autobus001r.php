<?php 
include ("./conectar4.php"); 

//https://www.dynamsoft.com/demo/DBR_HTML5/WebcamBarcodeReader.htm
//https://github.com/dynamsoft-dbr/HTML5-Webcam-Barcode-Reader


//include ("./conectar.php"); 
//include ("./classevar01.php"); 

/*
$menu="S";
if(isset($_GET['menu'])) {
$menu=$_GET['menu'];
}  

if ($menu == "S"){
include ("../proyecto1/indexg1.php"); 
}else{
include ("../proyecto1/ipads.php"); 
}
*/
$bus="";
$fecha="";
$chofer="";
$viaje="";
$documento="";
$horadepart="00:00:00";
$horallegada="00:00:00";


if(isset($_GET["bus"])){
$bus=$_GET['bus'];
}

if(isset($_GET["fecha"])){
$fecha=$_GET['fecha'];
}

if(isset($_GET["chofer"])){
$chofer=$_GET['chofer'];
}

if(isset($_GET["documento"])){
$documento=$_GET['documento'];
}

if(isset($_GET["viaje"])){
$viaje=$_GET['viaje'];
}


$consulta="SELECT * FROM autobusmae where docmae='$documento'";
$rs_tabla=mysql_query($consulta);

 for ($i = 0; $i < mysql_num_rows($rs_tabla); $i++) {
         $fecha = mysql_result($rs_tabla,$i,"datmae");
         $bus = mysql_result($rs_tabla,$i,"busmae");
         $chofer = mysql_result($rs_tabla,$i,"chomae");
         $viaje = mysql_result($rs_tabla,$i,"viamae");
         $horadepart=mysql_result($rs_tabla,$i,"hr2mae");
         $horallegada=mysql_result($rs_tabla,$i,"hr3mae");
    }        

?>

<!DOCTYPE html>
<html>
<head>
	<title>LacroixNet</title>
  <meta name="apple-mobile-web-app-capable" content="yes" />
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width; initial-scale=1.0; user-scalable=no" />
  

	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
    <script type="text/javascript" src="./js/jquery.js"></script>
    <link href="./css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="./css/modalcss.css">
    <link rel="stylesheet" type="text/css" href="./QuaggaJS/css/styles.css" />
    <!--<link href="css/style.css" rel="stylesheet">-->


    <!--UTILIZADO PARA CONFIRM ALERT
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    -->
<script>



function nombre(id){ 
numero=id;
app.consultaMember = {nummov:numero};
app.ConsultaMembers();
}

function inicio(){
      var documentog = <?php echo json_encode($documento)?>;
      var horadepart = <?php echo json_encode($horadepart)?>;
      var horallegada = <?php echo json_encode($horallegada)?>;
      if (horadepart == "00:00:00"){
         $("#depart").show();
         $("#arrive").hide();
         $("#rearrive").hide();
         $("#arrive").removeAttr("style").hide();
         $("#rearrive").removeAttr("style").hide();
      }
      if (horadepart != "00:00:00"){
            $("#depart").hide();
            $("#depart").removeAttr("style").hide();

            $("#boton1").hide();
            $("#boton1").removeAttr("style").hide();

            $(".upload1").hide();
            $(".upload1").removeAttr("style").hide();

         

            $("#boton1").prop("disabled",true);
            $(".btn-success").prop("disabled",true);
            $(".btn-tt").prop("disabled",true);
           

          //  $("#boton3").prop("disabled",true);
            $("#interactive").removeAttr("style").hide();

        if (horallegada == "00:00:00"){

             $("#arrive").show();
             $("#rearrive").show();
        }
      }
}

function arrive(){
if(confirm('Voulez-vous Arrive à destination')){ /* si on clique sur ok */
          documento=document.getElementById("documento").value;
          fecha=document.getElementById("fecha").value;
          bus=document.getElementById("bus").value;
          chofer=document.getElementById("chofer").value;
          control="arrive";
          var dataString = '&d1=' + fecha + '&d2=' + bus + '&d3=' + chofer+ '&documento=' + documento+ '&control=' + control;  
          if (documento != ""){
          $.ajax({
          url: 'controlautobus.php',//Definimos url .php
          type: 'POST', //Definimos o método HTTP usado
          data: dataString, //enviamos datos
          encoding:"UTF-8", //Definimos o tipo de retorno
          dataType: 'JSON',
          cache: false,
          error: function(){
                 alert("Essayez à nouveau s'il vous plaît");
          },
          success: function(respuesta){
            location.reload(true);
          } // fin del succes
          });  // fin de la funcion ajax
          }
          } //vou voulez depart
}

function depart(){
          if(confirm('Voulez-vous Départ')){ /* si on clique sur ok */
          documento=document.getElementById("documento").value;
          fecha=document.getElementById("fecha").value;
          bus=document.getElementById("bus").value;
          chofer=document.getElementById("chofer").value;
          control="depart";
                
          var dataString = '&d1=' + fecha + '&d2=' + bus + '&d3=' + chofer+ '&documento=' + documento+ '&control=' + control;  
          if (documento != ""){
          $.ajax({
          url: 'controlautobus.php',//Definimos url .php
          type: 'POST', //Definimos o método HTTP usado
          data: dataString, //enviamos datos
          encoding:"UTF-8", //Definimos o tipo de retorno
          dataType: 'JSON',
          cache: false,
          error: function(){
                 alert("Essayez à nouveau s'il vous plaît");
          },
          success: function(respuesta){
            location.reload(true);

         
          } // fin del succes
          });  // fin de la funcion ajax
          }
          } //vou voulez depart

}  //fin funcion depart

function rearrive(){
if(confirm('Voulez-vous Ajouté une employé')){ /* si on clique sur ok */
 // alert ("0");
          documento=document.getElementById("documento").value;
          fecha=document.getElementById("fecha").value;
          bus=document.getElementById("bus").value;
          chofer=document.getElementById("chofer").value;
          control="rearrive";
                
          var dataString = '&d1=' + fecha + '&d2=' + bus + '&d3=' + chofer+ '&documento=' + documento+ '&control=' + control;  
          if (documento != ""){
          $.ajax({
          url: 'controlautobus.php',//Definimos url .php
          type: 'POST', //Definimos o método HTTP usado
          data: dataString, //enviamos datos
          encoding:"UTF-8", //Definimos o tipo de retorno
          dataType: 'JSON',
          cache: false,
          error: function(){
                 alert("error petición ajax-1");
          },
          success: function(respuesta){
            location.reload(true);

         
          } // fin del succes
          });  // fin de la funcion ajax
          }
          } //vou voulez depart
}

//inicio de las funcion JQUERY
$(document).ready(function(){

  //ALERT CONFIRM//
  $.confirm({
    title: 'Confirm!',
    content: 'Simple confirm!',
    buttons: {
        confirm: function () {
            $.alert('Confirmed!');
        },
        cancel: function () {
            $.alert('Canceled!');
        },
        somethingElse: {
            text: 'Something else',
            btnClass: 'btn-blue',
            keys: ['enter', 'shift'],
            action: function(){
                $.alert('Something else?');
            }
        }
    }
  });
  //FIN FIN FIN ALERT CONFIRM//


$( "#camara" ).click(function() {
  $("#respuesta").hide();
});


$("#boton1xx" ).click(function() {
 // alert ("0");
//    app.showAddModal = "true";
//    app.showDebarqueModal = "true";
});


$("#botonx1" ).click(function() {
//  alert ("0");
});


});  //fin del document read ---ADICIONA INFORMACION AL DOCUMENTO

function botonx1(){
 app.showAddModal = "true";
}  


function botonx2(){
 app.showAddimagen = "true";

}  

function cancelar(){
  window.location="../autobus/index.php";
}  

</script>

<style>

#respuesta{
font-size: 20px;

}


.upload1img {
    width: 300px;
    height: 300px;
    background: url(../proyecto1/img/acepter.jpg);
    background-repeat: no-repeat;
    overflow: hidden;
}




div.upload1 {
    width: 95px;
    height: 38px;
    background: url(../proyecto1/img/barcode.jpg);
    background-repeat: no-repeat;
    overflow: hidden;
}

div.upload1 input {
    display: block !important;
    width: 95px;
    height: 38px;
    opacity: 0 !important;
    overflow: hidden !important;
}


.btn-lg1{
width: 75px;
height: 63px;

}


#audio{
display: none
}

.warning{
font-size: 18px;
}

.danger1{
font-size: 22px;
}

.formcmodal {
height: 70px;
font-size:25px; 
}

.formgroup {
font-size: 22px;
}


.img2{
width: auto; 
max-width: 100%; 
height: 60%;
}


</style>
</head>
<body onload="inicio()">
<!--	
<div class="container-fluid">
-->
<div class="container-fluid" id="QR-Code">	
     
      <table class="table" border="0" style="margin-bottom: 1px;">
      <tr>
      <td class="col-xs-1 col-md-1">
      <img class="img2" src="../proyecto1/img/logolacroixform.png" alt="Logo Lacroix">
      </td>
      <td class="col-xs-7 col-md-9" style="text-align: center">
      <h1>Autobus</h1>
      </td>  
      <td class="col-xs-4 col-md-2">
      <img class="img2"  src="../proyecto1/img/autobus.png" alt="Autobus" onClick="cancelar()">   </td>  
      </tr>
      </table>
     
      <div class="col-xs-12 col-md-12" style="padding-left: 0px;">
             
      <div class="col-xs-4 col-md-4">
      <button  class="btn btn-warning center-block"  onClick="arrive()" id="arrive"><span class="glyphicon glyphicon-home danger1"></span>Arrivé</button>
      </div>

      <div class="col-xs-4 col-md-4"> 
      <button   class="btn btn-danger center-block"  onClick="rearrive()" id="rearrive"><span class="glyphicon glyphicon-barcode danger1"></span>Ajouter</button>
      </div>

      <!--onClick="depart()"-->

      <div class="col-xs-4 col-md-4">
      <button  id="depart" class="btn btn-primary  center-block confirm" onClick="depart()"><span class="glyphicon glyphicon-ok danger1"></span>Départ</button> 



      </div>
      </div>

     
      <div class="col-xs-12 col-md-12" style="padding-left: 0px;">
       <div class="col-xs-4 col-md-4">
       <button id="boton1" onClick="botonx1()" class="btn btn-success center-block"><span  class="glyphicon glyphicon-plus" ></span>Employé</button>
       </div>

<!--
       <div class="col-xs-4 col-md-4">
       <button id="boton1" onClick="botonx2()" class="btn btn-success center-block"><span  class="glyphicon glyphicon-plus" ></span>Mostrar Imagen</button>
       </div>
-->

       <div class="col-xs-4 col-md-4">
       <div class="upload1">
       <div class="controls upload1 center-block"">
       <input type="file" accept="image/*" capture="camera" id="camara"/>
       </div>
       </div>
       </div>
      </div>
      <div class="col-xs-12 col-md-12" style="padding-left: 0px;">
       <div class="editHeader center-block" style="background-color: transparent; text-align: center;"> 
       <span class="col-centered" id="respuesta" style="display: none">xxx</span>
       </div>
      </div>



  

<section id="container" class="container" style="width: 100%; min-width: 100%;">

          <div class="controls">
            <fieldset class="reader-config-group" >
                <label>
                    <div style="display: none">
                    <span>Barcode-Type</span>
                    <select name="decoder_readers">
                        <option value="code_128" >Code 128</option>
                        <option value="code_39">Code 39</option>
                        <option value="code_39_vin">Code 39 VIN</option>
                        <option value="ean">EAN</option>
                        <option value="ean_extended">EAN-extended</option>
                        <option value="ean_8" selected="selected">EAN-8</option>
                        <option value="upc">UPC</option>
                        <option value="upc_e">UPC-E</option>
                        <option value="codabar">Codabar</option>
                        <option value="i2of5">Interleaved 2 of 5</option>
                        <option value="2of5">Standard 2 of 5</option>
                        <option value="code_93">Code 93</option>
                    </select>
                    
                </label>
                <label>
                    <span>Resolution (width)</span>
                    <select name="input-stream_constraints">
                        <option value="320x240">320px</option>
                        <option value="640x480">640px</option>
                        <option selected="selected" value="800x600">800px</option>
                        <option value="1280x720">1280px</option>
                        <option value="1600x960">1600px</option>
                        <option value="1920x1080">1920px</option>
                    </select>
                </label>
                <label>
                    <span>Patch-Size</span>
                    <select name="locator_patch-size">
                        <option value="x-small">x-small</option>
                        <option value="small">small</option>
                        <option selected="selected" value="medium">medium</option>
                        <option value="large">large</option>
                        <option value="x-large">x-large</option>
                    </select>
                </label>
                <label>
                    <span>Half-Sample</span>
                    <input type="checkbox" checked="checked" name="locator_half-sample" />
                </label>
                 <label>
                <span>Single Channel</span>
                <input type="checkbox" name="input-stream_single-channel" />
                </label>
                <label>
                    <span>Workers</span>
                    <select name="numOfWorkers">
                        <option value="0">0</option>
                        <option  value="1">1</option>
                        <option selected="selected" value="2">2</option>
                        <option value="4">4</option>
                        <option value="8">8</option>
                    </select>
                </label>
               
                </div>
            </fieldset>
      </div>

      <div id="result_strip" >
        <ul class="thumbnails"></ul>
        <ul class="collector" style="display: none"></ul>
      </div>
      <!--Muestra la imagen en la pantalla-->
      <div style="display: none" id="interactive" class="viewport"></div>
      <!--  fin --> 
      <div id="debug" class="detection" style="display: none"></div>
  </section>

  <script src="./QuaggaJS/vendor/jquery-1.9.0.min.js" type="text/javascript"></script>
  <script src="./QuaggaJS/js/quagga.js" type="text/javascript"></script>
  <script src="./QuaggaJS/js/file_input.js" type="text/javascript"></script>
    
    <!--Aqui se encuentra el enlace A el lector de codigo de barras -->
    <!--
    <script src="QuaggaJS/js/adapter-latest.js" type="text/javascript"></script>
    <script src="QuaggaJS/js/live_w_locator.js" type="text/javascript"></script>
    -->

    <!--FIN DEL CONTROLADOR QUAGGAJS   -->





	<div  id="members">
	<div class="col-md-12">
			<div style="display: none" class="alert alert-danger text-center" v-if="errorMessage">
				<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-alert"></span> {{ errorMessage }}
			</div>
			
			<div style="display: none" class="alert alert-success text-center" v-if="successMessage">
				<button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span></button>
				<span class="glyphicon glyphicon-ok"></span> {{ successMessage }}
			</div>

      <div class="table-responsive">
			<table class="table table-bordered table-striped table-hover">
				<thead>
					<th class="warning">Item</th>
					<th class="warning">Numéro</th>
					<th class="warning">Prenom de l'employé</th>
					<th class="warning">Nom de l'employé</th>
					<th class="warning">Genere</th>
					<th class="warning">Statut</th>
                    <th class="warning">Action</th>
                    <th class="warning">Action</th>
				</thead>
				<tbody>
          <!--  
          <tr v-for="(member array in sortedArray, index) in members">
          -->  

    				<tr v-for="(member, index) in members"> 
						<td class="danger1">{{ index+1 }}</td>
						<td class="danger1">{{ member.nummov }}</td>
						<td class="danger1">{{ member.nommov }}</td>
						<td class="danger1">{{ member.apemov }}</td>
						<td class="danger1">{{ member.sexmov }}</td>
                        <td class="danger1">{{ member.stamov }}</td>
						<td class="trans text-center">
							<button id="boton2" class="btn btn-success btn-responsive btninter" @click="showEditModal = true; selectMember(member);"><span class="glyphicon glyphicon-edit danger1" ></span> Modifier</button> 
                        </td>    
                        <td class="trans text-center">
							<button id="boton3" class="btn btn-danger btn-tt"@click="showDebarqueModal = true; selectMember(member);"><span class="glyphicon glyphicon-trash danger1"></span>Débarqué</button>
						</td>
					</tr>
				</tbody>
			</table>
		    </div>
        </div>
        <?php include('modal.php'); ?>
    </div>
    </div>
<!--
 
    <div class="panel panel-primary" >
-->

   
    <div style="display: none" class="panel panel-primary" style="margin:20px;">
   
    <div class="panel-heading">
            <h3 class="panel-title">R.F</h3>
    </div>
    <div class="panel-body">
    <form>
    <div class="col-md-12 col-sm-12">
    <div class="row">
    <div class="col-sm-6 form-group">
                                <label>Document No</label>
                                <input type="text"  class="form-control" value="<?php echo ($documento)?>" id="documento" name="documento" readonly>
                                <span class="glyphicon glyphicon-ok form-control-feedback"></span>
                            </div>
                            <div class="col-sm-6 form-group">
                                <label>Date</label>
                                <input type="text" class="form-control" value="<?php echo ($fecha)?>" id="fecha" name="fecha" readonly>
                            </div>
                        </div>                  
                        <div class="row">
                            <div class="col-sm-4 form-group">
                                <label>Autobus No</label>
                                <input type="text" placeholder="" class="form-control" value="<?php echo ($bus)?>" id="bus" name="bus" readonly>
                            </div>  
                            <div class="col-sm-4 form-group">
                                <label>Chauffeur</label>
                                <input type="text" placeholder="" class="form-control" value="<?php echo ($chofer)?>" id="chofer" name="chofer" readonly>
                            </div>  
                            <div class="col-sm-4 form-group">
                                <label>No</label>
                                <input type="text" placeholder="" class="form-control" value="<?php echo ($viaje)?>" id="viaje" name="viaje" readonly>
                            </div>      
                        </div>
                      </div>   
                </form> 
                </div>
                </div>
    <audio id="audio" controls>
    <source type="audio/wav" src="./js/beep.mp3">
    </audio>
</div>
<script src="vue.js"></script>
<script src="axios.js"></script>
<script src="app.js"></script>
</body>
</html>