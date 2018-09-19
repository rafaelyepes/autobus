<?php 
$d1 = "";

include ("conectar4.php"); 
$fechahoy=date("Y-m-d");
$fechaatras = strtotime ( '-2 day' , strtotime ( $fechahoy ) ) ;
$fechaatras = date ( 'Y-m-j' , $fechaatras );

$fva1=$fechahoy; 
$fva2=$fechahoy;

$d5c="";
$sub1="0";
$sub2="0";
$vva1="0";
$vva2="0";


$informe="TEST";
$plantilla="TEST";

$fecha=$fechahoy;

$chofer="CH001";
$bus="001";


$chofer="";
$bus="";


$documento="DOC0101";
$viaje="1";



$menu="S";
if(isset($_GET['menu'])) {
$menu=$_GET['menu'];
}  

//$informe="Controle de l'injection";
//$plantilla="plantill013a.php";


?>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimun-scale=1">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
   
    <script type="text/javascript" src="js/jquery.js"></script>
    <link href="css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="css/modalcss.css">

    <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
    <link href="../proyecto1/estilos/tabla1.css" rel="stylesheet" media="screen" type="text/css">

    <!--botones para confirmacion AJAX-->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.css">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    <!--botones para confirmacion AJAX-->


    <script>

          function editareg(id)
          {
           location.href=("../autobus/autobus001r.php?documento="+id);    
          }


          function verreg(tvalue)
          {
          documento=document.getElementById("ndocumento").value;
          fecha=document.getElementById("fecha").value;
          bus=document.getElementById("bus").value;
          chofer=document.getElementById("chofer").value;
          viaje=document.getElementById("viaje").value;
          if (chofer != "" && bus != ""){

       //   alert (fecha+"  "+bus+"  "+chofer+"  "+viaje);
                 
          var dataString = '&fecha=' + fecha + '&bus=' + bus + '&chofer=' + chofer+ '&viaje=' + viaje;  
       
          if (documento == ""){
          $.ajax({
          url: 'consecautobus.php',//Definimos url .php
          type: 'POST', //Definimos o método HTTP usado
          data: dataString, //enviamos datos
          encoding:"UTF-8", //Definimos o tipo de retorno
          dataType: 'JSON',
          cache: false,
          error: function(){
                 alert("error petición ajax-1");
          },
          success: function(respuesta){
          for(var i=0; i<respuesta.length; i++){
            document.getElementById("ndocumento").value=respuesta[i].docu;
            document.getElementById("viaje").value=respuesta[i].viamae;
          }  //fin del for
          } // fin del succes
          });  // fin de la funcion ajax
          }
          setTimeout(function(){nuevoviaje()}, 500);

      	  }else{ //fin iF
      	  	alert ("Il est obligatoire de scanner Chauffeur + Autobus")	

          }
          } //fin funcion 

          function nuevoviaje(){
            documento=document.getElementById("ndocumento").value;
            if (documento !=""){
            window.location="../autobus/autobus001r.php?bus="+bus+"&fecha="+fecha+"&documento="+documento+"&chofer="+chofer+"&viaje="+viaje;
            }   

          }


        
          function abrir()
          {
           
              app.getAllMembers();
//            app.getAllMembers = "true";
        
          } /* fin funcion abrir*/
        
//inicio de las funcion JQUERY
$(document).ready(function(){
   
}); //fin de la funcio jquery

function inicio(){
 document.botonnuevo.disabled=false;
 var sub1 = <?php echo json_encode($sub1)?>;
 var sub2 = <?php echo json_encode($sub2)?>;
 var vva1 = <?php echo json_encode($vva1)?>;
 var vva2 = <?php echo json_encode($vva2)?>;
 var fva1 = <?php echo json_encode($fva1)?>;
 var fva2 = <?php echo json_encode($fva2)?>;
 var fhoy = <?php echo json_encode($fechahoy)?>;
}

</script>

<style>

.thumbnail{
width: 20px;
height: 45px;
}

.imagen{
width: 50px;
height: 35px;

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

.form-control{

width: 100%;
min-width: 100%;
text-align: left;

}

.form-controlred{

width: 100%;
min-width: 100%;
text-align: left;
height: 50px;
max-height: 50px;
}

#bus, #chofer {
background-color: #FEEAEA;
color: black;
font-size: 25px;
font-weight: bold;

}

.form-control1{
width: 100%;
min-width: 100%;
text-align: left;
height: 35px;
max-height: 35px;

}




   .round-button {
  width: 1.5%;
}
.round-button-circle {
  width: 100%;
  height:0;
  padding-bottom: 100%;
  border-radius: 50%;
  border: 3px solid #cfdcec;
  overflow:hidden;
        
  background: #4679BD; 
  box-shadow: 0 0 3px gray;
}
.round-button-circle:hover {
  background:#30588e;
}
.round-button a {
  display:block;
  float:left;
  width:100%;
  padding-top:50%;
  padding-bottom:50%;
  line-height:1em;
  margin-top:-0.5em;
        
  text-align:center;
  color:#e2eaf3;
  font-family:Verdana;
  font-size:1.2em;
  font-weight:bold;
  text-decoration:none;
}

