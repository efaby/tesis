<?php
	//destruimos la sesión carro por si el usuario quiere volver a la tienda.
	unset($_SESSION['carro']);
	$titulo = "Carrito de Compra con Php y Mysql";
	include("estructura/conecta.php");
	include("estructura/meta_tags.php");
	include("estructura/cabecera.php");
	
	function mail_webmaster($message){
		$subject="Nuevo Pago Efectuado";
		$remite="tucorreo@dominio.com";
		$remitente="correoremitente@dominio.com";
	 
		$header .="MIME-Version: 1.0\n"; 
		$header .= "Content-type: text/html; charset=iso-8859-1\n"; 
		$header .="From: ".$remitente."<".$remite.">\n";
		$header .="Return-path: ". $remite."\n";
		$header .="X-Mailer: PHP/". phpversion()."\n";
	 
		mail("email-aqui-de-quieren-recibe", $subject, $message,$header);
 
	}

?>
	<div id="derecha">
		<div class='text-border'>
			<h1>Compra realizada con éxito, por favor revisa su correo para ver la notificación.</h1>
			
			<h3>Volver a la <a href="productos.php">tienda COLORATE</a></h3>
			<?php
			
				//1. recogemos los valores del cliente y de la compra.
				//****************************************************
				
				//Con print-r podremos ver todos los valores que nos devuelve PayPal mediante POST
				//para después elegir los que queramos utilizar en nuestra aplicación.
				//print_r($_POST);

						$nombre = $_POST['first_name'];
						$apellido = $_POST['last_name'];
						$email_client = $_POST['payer_email'];
						$calle_client = $_POST['address_name'];
						$ciudad_client = $_POST['address_city'];
						$pais_client = $_POST['address_country'];
						$zonaRes_client = $_POST['residence_country'];
						$total_pedido = $_POST['mc_gross'];
		

				//2. Creamos el HTML que se enviará por e-mail
				//********************************************
				
						//pruebas
						$email = 'correo@dominio.com';
						//real
						//$email = $email_client;
						$asunto = 'COLORATE - Resumen de tu pedido';
						$html .= "<div style='width:80%;padding: 100px; background: #E4EDF6;border:10px solid #000000;'>
												<h1>COMPRA PRODUCTOS COLORATE</h1>
												<p>Hola <b>$nombre</b>,</p>
												<p>Tu solicitud de compra ha sido realizada con éxito. 
												Gracias por comprar en COLORATE. Aquí te adjuntamos el resumen de tu pedido.</p>
										";
						$html .= "<h3>Datos del Comprador</h3>";
						$html .= "<b>Nombre</b>                   : " . $nombre . "<br>";
						$html .= "<b>Apellido</b>                   : " . $apellido . "<br>";
						$html .= "<b>E-mail del comprador</b>     : " . $email_client . "<br>";
						$html .= "<b>Calle del comprador</b>      : " . $calle_client . "<br>";
						$html .= "<b>Ciudad del comprador</b>     : " . $ciudad_client . "<br>";
						$html .= "<b>País del comprador</b>       : " . $pais_client . "<br>";
						$html .= "<b>Zona Residencia comprador</b>: " . $zonaRes_client . "<br>";
						$html .= "<hr>";
						$html .= "<b>Total de la compra</b>       : <b><span style='font-size:14px;'>" . $total_pedido . "€</span></b><br>";
						
						
				
				$cabeceras = "Content-type: text/html\r\n";
				
				echo "</br>$html</br>";
				
				//3. llamamos a una función para enviar el mail con la factura al cliente.
				//mail($email,$asunto,$html,$cabeceras);
				
				//Envio de e-mail al administrador
				//$message = "Se ha efectuado el pago del pedido del cliente $email";
				//mail_webmaster($message);
			?>
		</div>
	</div>
<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>