<!DOCTYPE html PUBLIC>
<html lang="es">
<?php
include ("./conectar4.php");
include ("./autentican.php");

$versionactiva="v1";
$valor="1";
$tipoc="1";
$fichero1="../plantilla/archivos/fdc/";

$d1 = "";
if(!isset($_SESSION)) { session_start(); }
$nomusu=$_SESSION['nomusu'];
$d1 = $nomusu;
ini_set('display_errors', 'On');
ini_set('display_errors', 1);
$fechahoy=date("Y-m-d");
$graba = 'SI';
$cont1 = array();
$d1 = "";
$swpaginador="0";
include ("./indexg1.php");

$codigo="";


if(isset($_GET['codigo'])){
        $codigo = $_GET['codigo'];
      //  echo ($codigo);
}
?>
<head>
<title>PORTAIL LACROIX</title>
<meta http-equiv=content-type content=text/html; charset=utf-8>
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

<link href="./estilos/tabla1.css" rel="stylesheet" media="screen" type="text/css">

 <script src="./datalist/jquery.datalist.js"></script>

<script type="text/javascript" src="ajax1.js"></script>

<!-- PARA MOSTRAR EL DETALLE DE LA INFORMACION LLAMA AJAX1.JS Y ESTE LLAMA A PAGINADOR.PHP ambos dentro de plantilla -->

<script>

   function  validar2(id,id1){
      leng=id.length;
      dif=leng-5;
      v2=id.substr(5,dif);
      campoy="id"+v2;
      campov="version"+v2;
      document.getElementById("informe").value=document.getElementById(id).value;
      document.getElementById("d1").value=document.getElementById(campoy).value;
      document.getElementById("comp1").value=document.getElementById(id).value;

      document.getElementById("vactiva1").value=document.getElementById(campov).value;

      document.getElementById("plantilla").value=document.getElementById(campoy).value;

      $('#popup').fadeOut('slow');
      $('.popup-overlay').fadeOut('slow');
      $("#resultado").hide();
      $("#contboton").show();
      return false;
}




//inicio de las funcion JQUERY
$(document).ready(function(){

//DATALIST CLICK
$("#myInput").on('input', function () {
    var val = this.value;
    if($('#browsers option').filter(function(){
        return this.value === val;
    }).length) {
        //send ajax request
       (document.getElementById("informe").value)=this.value;

        var codigo = this.value;
        var dataString = '&codigo=' + codigo;


        //INICIO DEL AJAX
        $.ajax({
          url: 'conspaginhist.php',
          type: 'POST',
          data: dataString, //enviamos datos
          encoding:"UTF-8",
          dataType: 'JSON',
          error: function(){
                        alert("error petición ajax+1");
          },
          success: function(dados){
          (document.getElementById("d1").value)=dados[0].id;
          } // fin del succes
        }); // fin de la funcio ajax

    }
});
//FIN DATALIST CLICK




$(document).ready(function() {
  $('.div3 a').on('click', function(){
    var title = $(this).attr('title');
    alert(title);
    // ...  ajax
  });
});

            $("#comp1").focus(function(){
                 $("#comp1").val('');
                 $("#d1").val('');
                 $("#informe").val('');
                 $("#vactiva1").val('');


                 $("#resultado").show();
                 $(".member").hide();

            });
            var consulta;
             //hacemos focus al campo de búsqueda

            $("#comp1").focus();
            //comprobamos si se pulsa una tecla
            $("#comp1").keyup(function(e){
                //obtenemos el texto introducido en el campo de búsqueda
                  consulta = $("#comp1").val();
                  $("#nom2").removeAttr("readonly");
                  consulta = consulta.toLowerCase();
                  consultax="SI";
                  if (consulta != "") {
                    //hace la búsqueda
                  $('#popup').fadeIn('slow');
                  $('.popup-overlay').fadeIn('slow');
                  $('.popup-overlay').height($(window).height());

               //     alert ("0");


                  $.ajax({
                        type: "POST",
                        url: "./busquedarapp.php",
                        data: "b="+consulta,
                        dataType: "html",
                        beforeSend: function(){
                              //imagen de carga
                              $("#resultado").html("<p align='center'><img src='ajax-loader.gif' /></p>");
                        },
                        error: function(){
                              alert("error petición ajax");
                        },
                        success: function(data){
                              $("#resultado").show();
                              $("#resultado").empty();
                              $("#resultado").append(data);
                        }
                  });
                }else{
                  $("#contboton").hide();
                  $("#resultado").hide();
                  $('#popup').fadeOut('slow');
                  $('.popup-overlay').fadeOut('slow');
                }
            });

             $("#resultado").find('a').on('click', setBusqueda);




});  //fin del document read ---JQUERY


