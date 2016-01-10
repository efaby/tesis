<?php
	//Iniciamos o continuamos sesi�n
	session_start();

	$titulo = "Carrito de Compra con Php y Mysql";
	include("estructura/conecta.php");
	include("estructura/meta_tags.php");
	include("estructura/cabecera.php");
?>

<div class="section">
    <div class="container">
    <div class="the-box">
Datos ingresados <br/>
<a class='btn btn-info' href="productos.php">Regresar</a>
</div> <!-- Cierro derecha -->
	</div>
	</div>

<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>