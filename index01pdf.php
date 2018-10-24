<?php 
require_once("./fpdf181/dompdf/dompdf_config.inc.php");
// Introducimos HTML de prueba
include ("./conectar4.php"); 
$informe="Rapport Autobus";
$docmae = "";
$d2="Sin numero";
$chomae = "";
$busmae = "";
$datmae = "";


if(isset($_GET['docmov'])){
  $docmae = $_GET['docmov'];
}
if(isset($_POST['docmov'])){
  $docmae = $_POST['docmov'];
}

if(isset($_GET['chomae'])){
  $chomae = $_GET['chomae'];
}
if(isset($_POST['chomae'])){
  $chomae = $_POST['chomae'];
}



$d2="Autob".$docmae;

//$ruta = "./php/archivos/pdf/"."Autob".$docmae.".pdf";
$ruta = "/php/archivos/pdf/"."Autob".$docmae.".pdf";

$busmae="xxxx";
$firstname = "NA";
$lastname = "NA";



$sql = "SELECT * from autobusmae WHERE docmae='$docmae'";
$query = $conn->query($sql);
while($row = $query->fetch_array()){
      $datmae = $row['datmae'];
      $busmae = $row['busmae'];
      $chomae = $row['chomae'];
      $horadepart  = $row['hr2mae'];
      $horallegada = $row['hr3mae'];
}

$sql = "SELECT * from autobusemp where numemp='$chomae'";
$query = $conn->query($sql);
while($row = $query->fetch_array()){
  $firstname = $row['nomemp'];
  $lastname = $row['apeemp'];
}
$nombreauto=$firstname."  ".$lastname;    


$codigoHTML = '
<title></title>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimun-scale=1">
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
<link href="./estilos/tabla1.css" rel="stylesheet" media="screen" type="text/css">

      <table class="tablat" id="tablat" border=1 cellspacing=0 cellpadding=0>
        <tr>
        <th rowspan="5" width="16" height="80" ><img  src="./img/logolacroix.png" width="13" height="70"  ></th>
        
        <td align="Center" colspan="4" style="font-size:16px">'.$informe.'</td>
        </tr>
        
        <tr>
        <th align="left" style="font-size:12px">Numéro Document</th>
        <th colspan="3" align="left" style="font-size:11px">'.$docmae.'</th>
        </tr>

        <tr>
        <th valign ="middle" align="left" style="font-size:12px">Date</th>
        <th colspan="3"  align="left"  style="font-size:11px">'.$datmae.'</th>
        </tr>
        
        <tr>
        <th align="left" style="font-size:12px">Autobus</th>
        <th colspan="3" align="left"  style="font-size:11px">'.$busmae.'</th>
        
        </tr>
        
        <tr>
        <th align="left" style="font-size:12px">Chauffeur</th>
        <th   align="left"  style="font-size:11px">'.$chomae.'</th>
        <th colspan="2"  align="left"  style="font-size:11px">'.$nombreauto.'</th>
        </tr>

        </table>

          <table class="tablat" id="tablat" border=2 cellspacing=0 cellpadding=0>
          <tr style="text-align: center; font-size:13px">
          <td>Item</td>
          <td>Numéro</td>
          <td>Prenom de l`employé </td>
          <td>Nom de l`employé  </td>
          <td>Genere</td>
          </tr>
          ';
          $lin1 = 0;
          $cod1= "";
          $cod2= "";
          $cod3= "";
          $cod4= "";
          $cont1 = 0;
          $cont2 = 0;
          $cont3 = 0;
          $sql = "SELECT * from autobusmov WHERE docmov='$docmae'";
          $query = $conn->query($sql);
          while($row = $query->fetch_array()){
                $lin1=$lin1+1;
                $cod1 = $row['nummov'];
                $cod2 = $row['nommov'];
                $cod3 = $row['apemov'];
                $cod4 = $row['sexmov'];


                if ($cod1 == ''){
                    if ($cod4 == 'Homme'){
                     $cont2 = $cont2+1;
                    }
                    if ($cod4 == 'Femme'){
                     $cont3 = $cont3+1;
                    }
            
                }else{
                 $cont1 = $cont1+1;
                

                }                  
                $codigoHTML.=' 
                <tr style="font-size:12px; text-align: center;">
                <td>'.$lin1.'</td>
                <td>'.$cod1.'</td>
                <td style="text-align: left; padding-left: 5px;">'.$cod2.'</td>
                <td style="text-align: left; padding-left: 5px;">'.$cod3.'</td>
                <td>'.$cod4.'</td>
                </tr>
                ';
               
          }

         $codigoHTML.=' 
         <tr>
         <td colspan="5"></td>
         </tr>
         </table>
         <table class="tablat" id="tablat" border=2 cellspacing=0 cellpadding=0>
         <tr style="text-align: center; font-size:13px">
         <td>Homme nouveau</td>
         <td>Nouvelles femmes</td>
         <td>Ancien employé</td>
         <td>Total</td>
         </tr>
         <tr style="text-align: center; font-size:13px">
         <td>'.$cont2.'</td>
         <td>'.$cont3.'</td>
         <td>'.$cont1.'</td>
         <td>'.$lin1.'</td>
         </tr>


         </table>
        
         ';

$codigoHTML=utf8_encode($codigoHTML);
$dompdf=new DOMPDF();
//$paper_size = (25,15,760,590);
//$dompdf->set_paper($paper_size);
$dompdf->set_paper("letter","portrait");  //tiene que ser horizontal y lo deja en vertical 
$dompdf->load_html(utf8_decode($codigoHTML));
ini_set("memory_limit","128M");
$dompdf->render();
$output = $dompdf->output();
file_put_contents($ruta, $output);
//$dompdf->stream($ruta);
$dompdf->stream($ruta, array("Attachment" => false));
//fin de creacion del PDF //

//include "./php/enviaradjunto.php";
//$res = array('error' => false);
//$res['results'] = $d2;
//echo json_encode($res);

?>
