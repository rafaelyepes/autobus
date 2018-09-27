<?php	

require_once("dompdf/dompdf_config.inc.php");
include ("../conectar.php");  

$loteepicesx1 = $_POST["codeepices1"]; 
$datepr = $_POST["fecha"]; 
$dateprf = $_POST["fechaf"]; 


$codigoHTML='

<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>
<style>

H1.SaltoDePagina
{
  page-break-after: always;
  border: 0;
  margin: 0;
  padding: 0;
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
width: 940px;
height="90%";
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
    <tr class="modo3">	
    <td>Code Epices</td> 
    <td>Lote Epices</td>   
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


     
$sel_lineas="SELECT * FROM tablainvepice WHERE (epicecodigo='$loteepicesx1')";


$rs_lineas=mysql_query($sel_lineas);
for ($i = 0; $i < mysql_num_rows($rs_lineas); $i++) {
                  $nbsac=0;
                  $entrada=$entrada+mysql_result($rs_lineas,$i,'epiceentrada'); 


$codigoHTML.='
		  <tr>
		  <td align="center">'.mysql_result($rs_lineas,$i,'epiceentrada').'</td>
		  <td align="center">'.mysql_result($rs_lineas,$i,'epicecodigo').'</td>
 		  <td align="center">'.mysql_result($rs_lineas,$i,'epicebarra').'</td>
 		  <td align="center">'.mysql_result($rs_lineas,$i,'epicefecha').'</td>
                  <td align="center">Réception</td>
		  <td align="center">'.mysql_result($rs_lineas,$i,'epiceentrada').'</td>
        	  <td align="center">Réception</td>
		  </tr>
';	
} 
$i2=" ";        
$sel_lineas2="SELECT * FROM tablag  WHERE (tablag.i2='$i2' and codeajout='$loteepicesx1' and datepr>='$datepr' and datepr<='$dateprf')";
$rs_lineas2=mysql_query($sel_lineas2);
while($res1=mysql_fetch_array($rs_lineas2)){
  		  $codeviande=$res1['codeviande'];  
		  $datep=$res1['datepr'];  
                  $codeepices=$res1['codeajout'];  
                  $loteepices=$res1['loteepices'];  
                  $kgdeviande=$res1['kgdeviande'];
                  $kgepices=$res1['kgepicesp'];
                  $eau=$res1['eaup'];
                  $glace=$res1['glacep'];
                  $kgajout=$res1['kgajoutp'];
 		  $respo=$res1['respon'];
                  $cq=$res1['cq'];

		  $produit = "Produit-".$res1['codeviande'];

		  $heured=substr($res1['heured'],0,5);
                  $melagne=$res1['melagne'];
                  $heuref=substr($res1['heuref'],0,5);
		  $temp=$res1['temp'];
                  $id=$res1['id'];
                  $kgepices=$kgdeviande*$kgepices;
                  $eau=$kgdeviande*$eau;
                  $glace=$kgdeviande*$glace;
                  $nbsac=0;
                  $kgajout=$kgdeviande*$kgajout;
                  $poids=$kgdeviande+$kgepices+$eau+$glace+$kgajout;
                  $salida=$salida+$kgepices;
		  $kgepices=number_format($kgepices, 2, ',', ','); 
$codigoHTML.='
		  <tr>
		  
 		  <td align="center">'.$codeepices.'</td>     

                  <td align="center">'.$loteepices.'</td>
            	  <td align="center">'.$datep.'</td>
                  <td align="center">'.$produit.'</td>
            	  <td align="center">'.$kgepices.'</td>
		  <td align="center">   </td>
                
		   
		  


  		  </tr>
';
}
$codigoHTML.='
    </table>
    <table class="tabla1">
    <tr>
    <td align="center" colspan="8">BALANCE</td>
    </tr>
    <tr>
    <td align="center">Réception</td>
    <td align="center">'.$entrada.'</td>
    <td align="center">Produit</td>
    <td align="center">'.$salida.'</td>
    <td align="center">Ajustements</td>
    <td align="center">'.$ajuste.'</td>
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
//$dompdf->set_paper($paper_size);   //Vertical

//$dompdf->set_paper('letter', 'portrait');

$dompdf->set_paper("letter","landscape");  //Horizontal 

$dompdf->load_html(utf8_decode($codigoHTML));
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Reporte_tabla_usuarios.pdf");
?>
