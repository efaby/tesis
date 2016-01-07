<?php
session_start();
include_once 'PHPMailer/class.phpmailer.php';
include_once 'PHPMailer/class.smtp.php';

function email($name, $email, $message)
{
		//Email del Contácto
		$para = 'soportecatsevolution@gmail.com';
		//Clave = catsevolution
		
		//Asunto
		$asunto = "Contacto de Cliente";
		
		//mensaje que se va a enviar
		$mensaje = $message;
		
		//Este bloque es importante
		$mail = new PHPMailer();
		$mail->IsSMTP();
		$mail->SMTPAuth = true;
		$mail->SMTPSecure = "tls"; 
		$mail->Host = "smtp.gmail.com";
		$mail->Port = 587;
	  //$mail->SMTPDebug = 2;
		
		//Nuestra cuenta
		$mail->setFrom($email, $name);
		$mail->Username ='catsevolution2016@gmail.com';
		$mail->Password = 'catsevolution'; //Su password
		$mail->CharSet = 'UTF-8';
		
		//Agregar destinatario
		$mail->AddAddress($para);
		$mail->Subject = $asunto;
		$mail->Body = $mensaje;
		$mail->MsgHTML($mensaje);
		
		//Devuelve verdadero o falso
		if($mail->Send())
		{
			return true;
		}
		else
		{
			return false;
		}	
}


$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$message_client = $_POST['message'];
$message = "<!DOCTYPE html>
 			<html xmlns='http://www.w3.org/1999/xhtml'>
 				<head>
 					<meta http-equiv='Content-Type' content='text/html; charset=UTF-8' />
 					<title>Mensaje</title>				
			    </head>
			<body>
				<table>
						<tr>
							<td colpsan='2'><h2>Datos del Contacto</h2></td>
						</tr>
						<tr><td><b>Nombre: </b></td><td>".$name."</td></tr>
						<tr><td><b>Email: </b></td><td>".$email."</td></tr>
						<tr><td><b>Teléfono: </b></td><td>".$phone."</td></tr>
						<tr><td><b>Mensaje: </b></td><td>".$message_client."</td></tr>
				</table>					
			</body>
			</html>";
$send_email = email($name, $email, $message);
$_SESSION['message'] = '';
$_SESSION['valor'] = '';
if ($send_email)
{
	$_SESSION['message'] = "Se ha enviado su email.";
	$_SESSION['valor'] = 1;
}
else 
{
	$_SESSION['message'] =  "No se ha podido enviar su email.";
	$_SESSION['valor'] = 0;
}

header("Location:index.php");

?>