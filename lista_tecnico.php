<?php
session_start();

$titulo = "Lista de Tecnicos para Actualizar / Eliminar";
include("estructura/conecta.php");
include("estructura/meta_tags_tecnico.php");
include("estructura/cabecera.php");

//include("izquierda.php");
?>
	<div class="section">
    <div class="container">
    <div class="the-box" id="resultado">
    	<?php
		include ("consulta_tecnico.php");
		?>
	</div> <!-- Cierro derecha -->
	</div>
	</div>

<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>