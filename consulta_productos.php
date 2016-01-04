<?php

$titulo = "Lista de Productos para Comprar / Actualizar un producto existente";
include("estructura/conecta.php");


//include("izquierda.php");
?>

  <h2 class="page-title">Listado de Productos</h2>
		<?php
			/*MOSTRAR Carro*/
			//$id = $_GET['id'];
			
			$resultado = mysql_query("SELECT id, producto, marca, modelo, precio, cantidad FROM productos");
			
			//Desplegamos una tabla con los datos de los productos
			echo "<div class=verproductos>";
			echo "<div style='margin-bottom: 10px; text-align: right;'><a href='insert_producto.php' class='btn btn-success'> Nuevo</a></div>";
			echo "<table class='table table-th-block'>
				<tr class=titulo>
					<th style='display:none'>ID</th>
					<th style='text-align:center'>Producto</th>
					<th style='text-align:center'>Precio</th>
					<th style='text-align:center'>Cantidad</th>
					<th colspan='2' style='text-align:center'>Acciones</th>					
				</tr>";
				
			// comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
			while ($productos = mysql_fetch_array($resultado)) { 
				echo "<tr class='borde_tabla'>
					  <td style='display:none'>" . $productos['id'] . "</td>";     // imprime el texto
				echo "<td>" . $productos['producto']. " ".$productos['marca']. "".$productos['modelo'].  "</td>";     // imprime el nombre
				echo "<td style='text-align:right'> $" . $productos['precio'] . " </td>"; // imprime el precio
				echo "<td style='text-align:right'>" . $productos['cantidad'] . " </td>"; // imprime la cantidad
				echo "<td style='text-align:right'> 
						<a  class='btn btn-info btn-xs' href='update_producto.php?id=" . $productos['id']. "'>  Actualizar</a></td>";
				echo "<td style='text-align:right' >   
						<a  class='btn btn-danger btn-xs' style=\"cursor:pointer;\" onclick=\"eliminarDato('".$productos['id']."')\">
						 Eliminar</a> </td>";
			  echo "</tr>"; 
			} // fin del bucle de ordenes <a onclick=\"eliminarDato('".$row['idempleado']."')\ href='delete_producto.php?id=" . $productos['id'] . "'>
							
			//echo"<tr><td><a href='productos.php' class='btn btn-primary'> Regresar</a> </td></tr>";
			//cerramos la etiqueta tabla
			echo "</table>";
			
		
				/*echo $_SESSION["totalcoste"] . "<br>";
				echo $_SESSION["cantidadTotal"] . "<br>";*/
			
			echo "</div>";
		?>



<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>