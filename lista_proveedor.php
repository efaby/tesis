<?php
session_start();

$titulo = "Lista de Proveedores para Actualizar / Eliminar un proveedor existente";
include("estructura/conecta.php");
include("estructura/meta_tags_proveedor.php");
include("estructura/cabecera.php");

//include("izquierda.php");
?>
	<div class="section">
    <div class="container">
    <div class="the-box" id="resultado">
    
		<?php		
			include ("consulta_proveedor.php");
		?>
	</div>
	</div> <!-- Cierro derecha -->
	</div>
<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>