//FILTRA LA LISTA DESPLEGABLE//
function myFunction() {
    var input, filter, ul, li, a, i;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("div3");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        if (a.innerHTML.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";

        }
    }

}
//FIN DEL FILTRO DE LA LISTA DESPLEGABLE//

//evita refrescar el formulario con la tecla enter//
function stopRKey(evt) {
   var evt = (evt) ? evt : ((event) ? event : null);
   var node = (evt.target) ? evt.target : ((evt.srcElement) ? evt.srcElement : null);
   if ((evt.keyCode == 13) && (node.type=="text")) {return false;}
}
document.onkeypress = stopRKey;

//AQUI SE MARCAN LOS CHECKBOX PARA GENERAR EL pdf
function chequear(id){
  //alert (id);
  id=id;
  var s=id.checked;
  if(document.getElementById(id).checked == true){
   document.getElementById(id).value="SI";
 // if (s){
   //alert ("SIIII");
  }
  else{
   document.getElementById(id).value="NO";

   //alert ("NO");
  }
  //document.getElementById(id).value="SI";
}  //fin de la funcion

//AQUI SE GENERAN TODOS LOS PDF
function consultar1(){

   ins=document.getElementsByName('mitexto12[]');
   //plantilla1="plantill009apdf.php";
 //  alert ((document.getElementById("d1").value).length);
   swct=0;
   longitud = (document.getElementById("d1").value).length;
 // alert (longitud);

   if (longitud == 16){
   plantilla1=((document.getElementById("d1").value).substr(0,12))+"pdf.php";
//   alert (plantilla1);
   swct=1;
   }
   if (longitud == 17){
    if (swct == 0){
 //   alert ("2");
   plantilla1=((document.getElementById("d1").value).substr(0,13))+"pdf.php";
  // alert (plantilla1);
   }
   }


   fichero1=document.getElementById("fichero1").value;
   for(i=0; i<=ins.length; i++)
   {
   // alert (ins[i].value);
    dins=(ins[i].value);
    //points = points + (d2[i].value)+",";
    if (dins == "SI"){
     // alert ("0");
      points ="poid20"+i;
     // alert ("1");
      points = document.getElementById(points).value;
    // alert ("2");

      var informe=document.getElementById("informe").value;
  //    alert (d2);
  // alert (plantilla1 + "  "+informe);
  //    alert (points);
  //  points = points.toString();
     /****************/
   //   alert ("3");
      d2s=plantilla1;
      version01="versionx"+i;
      version01=document.getElementById(version01).value;
      version02=document.getElementById("vactiva1").value;
     //alert (version01+"  "+version02);
      if (version01 != "NO"){
      if (version01 != version02){
       d2s=plantilla1.split(".",1);
       d2s=d2s+version01+".php";
      }
      }
      /****************/
  /****************/



      window.open(d2s+"?d2="+points+"&fichero1="+fichero1+"&informe="+informe);
   } //Fin del if
  } //fin del For
}  //fin de la Funcion

//consulta todos los pdf
function consultarpdf(id){
//alert (id);
  sl=id.substr(10,4);
  //alert (sl)
  docu="poid20"+sl;

  var docu=document.getElementById(docu).value;
  ruta = document.getElementById("fichero1").value;
  ruta = ruta+docu+".pdf",'_blank';
  window.open(ruta);
}  //fin de


function consultar1e(){

   ins=document.getElementsByName('mitexto12e[]');
   ins2=document.getElementsByName('mitexto11[]');

//  plantilla1="php/enviar3.php";
  plantilla1="select.php";

  //plantilla1=((document.getElementById("d1").value).substr(0,12))+"pdf.php";
  ruta = document.getElementById("fichero1").value;
 // alert (ruta);
  ruta="C:/wamp/www/plantilla/archivos/fdc/";
  points1="";
  //alert (ins.length);
  mregistros=ins.length;
 // alert (mregistros);
  for(is=0; is<mregistros; is++)
  {
   // alert (is+"//"+mregistros);
    if ((ins[is].checked)==true){
     points = (ins2[is].value);
     docu="poid20"+is;
     var docu=document.getElementById(docu).value;

     points1=points1+docu+";";

     // alert (docu);
     //    alert ("Pendient Courriel");
     //    window.open(plantilla1+"?d2="+points+"&ruta="+ruta);
     // window.open(plantilla1+"?d2="+points+"&ruta="+ruta);
    } // fin del if
   } // fin del for
    enviaremail(points1,ruta);
 //  alert (is);
 // alert (ruta+"   "+points1);
// window.open(plantilla1+"?d2="+points1+"&ruta="+ruta);
// window.location=(plantilla1+"?d2="+points+"&d01="+d01),'_blank';
}  //fin de

