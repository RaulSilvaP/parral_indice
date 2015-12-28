<?php 
require('class.phpmailer.php');
require('class.smtp.php');
//  PARAMETROS DE CONFIGURACION DEL PROGRAMA DE RESPALDO DE MYSQL CON ENVIO DE EMAIL
$fecha = date("d-m-Y");
$camino = "/disk1/APLICACION/respaldos_mysql/";
//CUENTA GMAIL PARRAL
$servidor_smtp = "mail.rsp.cl";
$cuenta_origen = "cbrparral@rsp.cl";
$nombre_origen = "Cbr Parral email";
$username_email = "cbrparral@rsp.cl";
$password_email = "cbrparral2015";

$asunto = "Aviso de respaldo Mysql CBR PARRAL. ".$fecha;
$body = "Aviso de respaldo de Mysql a CBR PARRAL. Fecha: ".$fecha;
$cuenta_destino = "cbrparral1@gmail.com";
$nombre_destino = "Cbr Parral Gmail";

//**********************************************************************************



$bd_cbrparral="mysqldump --user=root --password=cbrparral2015 cbrparral > ".$camino."cbrparral_".$fecha.".sql";
//$bd_cbr="mysqldump --user=root --password=cbruser2015 cbr > ".$camino."cbr_".$fecha.".sql";


system($bd_cbrparral);
//system($bd_cbr);

/*

$mail = new PHPMailer();

$mail->IsSMTP();

// Sustituye (ServidorDeCorreoSMTP)  por el host de tu servidor de correo SMTP
$mail->Host = $servidor_smtp;

// Sustituye  ( CuentaDeEnvio )  por la cuenta desde la que deseas enviar por ejem. prueba@domitienda.com  

$mail->From = $cuenta_origen;

$mail->FromName = $nombre_origen;	

$mail->Subject = $asunto;

$mail->AltBody = "prueba";

$mail->MsgHTML($body);

// Sustituye  (CuentaDestino )  por la cuenta a la que deseas enviar por ejem. admin@domitienda.com  
$mail->AddAddress($cuenta_destino, $nombre_destino);


// Sustituye (CuentaDeEnvio )  por la misma cuenta que usaste en la parte superior en este caso  prueba@domitienda.com  y sustituye (ContraseñaDeEnvio)  por la contraseña que tenga dicha cuenta 

$mail->Username = $username_email;
$mail->Password = $password_email;

if(!$mail->Send()) {
echo "Mailer Error: " . $mail->ErrorInfo;
} else {
echo "Message sent!";
}

*/
 ?>