<!DOCTYPE html PUBLIC>
<html lang="es">

<?php 
include ("./conectar.php"); 
include ("../proyecto1/autentican.php");
$d1 = "";
if(!isset($_SESSION)) { session_start(); }
$nomusu=$_SESSION['nomusu']; 
$d1 = $nomusu; 
ini_set('display_errors', 'On');
ini_set('display_errors', 1);
$fechahoy=date("Y-m-d");
$graba = 'NO';
$cont1 = array();
$d1 = "";
include ("../proyecto1/indexg1.php"); 
?>    
<head>
<title>LacroixNet</title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimun-scale=1">
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>

<link href="../estilos/tabla1000.css" rel="stylesheet" media="screen" type="text/css">
<link href="../proyecto1/estilos/tabla1.css" rel="stylesheet" media="screen" type="text/css">
<link href="estilos/botonboots.css" rel="stylesheet" media="screen" type="text/css">

<script>
var FieldCount1 = 1;  
var swg="NO";

function cancelar()
{
          location.href="../proyecto1/indexg1.php";     
}

function descargarExcel()
{

                     document.getElementById("formulario").submit();
}

function eliminar(id) {
idx=id;
//alert (idx);
if(confirm('Voulez-vous supprimer cette colonne')) /* si on clique sur ok */
{
 swg="SI";
// document.getElementById("did").value=idx;
 window.open("baseelim4inf.php?codigo="+idx); 
}
else
{
//alert('Vous avez cliqué sur annuler !');/* sinon on en affiche une autre */
}
}