function enviaremail(points1,ruta){
   //  alert (ruta+"   "+points1);
   window.open(plantilla1+"?d2="+points1+"&ruta="+ruta);
}
// FUNCION MARCAR-1
function marcar(){
  ins=document.getElementsByName('mitexto12[]');
  ins0=document.getElementsByName('chk01');
 // alert (ins0[0].checked);
  if (ins0[0].checked==true){
  for(i=0;i<=ins.length;i++)
  {
   id="poid26"+i;
   document.getElementById(id).value="SI";
   ins[i].checked=true;
  }
  }else{
  for(i=0;i<=ins.length;i++)
  {
   id="poid26"+i;
   document.getElementById(id).value="NO";
   ins[i].checked=false;
  }
  }
}  //fin de la funcion


// FUNCION MARCAR-2
function marcar2(){
  ins=document.getElementsByName('mitexto12e[]');
  ins0=document.getElementsByName('chk02');
 // alert (ins0[0].checked);
  if (ins0[0].checked==true){
  for(i=0;i<=ins.length;i++)
  {
   id="poid29e"+i;
   document.getElementById(id).value="SI";
   ins[i].checked=true;
  }
  }else{
  for(i=0;i<=ins.length;i++)
  {
   id="poid29e"+i;
   document.getElementById(id).value="NO";
   ins[i].checked=false;
  }
  }
}  //fin de la funcion



function cancelar()
{
          location.href="./indexg1.php";
}

function chequeare(id1,id2,id3){
  //alert (id1+"  "+id2+"  "+id3);

  var s=id1.checked;
  if (s){

   if (cont>=10){
    id1.checked=false;
    alert ("Maximun 10");
   }else{
     cont=cont+1;
   // alert (cont);
   }
  }
  else{
   cont=cont-1;
   //alert (cont);
  }
  //document.getElementById(id).value="SI";
}  //fin de la funcio

function generarpdf(){
//   alert (id);
//  d2=id;
//  var plantilla=document.getElementById("d1").value;
//  window.location=(plantilla+"?d2="+d2),'_self';
}  //fin de


// aqui se generan todos los PDF
function consultar(id){
  d2=id;
  sl=d2.substr(7,4);
  docu="poid20"+sl;
  d2=docu;
  var plantilla="index.php";
  var d2=document.getElementById(docu).value;
  /****************/
  d2s=d2;
  version01="versionx"+sl;
  /****************/
  /****************/
  miPopup = window.open(plantilla+"?documento="+d2s+"&plantilla="+d2,'_blank');
  //  window.location=(d2+"?d2="+plantilla+"&informe="+informe+"&plantilla="+d2),'_self';
}  //fin de la funcion

// consultar vista
function consultarvista(id){
  d2=id;
  sl=d2.substr(7,4);
  docu="poid20"+sl;
  d2=docu;


//  alert (id+"   "+d2);
  var voir="OUI";
  var plantilla=document.getElementById(d2).value;
  var d2=document.getElementById("d1").value;
  var informe=document.getElementById("informe").value;
  if (d2 == "plantill038a.php"){
    d2="plantill038b.php"
  }

  /****************/
  d2s=d2;
  version01="versionx"+sl;
  version01=document.getElementById(version01).value;
  version02=document.getElementById("vactiva1").value;
 // alert (version01+"   "+version02);

  if (version01 != "NO"){
  if (version01 != version02){
   d2s=d2.split(".",1);
   d2s=d2s+version01+".php";
  }
  }
  /****************/
  /****************/


  // window.location=(d2+"?d2="+plantilla+"&informe="+informe+"&plantilla="+d2+"&voir="+voir),'_blank';

 miPopup = window.open(d2s+"?d2="+plantilla+"&informe="+informe+"&plantilla="+d2+"&voir="+voir,'_blank');


}  //fin de la funcion


