<?php
// para evitar que se nos detenga la ejecucion del script (en caso de que el servidor tarde en responder) definimos un intervalo de 5 minutos de inactividad
ini_set('max_execution_time', 300);
include "class.phpmailer.php";

//Recibir todos los parámetros del formulario

$para = "rafael.yepes@lacroixmeats.com";
$para1 = "";
$para2 = "";
$asunto = "Asunto";
$mensaje = "Mensaje";

echo getcwd() . "\n";
/*
$para = $_POST["email"];
$para1 = $_POST["email1"];
$para2 = $_POST["email2"];
$asunto = $_POST["asunto"];
$mensaje = $_POST["mensaje"];
*/

$d2 = $_GET["d2"];
$ruta = $_GET["ruta"];



$archivoi = $ruta.$d2.".pdf";
$archivoi = 'C:\wamp\www\plantilla\archivos\IQ1708171082.pdf';

$archivof = $d2.".pdf";

//echo ("Ruta I  :".$archivoi);
//echo ("   ");
//echo ("Ruta F  :".$archivof);

//$hostname = '{imap.aol.com:993/imap/ssl}INBOX';
//$hostname = '{imap.gmail.com:993/imap/ssl}INBOX';
//$hostname = '{imap.mail.yahoo.com:993/imap/ssl}INBOX';

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

//Para adjuntar archivo

$mail->AddAttachment($archivoi,"IQ1708171082.pdf");



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
            alert("Envoyé Correctament");
         //   location.href="../novompg1.php";    

           
         </script>';
}
else{
    echo'<script type="text/javascript">
            alert("NO ENVIADO, intentar de nuevo");
         </script>';
}

?>