$(document).ready(function() {
///aqui va la informacion del 2dooooooo arreglo
//     $(document).ready(function() {

                var MaxInputs       = 5000; //maximum input boxes allowed
                var contenedor       = $("#contenedor"); //Input boxes wrapper ID
                var AddButton1       = $("#agregarCampo1"); //Add button ID
              //  var ConButton       = $("#consultaCampo"); //Add button ID
                var poids;
                var  xn = 0;     //inicio de la variable del arreglo nO 2
                if (xn == 0){
                  var xn = contenedor.length; //initlal text box count
                  var xn = $("#contenedor div").length + 1;
                } else {
                   xn++; 
                }

               
                $(AddButton1).click(function (e)  //on add input button click
                {
                  if(xn <= MaxInputs) //max input box allowed
                  {
                    
                            FieldCount1++; //text box added increment
                            //add input box
                           var newtr = '<tr class="item"  data-id="'+ FieldCount1+'">';

                           newtr = newtr + '<td align="center"><input class="form-control" type="hidden" id="poid'+ FieldCount1 +'" name="mitexto11[]"  value="0" required /></td>';

                           newtr = newtr + '<td align="left" width="20%"><input style="width: 100%;  min-width: 100%;" class="form-control1" id="poids'+ FieldCount1 +'" name="mitexto11[]" value="" required /></td>';
          
                           newtr = newtr + '<td align="left" width="30%"><input style="width: 100%;  min-width: 100%;" class="form-control1" id="poida'+ FieldCount1 +'" name="mitexto11[]" value="" required /></td>';

                           newtr = newtr + '<td align="left" width="15%"><input style="width: 100%;  min-width: 100%;" class="form-control1" id="poidb'+ FieldCount1 +'" name="mitexto11[]" value="" required /></td>';

                           newtr = newtr + '<td align="left" width="15%"><input style="width: 100%;  min-width: 100%;" class="form-control1"  id="poidc'+ FieldCount1 +'" name="mitexto11[]" value="" required /></td>';

                            newtr = newtr + '<td align="left" width="15%"><input style="width: 100%;  min-width: 100%;" class="form-control1"  id="poidd'+ FieldCount1 +'" name="mitexto11[]" value="" required /></td>';

                           newtr = newtr + '<td align="center"><a href="#" class="eliminar1"><input align="center"  id="poid'+ FieldCount1 +'" name="mitexto12[]" type="checkbox" value="0"></a></td></tr>';


                         $('#ProSelected1').append(newtr); //Agrego el Producto al tbody de la Tabla con el id=ProSelected
            
                    
                                     xn++; //text box increment
                    }
                    return false;
                    });

                   $("body").on("click",".eliminar1", function(e){ //user click on remove text
                                  if( xn >= 1 ) {
                                      $(this).parent('td').parent('tr').remove();
                                          $(this).parent('div').remove(); //remove text box
                                          xn--; //decrement textbox
                                  }
                          return false;
                          });

                  $("body").on("click",".eliminarx", function(e){ //user click on remove text
                  if (( xn >= 1) && (swg == "SI")) {
                  $(this).parent('td').parent('tr').remove();
                  $(this).parent('div').remove(); //remove text box
                  xn--; //decrement textbox
                 }
                 swg="NO";
                 return false;
                });




//fin de la informacion del 2do arreglo





});  //fin del documento read






    </script>
  <style type="text/css">












  .added {
                float: center;
                margin-right: 10px;
              /*  background-color: #FFFFFF;*/
                border: 1px solid #CCCCCC;
                box-shadow: 0 0px 0px rgba(0, 0, 0, 0.075) inset;
                transition: border 0.2s linear 0s, box-shadow 0.2s linear 0s;
                border-radius: 4px 4px 4px 4px;
                color: #555555;
                display: inline-block;
                font-size: 15px;
                height: 30px;
                line-height: 0px;
                margin-bottom: 0px;
                padding: 0px 1px;
                vertical-align: middle;
                width: 100%;
      }

  .added1 {
                text-align: center;
                background-color: #FFFFFF;
                color: #555555;
                width: 45%;
                height: 99%;
                  font-size: 24px;
      }
            
  .added1:focus {
                border-color: rgba(82, 168, 236, 0.8);
                outline: 0 none;
                -webkit-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(82,168,236,.6);
                -moz-box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(82,168,236,.6);
                box-shadow:inset 0 1px 1px rgba(0,0,0,.075),0 0 8px rgba(82,168,236,.6);
            }
            a {
                text-decoration: none;
            }
 #wrapper {
                width: 80%;
                margin: 7px auto 0;
            }
         .eliminar {
                margin: 5px;
            }
  </style>
  </head>
  <body lang=FR-CA onload="inicio()">
    <section class="formulario1">    
      <form name="formulario" id="formulario" method="post" action="baseforcb.php"> 
      

        <input type="hidden" name="graba" id="graba" value="<?php echo $graba?>">
        <input type="hidden" name="d1" id="d1" value="<?php echo $d1?>">
        <input type="hidden" name="cont1" id="cont1" value="">
        <table border=3 cellpadding=0 class="tablat"  cellspacing=0>
        <tr>
            <td rowspan="5" WIDTH="50" HEIGHT="50" ><img  src="./img/logolacroix.png" width="30" ></td>
            <td align="Center" colspan="4" style="font-size:26px">Rapports de base</td>
        </tr>

        <tr>
                  <td>Rapport</td>
                  <td align="center"> 
                  <input class="form-control" NAME="nom3" type="hidden" id="nom3" width="90%">
                  <select class="form-control" align="center"  name="nom1" id="nom1" value="  "  onchange='buscar1()' style="font-size: 28px;">
                             <option value="" selected="selected"></option>"  
                             
                  </select>
                  </td>
                  <td align="right" width="20%">  <a  id="buttonId" onClick="this.disabled=true" href="javascript:descargarExcel()"><img id="editar" src="./img/enregistre.png" width="100%" height="58%" alt="Editer"></a></td>
       
        </tr>

       
        </table>

        <table class="tablat" border=1 id ="your-table-id" cellspacing=0 cellpadding=0>
          <tr align="center">
          <td width="1%"></td> 
          <td width="20%">Codes</td> 
          <td width="30%">Codes</td> 
          <td width="10%">Codes</td> 
          <td width="10%">Codes</td> 
          <td width="10%">VERSION</td> 
          <td width="20%"><img width="40%" height="55%" src="../plantilla/img/effacer.jpg"/></td>

          </tr>

          <tr style="font-size:16px; font-weight: bold;">
		    

          <tbody id="ProSelected1"><!--Ingreso un id al tbody-->
          <tr>
              <?php
                include ("../plantilla/baseforccnv.php"); 
          ?>
          </tr>
          </tbody>
          
          <tr style="font-size:16px; text-align: center">
          <th colspan="6">
          <a href="#" id="agregarCampo1" ><img  src="./img/button.png" /></a>          </th>
          </tr>
        
        
           <tr>
           <td colspan="6" align="right">
           <a href="javascript:void(0);" onclick="cancelar()"><img  src="./img/toucheretour.png" alt="Editer" width="19%" height="35%"></a>
          </tr>
             
              
        </table>
      </form>
    </section>
   </body>
</html>