function buscar2(id){
id=id-1;
idx="groupb"+id;
var x = document.getElementById("div3");
bb=x.getElementsByClassName("child")[id].getElementsByTagName("a")[0].innerHTML;
alert(bb);

cc=document.getElementById(idx).value;
alert(cc);


}
function buscar1(id1){
 // alert (id1);
  var indice=id1.selectedIndex;
  var resultado=id1.options[indice].text;

//  alert (indice+" "+resultado);

  codigo=(document.getElementById("nom1").value);
 //alert (id1+"  "+resultado);
  (document.getElementById("d1").value)=(document.getElementById("nom1").value);
  (document.getElementById("informe").value)=resultado;
  //miPopup = window.open("basehistoc.php?codigo="+codigo);
  //setTimeout(function(){verifica1()}, 300);
}  //fin de la funcion


function buscar3(tipc){
  //alert ("0");
  Pagina("1");
}  //fin de la funcion

function inicio(){
            //  $('#contenido').hide(); // Lo oculta
            <?php $fecha = new DateTime('NOW');?>
            <?php $hora= $fecha->format('H');?>
            <?php $minuto=$fecha->format('i');?>
            <?php $segundos=$fecha->format('s');?>
            <?php $fecha=$fecha->format('Y-m-d');?>
            var fecha = <?php echo json_encode($fecha)?>;
            var hora = <?php echo json_encode($hora)?>;
            var minuto = <?php echo json_encode($minuto)?>;
            var segundos = <?php echo json_encode($segundos)?>;
            var d = <?php echo json_encode($fecha)?>;
            var ano = d.substr(0,4);
            var mes = d.substr(5,2);
            var dia = d.substr(8,2);
            hora=hora;
            if (hora<10) {;
                        hora=hora;
            }
            if (hora>24) {;
                        hora=hora-24;
            }
            if (minuto<10) {;
                        minuto=minuto;
            }
            var horita = hora + ":" + minuto;

            var docu = ano + mes + dia + hora + minuto + segundos ;

            $("#agregarCampo1").css('pointer-events', 'none');
            document.getElementById("favis1").value=d;
            document.getElementById("favis2").value=d;


//            document.getElementById("d1").focus();
}



