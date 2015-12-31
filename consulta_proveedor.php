<?php

$titulo = "Lista de Proveedores para Actualizar / Eliminar un proveedor existente";
require_once("estructura/conecta.php");



//include("izquierda.php");
?>
	  <h2 class="page-title">Proveedores</h2>
	
		<div class='text-border'>
		<?php
			/*MOSTRAR Carro*/
			//$id = $_GET['id'];
			
			$resultado = mysql_query("SELECT * FROM proveedor");
			
			//Desplegamos una tabla con los datos de los productos
			echo "<div class=verproductos>";
			echo "<div style='margin-bottom: 10px; text-align: right;'><a href='insert_proveedor.php' class='btn btn-success'> Nuevo</a></div>";
			echo "<table class='table table-th-block'>
				<tr class=titulo>
					<th style='display:none'>Cod_Proveedor</th>
					<th style='text-align:center'>RUC</th>
					<th style='text-align:center'>Nombre del Proveedor</th>
					<th style='text-align:center'>Direcci&oacute;n</th>
					<th style='text-align:center'>Tel&eacute;fono</th>
					<th colspan='2' style='text-align:center'>Acciones</th>					
				</tr>";
				
			// comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
			while ($proveedores = mysql_fetch_array($resultado)) { 
				echo "<tr class='borde_tabla'>
					  <td style='display:none'>" . $proveedores['Cod_Proveedor'] . "</td>";     // imprime el texto
				echo "<td>" . $proveedores['RUC'] . "</td>";     // imprime el RUC
				echo "<td style='text-align:left'>" . $proveedores['Nombre'] . "&nbsp;". $proveedores['Apellido']. " </td>"; // imprime el nombre y apellido
				echo "<td style='text-align:left'>" . $proveedores['Direccion'] . " </td>"; // imprime la direccion
				echo "<td style='text-align:left'>" . $proveedores['Telefono'] . " </td>"; // imprime el telefono
				echo "<td style='text-align:center'> 
						<a class='btn btn-info btn-xs' href='update_proveedor.php?Cod_Proveedor=" . $proveedores['Cod_Proveedor']. "'>  Actualizar</a></td>";
				echo "<td style='text-align:center' >   
						<a class='btn btn-danger btn-xs'style=\"cursor:pointer;\" onclick=\"eliminarDato('".$proveedores['Cod_Proveedor']."')\">
						 Eliminar</a> </td>";
			  echo "</tr>"; 
			} // fin del bucle de ordenes
							
			//echo"<tr><td><a href='productos.php'> Regresar</a> </td></tr>";
			//cerramos la etiqueta tabla
			echo "</table>";
			
		
				/*echo $_SESSION["totalcoste"] . "<br>";
				echo $_SESSION["cantidadTotal"] . "<br>";*/
			
			echo "</div>";
		?>
        </div>

<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>