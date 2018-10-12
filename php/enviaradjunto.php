
      
     
        
        <!DOCTYPE html PUBLIC>
<html lang="es">
<head>
<title>LacroixNet</title>
<meta name="apple-mobile-web-app-capable" content="yes" />
<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">
</head>

<?php
header('Content-Type: text/html; charset=ISO-8859-1');
// para evitar que se nos detenga la ejecucion del script (en caso de que el servidor tarde en responder) definimos un intervalo de 5 minutos de inactividad
ini_set('max_execution_time', 300);
include "class.phpmailer.php";

//Recibir todos los parámetros del formulario

$para = "rafael.yepes@lacroixmeats.com";
$para1 = "paula.franco@lacroixmeats.com";
$para2 = "";
$asunto = "Asunto";
$mensaje = "Mensaje";

$username = 'docs@lacroixmeats.com';
$password = 'Docu1234';
 
// Enviamos la respuesta
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 2;//$mail->SMTPDebug = 1; // Degug. Valores 1 -> errores y mensajes // 2 solo mensajes // 0 no informa nada

//$mail->Host = "smtp.aol.com";
//$mail->Host = "stmp.yahoo.com";
//$mail->Host = "smtp.gmail.com";

$mail->Host = "smtp.office365.com";
$mail->Port = "587";
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = TRUE;
$mail->Username = $username;
$mail->Password = $password;
 
$mail->From = $username;
$mail->FromName = "Rafael Yepes";


//Agregar destinatario
$mail->AddAddress($para);
$mail->AddAddress($para1);
$mail->AddAddress($para2);

$mail->Subject = $asunto;
$mail->Body = $mensaje;

$d1="rafael.yepes@lacroixmeats.com";
$ruta="";
0.725---0.800
$d2="Autob117";
//$archivoi='C:\xampp\htdocs\autobus\archivos\pdf\Autob117.pdf';

$rutaadic='/archivos/pdf/'.$d2.'.pdf';
$archivoi=getcwd().$rutaadic;


//$archivoi='C:\xampp\htdocs\autobus\archivos\pdf'."'\'".$d2.".pdf";

//$archivoi = 'C:\xampp\www\autobus\archivos\pdf'.'"\"'.$d2.".pdf";

//$archivoi = 'C:\xampp\www\autobus\archivos\pdf'."'\'";
//.$d2.".pdf";

$d2g=$d2.".pdf";

echo ("Nombre del Archivo :".$d2);
echo ("    .     ");
echo ("<br>");
echo ("Correo Electronico :".$d1);
echo ("<br>");
echo ("Ruta Real   :".$ruta);
echo ("<br>");
echo ("Nombre del Archivo  :".$archivoi);
echo ("<br>");

//$archivoi = $ruta.$d2.".pdf";

//$archivof = $archivoi.$d2.".pdf";

//echo ("Ruta I  :".$archivoi);
//echo ("   ");
//echo ("Ruta F  :".$archivof);

//$hostname = '{imap.aol.com:993/imap/ssl}INBOX';
//$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
//$hostname = '{imap.mail.yahoo.com:993/imap/ssl}INBOX';
$mail->AddAttachment($archivoi,$d2g);









//Para adjuntar archivo

//$mail->AddAttachment($archivoi,"IQ1708171082.pdf");



//$name = $_FILES['archivo']['name'];
//$tmp_name = $_FILES['archivo']['tmp_name'];
//$mail -> AddAttachment ($tmp_name, $name);

//$mail->AddAttachment($archivoi);

/*
$mail->AddAttachment("/usr/local/httpd/htdocs/hp/meldungen/1993-03-11-de.doc");
$mail->AddAttachment("/usr/local/httpd/htdocs/hp/pics_p/96m4001o-sm.jpg");
$mail->AddAttachment("/usr/local/httpd/htdocs/hp/pics_p/96m1582-9567-sm.jpg");
$mail->AddEmbeddedImage("/usr/local/httpd/htdocs/hp/pics/ce.gif", "testpicture", "ce.gif");

$mail->AddAttachment($archivoi,$archivof);


*/

 
$mail->WordWrap = 50;
$mail->IsHTML(TRUE);
 
/*$mail->Body    = '
    <!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
    <html xmlns="http://www.w3.org/1999/xhtml">
    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    </head>
    <body>
    <p>Hola Mundo! esto es un mensaje en <strong>HTML!</strong></p>
    </body>
  </html>
    ';-*/
if($mail->Send())
{

   

    echo'<script type="text/javascript">
            mensaj="Envoy\u00e9 correctament"
            alert(mensaj);
            window.close();
         //   location.href="../novompg1.php";    

           
         </script>';
}
else{
    echo'<script type="text/javascript">
            alert("NO ENVIADO, intentar de nuevo");
         </script>';
}




?>
</html>
        