.form-control {
   text-align: center;
   background: F5ECEC;
   box-sizing: border-box;
   border: 1px solid #393939;
   border-radius: 5px 5px 5px 5px;
   color: #393939;
   font-size: 22px;
   width: 70%;  
  

   padding: 8px 1px;
   margin: 2px 0;    /* espacio entre dos lineas
   /*Centrar el input    */
   display:block;
   margin-left: auto;   
.   margin-right: auto;
   /*     */
}
</style>
</head>
<body lang=FR-CA onload="inicio()">
<section id="container" class="container" style="width: 100%; min-width: 100%;">
          <div class="controls">
            <fieldset class="reader-config-group"  style="display: none">
                <label>
                    <div >
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
                        <option selected="selected" value="1">1</option>
                        <option value="2">2</option>
                        <option value="4">4</option>
                        <option value="8">8</option>
                    </select>
                </label>
               
                </div>
            </fieldset>
      </div>
      <!--Muestra la imagen en la pantalla-->
      <div style="display: none" id="interactive" class="viewport"></div>
      <!--  fin --> 
      <div id="debug" class="detection" style="display: none"></div>
  </section>

  <script src="./QuaggaJS/js/quagga.js" type="text/javascript"></script>
  <script src="./QuaggaJS/js/file_input1.js" type="text/javascript"></script>



        <table border=3 cellpadding=0 class="tablat" cellspacing=0>
        <tr>
        <td rowspan="1" WIDTH="20" HEIGHT="50" ><img src="../proyecto1/img/lacroixtransp3.png" class="img-responsive" alt="Logo Lacroix"></td>
       <td align="Center" colspan="3" style="font-size:26px"><?php echo $informe?></td>
        </tr>
        </table>

 <table class="tablat" id="segundoarr" border=1 cellspacing=0 cellpadding=0>
     <tr>
     <td>Date</td>
     <td colspan="2"><input style="text-align: left;" type="text" class="form-control"  value="<?php echo ($fecha)?>" id="fecha" name="fecha" readonly> 
     </td>
     </tr>

        <tr>
     <td>Autobus No</td>
     <td><input style="text-align: left;" type="text" placeholder="Champ requis" class="form-controlred" value="<?php echo ($bus)?>" onblur="abrir()" id="bus" name="bus" readonly></td>

     <td width="25%">
       
        <table style="border: 0px;">
        <tr>  
        <td width="30%">  
        <div>
        <div class="upload1">
        <div class="controls upload1 center-block"">
        <input type="file" accept="image/*" capture="camera" id="camara"/>
        </div>
        </div>
        </div>
      </td>

      <td width="70%">  
      <div id="result_strip">
        <div class="thumbnails2">
        </div>
        </div>
      </td> 

    </tr> 
      </table>

   </td>
     </tr>
  






     <tr>
     <td width="25%">Chauffeur</td>
     <td width="50%"><input style="text-align: left;" type="text" placeholder="Champ requis" class="form-controlred" value="<?php echo ($chofer)?>" id="chofer" name="chofer" readonly>
     </td>
      <td width="auto">
        <table style="border: 0px;">
        <tr>	
        <td width="30%">	
        <div>
        <div class="upload1">
        <div class="controls upload1 center-block"">
        <input type="file" accept="image/*" capture="camera" id="camara"/>
        </div>
        </div>
        </div>
	      </td>
  	    <td width="70%">	
      	<div id="result_strip">
        <div class="thumbnails1">
        </div>
        </div>
 	      </td>	
  		  </tr>	
 	      </table>
  	 </td>
     </tr>

    
     <tr>
     <td colspan="3">&nbsp;</td>
     </tr> 
  

     <tr>
     <td>Document No</td>
     <td colspan="2"><input style="text-align: left;" type="text"  class="form-control" value="" id="ndocumento" name="ndocumento" readonly>
     </td>
     </tr>
    
  
     <tr>
     <td>No</td>
     <td colspan="2"><input style="text-align: left;" type="text" placeholder="" class="form-control" value="1" id="viaje" name="viaje" readonly>
     </td>
     </tr>
     <tr>
     <td class="trans text-center" colspan="3">
     <button id="botonnuevo" class="btn btn-success btn-responsive btninter" onClick="verreg(this.value)" ><span class="glyphicon glyphicon-edit danger1"></span> Nouveau</button> 
     </td>

     </tr>
     </table>  


        
        <div  id="members">
        <div class="alert alert-danger text-center" v-if="errorMessage">
        <button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span></button>
        <span class="glyphicon glyphicon-alert"></span> {{ errorMessage }}
      </div>
      
      <div class="alert alert-success text-center" v-if="successMessage">
        <button type="button" class="close" @click="clearMessage();"><span aria-hidden="true">&times;</span></button>
        <span class="glyphicon glyphicon-ok"></span> {{ successMessage }}
      </div>
        <table border=3 cellpadding=0 class="tablat" cellspacing=0>
        <tr>
        <td width="0%" align="center"></td>
        <td width="14%" align="center">Numéro Document</td>
        <td width="14%" align="center">Date de création</td>
        <td width="14%" align="center">Autobus No</td>
        <td width="14%" align="center">Chauffeur</td>
        <td width="12%" align="center">No</td>
        <td width="12%" align="center">Heure départ</td>
        <td width="12%" align="center">Heure d'arrivée</td>
        <td width="8%" align="center">X</td>
        </tr>
       <tr v-for="(member, index) in members">
            <td class="danger1">{{ index+1 }}</td>
            <td class="danger1">{{ member.docmae }}</td>
            <td class="danger1">{{ member.datmae }}</td>
            <td class="danger1">{{ member.busmae }}</td>
            <td class="danger1">{{ member.chomae }}</td>
            <td class="danger1">{{ member.viamae }}</td>
            <td class="danger1">{{ member.hr2mae }}</td>
            <td class="danger1">{{ member.hr3mae }}</td>
            <td align="center"> <input  id="poid21'+ FieldCount1 +'" name="mitexto13[]" type=image  style="height: 17%; max-height: 17%;" src="../proyecto1/img/Editer.png"  @click="showEditModal = true;  selectMember(member.docmae);"> </td>
          </tr>
        </table>
        </div>
        <script src="vue.js"></script>
        <script src="axios.js"></script>
        <script src="app4.js"></script>
   </body>
</html>
