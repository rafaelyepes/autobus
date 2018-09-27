<?php 
require_once("dompdf/dompdf_config.inc.php");
include ("../conectar.php");  

$codigoHTML='

<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN"
"http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="es" >

<head>
<title>Principal</title>
<meta charset="utf-8">
<meta name="viewport" content="widtd=device-widtd, user-scalable=no, initial-scale=1, maximun-scale=1, minimun-scale=1">

<link href="./estilos/bootstrap.css" rel="stylesheet" media="screen" type="text/css">
<link href="./estilos/varioscss.css" rel="stylesheet" media="screen" type="text/css">
 
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>        
	
<style>

H1.SaltoDePagina
{
PAGE-BREAK-AFTER: always
}



#contenedor
{ 
text-align: left; 
width: 930px; 
height: 705px
margin: auto; 
} 


.tabla1
{
font-family: Verdana, Arial, Helvetica, sans-serif;
font-size:11px;
width: 930px;
border:  1px solid;}
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
font-size: 10px;
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
    <section id="banner">
    <div class="tabla1">
         <table>
            <tr class="modo1">
            <td COLSPAN="10" align="left">LES VIANDES LACROIX INC</td>
            </tr>
            <tr class="modo1">
            <td COLSPAN="10" align="left">RECETTES</td>
            </tr>

            <tr class="modo1">
                    <td>Recette No</td>
					<td>Nombre</td>
					<td>Code Viande</td>
            		<td>Code epices</td>
                	<td>KG Epices</td>
                	<td>NB.SAC</td>
                	<td>Eau</td>
                	<td>Glace</td>
                	<td>Code Ajout</td>
                	<td>KG Ajout</td>
                </tr>
';
                    $consulta="SELECT * FROM tablap order by recete asc";
					$rs_tabla=mysql_query($consulta);
					$nrs=mysql_num_rows($rs_tabla);
					for ($i = 0; $i < mysql_num_rows($rs_tabla); $i++) {
                    $recete=trim(mysql_result($rs_tabla,$i,"recete"));
                    $codeviande=trim(mysql_result($rs_tabla,$i,"codeviande"));  
                    $rutaimagen="./img/".trim(mysql_result($rs_tabla,$i,"rutaimg"));	
					$nombre=mysql_result($rs_tabla,$i,"nombre");
					$codeviande=mysql_result($rs_tabla,$i,"codeviande");
					$codeepices=mysql_result($rs_tabla,$i,"codeepices");
					$kgepices=mysql_result($rs_tabla,$i,"kgepices");
					$nbsac=mysql_result($rs_tabla,$i,"nbsac");
					$eau=mysql_result($rs_tabla,$i,"eau");
					$glace=mysql_result($rs_tabla,$i,"glace");
					$codeajout=mysql_result($rs_tabla,$i,"codeajout");
                    $kgajout=mysql_result($rs_tabla,$i,"kgajout");


                    
$codigoHTML.='
            		<tr class="modo3">
                    <td align="center">'.$recete.'</td>
                    <td align="center">'.$nombre.'</td>
                    <td align="center">'.$codeviande.'</td>
                    <td align="center">'.$codeepices.'</td>
                    <td align="center">'.$kgepices.'</td>
                    <td align="center">'.$nbsac.'</td>
                    <td align="center">'.$eau.'</td>
                    <td align="center">'.$glace.'</td>
                    <td align="center">'.$codeajout.'</td>
                    <td align="center">'.$kgajout.'</td>
                    </tr>        
  ';                  
    				}
	$codigoHTML.='
       </table>
        </div>
    </section>
	</body>
</html>';


$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();

//$paper_size = array(25,15,760,590);
//$dompdf->set_paper($paper_size);


$dompdf->set_paper("letter");  //tiene que ser horizontal y lo deja en vertical 

$dompdf->load_html(utf8_decode($codigoHTML));
ini_set("memory_limit","128M");
$dompdf->render();
$dompdf->stream("Formules.pdf");


?>
