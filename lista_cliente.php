<?php
session_start();

$titulo = "Lista de Clientes para Actualizar / Eliminar";
require_once("estructura/conecta.php");
require_once("estructura/cabecera.php");
require_once("estructura/meta_tags_cliente.php");

?>
	<div class="section">
    <div class="container">
    <div class="the-box" id="resultado">
		<?php		
			include ("consulta_cliente.php");
		?>
	</div> <!-- Cierro derecha -->
	</div>
	</div>
	

<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>