$(document).ready(function() {

            });  //fin del documento read


    </script>
  <style type="text/css">



  /*FORMATO PARA CONTEDIO DE LA TABLA */
  .form-control:focus {
    width: 80%;
   font-size: 14px;
   /*  background: -webkit-linear-gradient(top, #9bc3f2 1%,#77d1ef 90%,#207cca 81%,#7db9e8 50%); /* Chrome10+,Safari5.1+ */
   background: -webkit-linear-gradient(top, #FA3324 1%, #F8B7B4 60%, #F88C8C 81%, #FCBDBD 50%); /* Chrome10+,Safari5.1+ */
  }

  .form-control {
   text-align: center;
   border-radius: 0px 0px 0px 0px;
   color: #393939;
   font-size: 14px;
  }

 .imgpdf{
  width: 100%;
  height: 50%;
  }

  .fechaid{
  width: 170px;
  height: 34px;
  font-size: 23px;
  text-align: center;
  }



 .button{
   background: url("../plantilla/img/editer.png") no-repeat;
   cursor:pointer;
   margin: 0;
   padding: 0;
   border: 0;
   width: 40%;
   height: 70%;
 }


.content-popup {
  border: 1px solid #BFBFBF;

  border-style: groove;
  margin: 3px 0px 10px 37px;
  position: relative;
  padding: 10px;
  width: 70%;
  height: auto;

  border-radius:4px;
  background-color:#FFFFFF;
  box-shadow: 0 2px 5px #666666;
}


.content-popup h2 {
  color:#48484B;
  border-bottom: 1px solid #48484B;
  margin-top: 0;
  padding-bottom: 4px;
}

.combo{   /* para el despliegue de la informacion */
  display: block !important;
  font-family: Tahoma, Verdana, Arial;
  color: #707070;
  background-color: #FFFFFF;
  border-width:0;
  width: 97%;
  height: 38px;
  border: 1px solid #DBE1EB;
  font-size: 18px;
  font-family: Arial, Verdana;
  padding-left: 6px;
  padding-right: 6px;
  padding-top: 6px;
  padding-bottom: 6px;
  border-radius: 4px;
  -moz-border-radius: 4px;
  -webkit-border-radius: 4px;
  -o-border-radius: 4px;
  background: #FFFFFF;
  background: linear-gradient(left, #FFFFFF, #F7F9FA);
  background: -moz-linear-gradient(left, #FFFFFF, #F7F9FA);
  background: -webkit-linear-gradient(left, #FFFFFF, #F7F9FA);
  background: -o-linear-gradient(left, #FFFFFF, #F7F9FA);
  color: #2E3133;
  margin-top: px;
  margin-bottom: -2px;
}

/* FIN FIN FIN FORMATO PARA CONTEDIO DE LA TABLA FIN FIN FIN*/


/* iPads (Orientacion HORIZONTAL) medianos----------- */
@media only screen
and (min-width : 781px)
and (max-width : 1050px) {

.form-control:focus {
   width: 80%;
   font-size: 11px;
   /*  background: -webkit-linear-gradient(top, #9bc3f2 1%,#77d1ef 90%,#207cca 81%,#7db9e8 50%); /* Chrome10+,Safari5.1+ */
   background: -webkit-linear-gradient(top, #FA3324 1%, #F8B7B4 60%, #F88C8C 81%, #FCBDBD 50%); /* Chrome10+,Safari5.1+ */
  }

  .form-control {
   text-align: center;
   border-radius: 0px 0px 0px 0px;
   color: #393939;
   font-size: 11px;
  }


}
/* fin IPADS HORIZONTAL */



/* iPads (Orientacion VERTICAL) ----------- */
@media only screen
and (min-width : 320px)
and (max-width : 780px) {


.form-control:focus {
   width: 80%;
   font-size: 9px;
   /*  background: -webkit-linear-gradient(top, #9bc3f2 1%,#77d1ef 90%,#207cca 81%,#7db9e8 50%); /* Chrome10+,Safari5.1+ */
   background: -webkit-linear-gradient(top, #FA3324 1%, #F8B7B4 60%, #F88C8C 81%, #FCBDBD 50%); /* Chrome10+,Safari5.1+ */
  }

  .form-control {
   text-align: center;
   border-radius: 0px 0px 0px 0px;
   color: #393939;
   font-size: 9px;
  }

  #tablaunic{
  margin-top: 80px;

  }



}
/* fin IPADS VERTICAL */


</style>
  </head>
  <body lang=FR-CA onload="inicio()">
    <section class="formulario1">
      <form name="formulario" id="formulario" method="post" action="" onsubmit="return false" autocomplete="off">
        <input type="hidden" name="graba" id="graba" value="<?php echo $graba?>">
        <input type="hidden" name="d1" id="d1" value="<?php echo $d1?>">
        <input type="hidden" name="cont1" id="cont1" value="">
        <input type="hidden" name="fichero1" id="fichero1" value="<?php echo $fichero1?>">
        <input type="hidden" name="informe" id="informe" value="">
        <input type="hidden" name="plantilla" id="plantilla" value="">
        <input type="hidden" name="nom1" id="nom1" value="">
        <input type="hidden" name="vactiva1" id="vactiva1" value="">

        <table border=3 cellpadding=0 class="tablat" id="tablaunic" cellspacing=0>
        <tr>
            <td rowspan="6" WIDTH="34" HEIGHT="50" ><img  src="./img/logolacroix.png" width="30" align="center" ></td>
            <td align="Center" colspan="4" style="font-size:26px">Historique - Rapport - Autobus</td>
        </tr>
        <tr>
    <td>
    <div class="content-popup1">
        <div class="resultado1">
         <input NAME="comp1" type="hidden" class="form-control1" id="comp1" onblur="fococodigoq(this.id)" onFocus="fococodigoa(this.id)" autocompete="off" style="text-transform:uppercase; width: 70%; max-width: 70%; text-align: left; height: 52px; padding: 5px; " placeholder="Rechercher des noms..">
         </div>
    </div>


  </td>
  </tr>


                 <tr>
                 <td align="left" >
                 <SELECT NAME="cate" id="cate" SIZE=1 onChange="" style="width:260px; height:60px; font-size:26px">
                 <OPTION VALUE="1">Toutes les Dates</OPTION>
                 <OPTION VALUE="2">Dernière Semaine</OPTION>
                 <OPTION VALUE="3">Dernièr Mois</OPTION>
                 <OPTION VALUE="4">Dernière Année</OPTION>
                 <OPTION VALUE="0">Selectione</OPTION>
                 </SELECT>
                 <a><input onclick="buscar3('OUI')" name="boton3" id="boton3" type="button" value="Valider" style="background-color: #FAA2A2; border: 1px solid black; width: 140px; height: 60px; padding: 3px; font-size: 19px"></a>
                 </td>
                 </tr>

                  <tr style="font-size: 15px;">
                  <td valign="middle" align="left">Date Initiale
                  <input type="text" name="favis1" id="favis1"  value="" class="fechaid">
                  Date Finale
                  <input type="text" name="favis2" id="favis2"  value="" class="fechaid">
                  <a><input  style="background-color: #FAA2A2; border: 1px solid black; width: 100px; height: 100%;" onclick="buscar3('NON')" name="boton3" id="boton3" type="button" value="Valider"></a>
                 </td>
                  </tr>



        </table>




        <table class="tablat" border=1 id ="your-table-id" cellspacing=0 cellpadding=0>
          <tr>
          <td>





          </td>
          </tr>
          <tr align="center">
          <td width="1%"></td>
          <td width="15%">Date</td>
          <td width="14%">No Document</td>
          <td width="24%" colspan="2">Création</td>
          <td width="24%" colspan="2">Dernière Modification</td>
          <td width="8%">Editer</td>
               <!--  <td width="13%">Effacer</td> -->
          </tr>

          <tr style="font-size:16px; font-weight: bold;">
          <tbody id="ProSelected1"><!--Ingreso un id al tbody-->
          <tr>
          </tr>
          </tbody>

          <tr>
          <td colspan="11" align="right">
          <a href="javascript:void(0);" onclick="cancelar()"><img  src="./img/close.png" alt="Editer" width="25px" height="30px;"></a>
          </td>
          </tr>

        </table>
            <!-- RESULTADO -->
    <div id="popup" style="display: none;">
    <div class="content-popup">
       <div class="close"><a href="#" id="close"><img src="./img/close.png"/></a></div>
       <div id="resultado">
       </div>
    </div>
    </div>
    <!-- FIN RESULTADO -->

      </form>
    </section>

    <div>






    </div>
</div>


<style type="text/css">
  .modalWindow {
position: fixed;
font-family: arial;
font-size:80%;
top: 0;
right: 0;
bottom: 0;
left: 0;
background: rgba(0,0,0,0.2);
z-index: 99999;
opacity:0;
-webkit-transition: opacity 400ms ease-in;
-moz-transition: opacity 400ms ease-in;
transition: opacity 400ms ease-in;
pointer-events: none;
}
.modalHeader h2 { color: #189CDA; border-bottom: 2px groove #efefef; }
.modalWindow:target {
opacity:1;
pointer-events: auto;
}
.modalWindow > div {
width: 500px;
position: relative;
margin: 10% auto;
-webkit-border-radius: 5px;
-moz-border-radius: 5px;
border-radius: 5px;
background: #fff;
}
.modalWindow .modalHeader { padding: 5px 20px 0px 20px; }
.modalWindow .modalContent { padding: 0px 20px 5px 20px; }
.modalWindow .modalFooter { padding: 8px 20px 8px 20px; }
.modalFooter {
background: #F1F1F1;
border-top: 1px solid #999;
-moz-box-shadow: inset 0px 13px 12px -14px #888;
-webkit-box-shadow: inset 0px 13px 12px -14px #888;
box-shadow: inset 0px 13px 12px -14px #888;
}
.modalFooter p {
color:#D4482D;
text-align:right;
margin:0;
padding: 5px;
}
.ok, .close, .cancel {
background: #606061;
color: #FFFFFF;
line-height: 25px;
text-align: center;
text-decoration: none;
font-weight: bold;
-webkit-border-radius: 2px;
-moz-border-radius: 2px;
border-radius: 2px;
-moz-box-shadow: 1px 1px 3px #000;
-webkit-box-shadow: 1px 1px 3px #000;
box-shadow: 1px 1px 3px #000;
}
.close {
position: absolute;
right: 5px;
top: 5px;
width: 22px;
height: 22px;
font-size: 10px;
}
.ok, .cancel {
width:80px;
float:right;
margin-left:20px;
}
.ok:hover { background: #189CDA; }
.close:hover, .cancel:hover { background: #D4482D; }
.clear { float:none; clear: both; }



</style>



<!-- FIN FIN FIN MODAL MODAL -->


   </body>
</html>
