<?php 

require_once("dompdf/dompdf_config.inc.php");
include ("../conectar.php");  




$entrada=0;
$salida=0;
$ajuste=0;
$saldo=0;        

$loteepicesx= $_GET["codeepices"];
$loteepicesx1= $_GET["codeepices1"];

$codigoHTML='

<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

<style>

H1.SaltoDePagina
{
PAGE-BREAK-AFTER: always
}



#contenedor
{ 
text-align: left; 
width: 950px; 
height: 705px
margin: auto; 
} 


.tabla1
{
font-family: Verdana, Arial, Helvetica, sans-serif;
font-size:11px;
width: 950px;
border:  2px solid;}
}


.tabla1 th {
padding: 1px;
font-size: 12px;
background-color: #83aec0;
background-image: url(fondo_th.png);
color: #FFFFFF;
font-family: “Trebuchet MS”, Arial;
text-transform: uppercase;
border:  1px solid;}
}

.tabla1 .modo1 {
font-size: 12px;
font-weight:bold;
background-color: #;
background-image: url(fondo_tr01.png);
color: #000000;
font-family: “Trebuchet MS”, Arial;
}

.tabla1 .modo3 {
font-size: 11px;
font-weight:bold;
background-color: #;
color: #000000;
font-family: “Trebuchet MS”, Arial;
}

.tabla1 .fecha {
font-size: 12px;
font-weight:bold;
background-color: #;
color: #000000;
font-family: “Trebuchet MS”, Arial;
}


.tabla1 .modo3 td {
padding: 3px;
text-align:center;
border:  1px solid;}
}


.tabla1 .modo1 td {
background-image: url(fondo_tr01.png);
padding: 5px;
text-align:justif;
border:  1px solid;}
}

.tabla1 .modo2 {
font-size: 11px;
font-weight:bold;
font-family: “Trebuchet MS”, Arial;
text-align:center;
border:  1px solid;}
}

.tabla1 .modo2 td {
background-image: url(fondo_tr01.png);
padding: 3px;
text-align:auto ;
border:  1px solid;}
}

#piedepagina{
width: 100%;
  height: 50px;
  border-top: 0px solid #000;
  position: absolute;
  bottom: 0;
}

   
.tabla1 .modo3 {
  background-color:#;
}

.tabla1 .modo4 {
  background-color:#f5f5f5;
  table-layout: auto;
  border:  1px solid;}
}

</style>



</head>
<body>
<div id="contenedor">
<table cellpadding="0" cellspacing="0" class="tabla1">
    <tr class="modo1">
    <td>'.$loteepicesx.'</td>    
    <td>'.$loteepicesx1.'</td>
    <td colspan="4"> </td>
    </tr>
    <tr class="modo1">
    <td>Code L Epices</td> 
    <td>Lote L Epices</td>     
    <td>Date</td>
    <td>Type</td>
    <td>Quantité</td>
    <td>Note</td>
    </tr>
    
';

$entrada=0;
$salida=0;
$ajuste=0;
$saldo=0;        
$sel_lineas="SELECT * FROM tablainvepice WHERE epicebarra='$loteepicesx' AND epicecodigo='$loteepicesx1'";
$rs_lineas=mysql_query($sel_lineas);
$lin=1;
while($res=mysql_fetch_array($rs_lineas)){
                  $nbsac=0;
                  $entrada=$res['epiceentrada'];
                  $entrada1=$res['epicecodigo'];
                  $entrada2=$res['epicebarra'];
                  $entrada3=$res['epicefecha'];
                  $entrada4=number_format($res['epiceentrada'], 2, ",", ".");

                  $lin++ ;

    
$codigoHTML.='

    <tr>
    <td align="center">'.$entrada1.'</td>
    <td align="center">'.$entrada2.'</td>
    <td align="center">'.$entrada3.'</td>
    <td align="center">Réception</td>
    <td align="center">'.$entrada4.'</td>
    <td align="center"> </td>
	</tr>


';

    
}

