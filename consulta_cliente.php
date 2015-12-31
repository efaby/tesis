<?php

$titulo = "Lista de Clientes para Actualizar / Eliminar";
require_once("estructura/conecta.php");


//include("izquierda.php");
?>
		<h2 class="page-title">Clientes</h2>
	
		<?php		
			$resultado = mysql_query("SELECT * FROM clientes");
			
			//Desplegamos una tabla con los datos de los clientes
			echo "<div class=verproductos>";
			echo "<div style='margin-bottom: 10px; text-align: right;'><a href='insert_cliente.php' class='btn btn-success'> Nuevo</a></div>";
			echo "<table class='table table-th-block'>
				<tr class=titulo>
					<th style='display:none'>id_Cliente</th>
					<th style='text-align:center'>C&eacute;dula</th>
					<th style='text-align:center'>Nombre del Cliente</th>
					<th style='text-align:center'>Email</th>
					<th style='text-align:center'>Direcci&oacute;n</th>
					<th style='text-align:center'>Tel&eacute;fono</th>
					<th colspan='2' style='text-align:center'>Acciones</th>					
				</tr>";
				
			// comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
			while ($clientes = mysql_fetch_array($resultado)) { 
				echo "<tr class='borde_tabla'>
					  <td style='display:none'>" . $clientes['id_cliente'] . "</td>";     // imprime el texto
				echo "<td>" . $clientes['cedula'] . "</td>";     // imprime el RUC
				echo "<td style='text-align:left'>" . $clientes['nombre'] . "&nbsp;". $clientes['apellido']. " </td>"; // imprime el nombre y apellido
				echo "<td style='text-align:left'>" . $clientes['email'] . " </td>"; // imprime el email
				echo "<td style='text-align:left'>" . $clientes['direccion'] . " </td>"; // imprime la direccion
				echo "<td style='text-align:left'>" . $clientes['telefono'] . " </td>"; // imprime el telefono
				echo "<td style='text-align:right'> 
						<a class='btn btn-info btn-xs' href='update_cliente.php?id_cliente=" . $clientes['id_cliente']. "'>  Actualizar</a></td>";
				echo "<td style='text-align:right'>  
					 <a class='btn btn-danger btn-xs' style=\"cursor:pointer;\" onclick=\"eliminarDato('".$clientes['id_cliente']."')\">
						 Eliminar</a> </td>";
			  echo "</tr>"; 
			} // fin del bucle de ordenes
							
		//	echo"<tr><td><a href='productos.php'> Regresar</a> </td></tr>";
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