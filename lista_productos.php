<?php
session_start();

$titulo = "Lista de Productos para Comprar / Actualizar un producto existente";
include("estructura/conecta.php");
include("estructura/meta_tags_producto.php");
include("estructura/cabecera.php");

//include("izquierda.php");
?>
	<div class="section">
    <div class="container">
    <div class="the-box" id="resultado">
    
		<?php
			include ("consulta_productos.php");
			
		?>
		</div>
	</div> <!-- Cierro derecha -->
	</div>

<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>