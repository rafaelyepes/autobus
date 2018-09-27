<!DOCTYPE html PUBLIC>
<html lang="es">
<head>

<title>LacroixNet</title>
<meta http-equiv="Content-type" content="text/html; charset=utf-8" />
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
<script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>>

</head>

<?php

$d2 = $_GET["d2"];
$ruta = $_GET["ruta"];
$d1 = $_GET["d1"];
$nombreruta=$_GET["nomruta"];
$rutacompleta=$_GET["rutacompleta"];

$rutacompleta=substr($rutacompleta,0,40);


$ruta2="C:/wamp/www/proyecto1/accia/".$nombreruta;
        if (file_exists($ruta2)) {
         $controlfi="SI"; 
        } else {
         mkdir ($ruta2);
        }
$myArray = explode(';', $d2);
$ruta2=$ruta2."/";
$long=count($myArray);
$long = $long - 1;
print_r($myArray);
echo ("<br>");
echo ("<br>");

$ruta1="C:/wamp/www/plantilla/archivos/fdc/";
echo ($ruta1);
echo ("<br>");
echo ("<br>");
echo ("<br>");
echo ($ruta2);



//$ruta2="C:/wamp/www/plantilla/archivos/accia/";
//$ruta2="C:/wamp/www/dir/accia/";



opendir($ruta1);

for ($ia=0; $ia<$long; $ia++){

$d2=$myArray[$ia];

$archivoi = $ruta1.$d2.".pdf";

$d2=$rutacompleta."-".$d2;

$archivof = $ruta2.$d2.".pdf";


//echo ($d2);

copy($archivoi,$archivof);

} //fin del ciclo for

?>
</html>
<script type="text/javascript">
  alert ("Correctement déposé");
  window.close();


</script>