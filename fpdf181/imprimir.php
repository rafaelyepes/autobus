<?php	

require_once("dompdf/dompdf_config.inc.php");
include ("../conectar.php");  

$datepr = $_POST["fecha"];

$codigoHTML='

<!DOCTYPE html PUBLIC "-//W3C//Dth XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/Dth/xhtml1-transitional.dth">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Documento sin título</title>

<link href="../proyecto1/estilos/tabla1.css" rel="stylesheet" media="screen" type="text/css">
<link href="../plantilla/estilos/botonboots1.css" rel="stylesheet" media="screen" type="text/css">

<style>

.tablatit
{
font-family: arial;
font-size: 12px;
border:  1px solid;
text-align: center;
font-weight: bold;
}

.tablatid
{
font-family : arial;
font-size: 13px;
border:  1px solid;
text-align: left;
font-weight: bold;
width: 1002px;
margin-top: 10px;
}


.tablad
{
set font-family : times;
font-size:12px;
border:  1px solid;
text-align: center;
}

td
{
width: auto;
}


</style>

</head>


<body>
<div id="contenedor">
<table cellpadding="0" cellspacing="0" class="tablat" border="1">
<tr>
<th colspan="2" width="999px">FDC BARATTES</th>
</tr>

<tr class="tablatid">
<td colspan="2">
Procédure: Les responsables du barattage/pesage ou leurs substituts ont la responsabilité de suivre les recettes. Ils doivent s assurer de peser/ajouter les bons ingrédients et/ou la bonne quantité au mélange Chaque recette sera consignée dans le formulaire de surveillance.
</td>
</tr>

<tr class="tablatid">
<td colspan="2">
Fréquence: Le responsable à chaque recette, le surveillant (contrôle qualité) 1X par jour.
</td>
</tr>

<tr class="tablatid">
<td colspan="2">
Limites et rectifications: Lors d un écart, ex. erreur de recette, température non-conforme, le responsable avise le CQ et celui-ci prend les mesures nécessaires pour corriger la non-conformité immédiatement. Le CQ rempli le  registre d écart.
</td>
</tr>
<tr>
<td>Date</td>
<td align="left">'.$datepr.'.</td>
</tr>

</table>

<table cellpadding="0" cellspacing="0" class="tablatid" border="1">

   <tr class="tablatit">
    <td colspan="3">   </td>
    <td  colspan="12" align="center">Ingrédients</td>
    <td colspan="6">  </td>
    <td colspan="2" rowspan="2" align="center">Initial</td>
   </tr>
   <tr class="tablatit">
    <td colspan="3">  </td>
    <td colspan="3" align="center">Viande</td>
    <td colspan="6" align="center">Épices - Sauce</td>
    <td colspan="3" align="center">Ajout1 Glaze/Huile</td>
    <td colspan="3" align="center">Ajout2 Glaze/Huile</td>
    <td colspan="3" > </td>    
   </tr>


    <tr class="tablatit">
    <td>HeureD</td> 
    <td>Recette</td>
    <td>Mela</td>
    <td>Code</td>
    <td>Kg</td>
    <td>.....DateP.....</td>
    <td>Code</td>
	  <td>Kg</td>
    <td>Nb.Sac</td>
    <td>Lot</td>
    <td>Eau.Kg</td>
    <td>Glace</td>
    <td>...Code...</td>
    <td>Kg</td>
    <td>Lot</td>

    <td>...Code...</td>
    <td>Kg</td>
    <td>Lot</td>

    <td width="3px">PoidsF</td>
    <td width="3px">Temp.°C</td>
    <td width="3px">Heuref</td>
  	<td width="3px">Resp</td>
	  <td width="3px">CQ</td>
</tr>


';


$i2=" ";        
$sel_lineas="SELECT tablag.* FROM tablag WHERE tablag.datepr='$datepr' AND tablag.i2='$i2' order by heured";
$rs_lineas=mysql_query($sel_lineas);
$lin=1;
while($res=mysql_fetch_array($rs_lineas)){





                  $kgdeviandeb=$res['kgdeviande'];

                  $kgdeviande=$res['kgdeviande']+$res['kgdevianden'];
                  $kgepices=$res['kgepicesp'];
                  $eau=$res['eaup'];
                  $glace=$res['glacep'];
                  $kgajout=$res['kgajoutp'];
                  $kgajout2=$res['kgajoutp2'];


		              $loteajouttp=$res['loteajout'];
                  $loteajouttp2=$res['loteajout2'];


                  $kgepices=$kgdeviande*$kgepices;
                  $eau=$kgdeviande*$eau;
                  $glace=$kgdeviande*$glace;
                  $nbsac=0;
                  $respo=$res['respon'];  
                  $respo1=$res['cq'];  
                  $kgajout=$kgdeviande*$kgajout;
                  $kgajout2=$kgdeviande*$kgajout2;

                  $poids=$kgdeviandeb+$kgepices+$eau+$glace+$kgajout+$kgajout2;
    
                  $kgdeviande=number_format($kgdeviande, 2, ",", ".");  
                  $poids=number_format($poids, 2, ",", ".");  
                  $kepices=number_format($kgepices, 2, ",", ".");  
                  $glace=number_format($glace, 2, ",", ".");  
                  $kgepices=number_format($kgepices, 2, ",", "."); 
                  $eau=number_format($eau, 2, ",", "."); 

    
                  $lin++ ;    
		  $codigoHTML.='
                  <tr class="tablad">
                  <td>'.substr($res['heured'],0,5).'</td>
                  <td>'.$res['recete'].'</td>
            	    <td>'.$res['melagne'].'</td>
                  <td align="center">'.$res['codeviande'].'</td>
                  <td style="text-align: right">'.$kgdeviande.'</td>
                  <td align="center">'.$res['datep'].'</td>
                  <td align="center">'.$res['codeajout'].'</td>
                  <td style="text-align: right">'.$kgepices.'</td>
                  <td align="center">'.$nbsac.'</td>
                  <td align="center">'.$res['loteepices'].'</td>
                  <td style="text-align: right">'.$eau.'</td>
                  <td style="text-align: right">'.$glace.'</td>
                  <td align="center">'.$res['code1ajout'].'</td>
                  <td style="text-align: right">'.$kgajout.'</td>
                  <td align="center">'.$loteajouttp.'</td>

                  <td align="center">'.$res['code2ajout'].'</td>
                  <td style="text-align: right">'.$kgajout2.'</td>
                  <td align="center">'.$loteajouttp2.'</td>

                  <td align="right" width="3px">'.$poids.'</td>
                  <td align="right" width="3px">'.$res['temp'].'</td>
                  <td align="center" width="3px">'.substr($res['heuref'],0,5).'</td>
                  <td align="center" width="3px">'.$respo.'</td>
                  <td align="center" width="3px">'.$respo1.'</td>
				        </tr>
';                        
}

$codigoHTML.='


</table>
<div id="piedepagina"><!--Empieza div pie de página-->
<p align="right">Signature superviseur ______________________________</p>
<p align="left">A L exclisivité de: Les Viandes LaCroix Inc./MAJ25-01-2016</p>
  <!--Termina div pie de página-->
</div>
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
$dompdf->stream("Reporte_tabla_usuarios.pdf");
?>
