<?php
	session_start();

	$titulo = "Carrito de Compra con Php y Mysql";
	include("estructura/conecta.php");
	include("estructura/meta_tags.php");
	include("estructura/cabecera.php");
	
?>
	<div id="derecha">
		<div class='text-border'>
			<h1 style="color:red">No se ha podido realizar la compra. Por favor revise su cuenta Paypal e inténtelo de nuevo</h1>
		</div>
	</div>
<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>