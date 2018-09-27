<?php
//Librerías para el envío de mail
include_once('class.phpmailer.php');
include_once('class.smtp.php');
 
//Recibir todos los parámetros del formulario
$para = 'rayepes@hotmail.com';
$asunto = 'Asunto';
$mensaje = 'Prueba del MÉensaje';
$archivo = 'avis01.pdf';
 
//Este bloque es importante
$mail = new PHPMailer();
$mail->IsSMTP();
$mail->SMTPDebug = 2;//$mail->SMTPDebug = 1; // Degug. Valores 1 -> errores y mensajes // 2 solo mensajes // 0 no informa nada


$mail->Host = "smtp.office365.com";
$mail->Port = "587";
//$mail->Port = 25;
$mail->SMTPSecure = 'tls';
$mail->SMTPAuth = true;

/*
$mail->Host = 'outlook.office365.com';
$mail->Port = 995;
$mail->SMTPSecure = 'ssl';
*/



//Nuestra cuenta
$mail->Username = 'documents@lacroixmeats.com';
$mail->Password = 'Test1234';


$mail->From = $username;
$mail->FromName = "Rafael Yepes";
 
//Agregar destinatario
$mail->AddAddress($para);
$mail->Subject = $asunto;
$mail->Body = $mensaje;


//Para adjuntar archivo
//$mail->AddAttachment($archivo['tmp_name'], $archivo['name']);
//$mail->MsgHTML($mensaje);
 
//Avisar si fue enviado o no y dirigir al index
if($mail->Send())
{

   

    echo'<script type="text/javascript">
            alert("Enviado Correctamente");
           
         </script>';
}
else{
    echo'<script type="text/javascript">
            alert("NO ENVIADO, intentar de nuevo");
         </script>';
}

/*
Serveur entrant IMAP :    outlook.office365.com
Port IMAP :    993
SSL IMAP :    Oui

Serveur SMTP sortant :    smtp.office365.com
Port SMTP :    587
SMTP SSL ou TLS :    TLS

Serveur de courrier sortant (SMTP) :smtp.office365.com   587 SSL o TLS

Serveur entrant POP :    outlook.office365.com
Port POP :    995
SSL POP :    Oui
*/
?>