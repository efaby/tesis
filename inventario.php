<?php
session_start();

$titulo = "Inventario";
include("estructura/conecta.php");
include("estructura/meta_tags.php");
include("estructura/cabecera.php");

?>
	<div class="section">
    <div class="container">
    <div class="the-box" id="resultado">
    <h2 class="page-title">Inventario de Productos</h2>
		<?php
			/*MOSTRAR Carro*/
			//$id = $_GET['id'];
			
			$resultado = mysql_query("SELECT * FROM productos");
			
			//Desplegamos una tabla con los datos de los productos
			echo "<div class=verproductos>";
			echo "<table class='table table-th-block'>
				<tr class=titulo>
					<th style='display:none' >ID</th>
					<th style='text-align:center'>Nombre del Producto</th>
					<th style='text-align:center'>Marca</th>
					<th style='text-align:center'>Modelo</th>
					<th style='text-align:center'>Cantidad</th>
					<th style='text-align:center'>Precio</th>
				</tr>";
				
			// comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
			while ($productos = mysql_fetch_array($resultado)) { 
				echo "<tr class='borde_tabla'><td style='display:none' >" . $productos['id'] . "</td>";     // imprime el texto
				echo "<td>" . $productos['producto'] . "</td>";     // imprime el nombre
				echo "<td style='text-align:left'>" . $productos['marca'] . "</td>";     // imprime la marca
				echo "<td style='text-align:left'>" . $productos['modelo'] . "</td>";   //imprime el modelo
				echo "<td style='text-align:left'>" . $productos['cantidad'] . "</td>";     // imprime la cantidad de articulos
				echo "<td style='text-align:left'> $" . $productos['precio'] . " </td>"; // imprime el precio
				echo "</tr>"; 
			} // fin del bucle de ordenes
			//echo "<tr><td>  </td></tr><tr> <td><a href='productos.php'>Regresar</a></td> </tr>";				
			//cerramos la etiqueta tabla
			echo "</table>";
			
		
				/*echo $_SESSION["totalcoste"] . "<br>";
				echo $_SESSION["cantidadTotal"] . "<br>";*/
			
			echo "</div>";
		?>
		</div> <!-- Cierro text-border -->
	</div> <!-- Cierro derecha -->
</div>

<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>