$i2=" ";        
$sel_lineas="SELECT tablag.*,tablap.* FROM tablag INNER JOIN tablap on tablag.recete=tablap.recete and tablag.codeviande=tablap.codeviande WHERE (tablag.i2='$i2' and tablag.loteepices='$loteepicesx' and tablag.codeajout='$loteepicesx1') ORDER BY datepr";
$rs_lineas=mysql_query($sel_lineas);
for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {
                  $codeepices=mysql_result($rs_lineas,$i,'codeajout');    
                  $kgdeviande=mysql_result($rs_lineas,$i,'kgdeviande');
                  $kgepices=mysql_result($rs_lineas,$i,'kgepices');
                  $eau=mysql_result($rs_lineas,$i,'eau');
                  $glace=mysql_result($rs_lineas,$i,'glace');
                  $kgajout=mysql_result($rs_lineas,$i,'kgajout');
                  $datep=mysql_result($rs_lineas,$i,"datep");
                  $kgepices=$kgdeviande*$kgepices;
                  $eau=$kgdeviande*$eau;
                  $glace=$kgdeviande*$glace;
                  $nbsac=0;
                  $respo=mysql_result($rs_lineas,$i,'respon');
                  $cq=mysql_result($rs_lineas,$i,'cq');
                  $kgajout=$kgdeviande*$kgajout;
                  $poids=$kgdeviande+$kgepices+$eau+$glace+$kgajout;
                  $heured=substr(mysql_result($rs_lineas,$i,"heured"),0,5);
                  $melagne=mysql_result($rs_lineas,$i,"melagne");
                  $heuref=substr(mysql_result($rs_lineas,$i,"heuref"),0,5);
                  $temp=mysql_result($rs_lineas,$i,"temp");
                  $id=mysql_result($rs_lineas,$i,"id");
                  $salida=$salida+$kgepices;
                  $kgepices=number_format($kgepices, 2, ",", ".");  

$codigoHTML.='
  				  <tr>
                  <td align="center">'.$codeepices.'</td>      
            	  <td align="center">'.$loteepicesx.'</td>
            	  <td align="center">'.$datep.'</td>
                  <td align="center">Produit</td>
            	  <td align="center">'.$kgepices.'</td>
                  <td align="center"> </td>
              
				  </tr>
';
}


$sel_lineas="SELECT * FROM tablaajuste WHERE (ajepice='$loteepicesx' and ajcodigo='$loteepicesx1')";
$rs_lineas=mysql_query($sel_lineas);
for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {
  if ($i % 2) { $fondolinea="itemParTabla"; } else { $fondolinea="itemImparTabla"; } 
                  $nbsac=0;
                  $ajuste=$ajuste+mysql_result($rs_lineas,$i,"ajvalor");
                  $ajcodigo=mysql_result($rs_lineas,$i,"ajcodigo");
                  $ajepice=mysql_result($rs_lineas,$i,"ajepice");
                  $ajfecha=mysql_result($rs_lineas,$i,"ajfecha");
                  $ajvalor=number_format(mysql_result($rs_lineas,$i,"ajvalor"), 2, ",", ".");
                  $ajnotas=mysql_result($rs_lineas,$i,"ajnotas");


    $codigoHTML.='

                  <tr>
            	  <td align="center">'.$ajcodigo.'</td>
            	  <td align="center">'.$ajepice.'</td>
            	  <td align="center">'.$ajfecha.'</td>
            	  <td align="center">Ajustements</td>
                  <td align="center">'.$ajvalor.'</td>
            	  <td align="center">'.$ajnotas.'</td>
                  <td align="center"> </td>
				  </tr>
';
	
}
$saldo=$entrada-$salida+$ajuste;
  $entrada=number_format($entrada, 2, ",", "."); 
  $salida=number_format($salida, 2, ",", "."); 
  $ajuste=number_format($ajuste, 2, ",", "."); 
  $saldo=number_format($saldo, 2, ",", "."); 


$codigoHTML.='
 </table>
<table cellpadding="0" cellspacing="0" class="tabla1">
  <tr>
  <td align="center">Réception</td>
  <td align="center">'.$entrada.'</td>
  </tr>
  <tr>
  <td align="center">Produit</td>
  <td align="center">'.$salida.'</td>
  </tr>
  <tr>
  <td align="center">Ajustements</td>
  <td align="center">'.$ajuste.'</td>
  <tr>
  <td align="center">Balance</td>
  <td align="center">'.$saldo.'</td>
  </tr>
 </table>

    </div>
 </body>
</html>';
 
$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();

//$paper_size = array(25,15,760,590);
//$dompdf->set_paper($paper_size);


$dompdf->set_paper("letter","landscape");  //tiene que ser horizontal y lo deja en vertical 

$dompdf->load_html(utf8_decode($codigoHTML));
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Epices.pdf");


?>

  