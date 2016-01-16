<?php

$titulo = "Lista de Tecnicos para Actualizar / Eliminar";
include("estructura/conecta.php");


//include("izquierda.php");
?>
  <h2 class="page-title">Listado de T&eacute;cnicos</h2>
	
		<?php		
			$resultado = mysql_query("SELECT * FROM tecnico");
			
			//Desplegamos una tabla con los datos de los tecnicos
			echo "<div class=verproductos>";
			echo "<div style='margin-bottom: 10px; text-align: right;'><a href='insert_tecnico.php' class='btn btn-success'> Nuevo</a></div>";
			echo "<table class='table table-th-block'>
				<tr class=titulo>
					<th style='display:none'>id_tecnico</th>
					<th style='text-align:center'>C&eacute;dula</th>
					<th style='text-align:center'>Nombre del T&eacute;cnico</th>
					<th style='text-align:center'>Direcci&oacute;n</th>
					<th style='text-align:center'>Tel&eacute;fono</th>
					<th colspan='2' style='text-align:center'>Acciones</th>					
				</tr>";
				
			// comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
			while ($tecnicos = mysql_fetch_array($resultado)) { 
				echo "<tr class='borde_tabla'>
					  <td style='display:none'>" . $tecnicos['id_tecnico'] . "</td>";     // imprime el texto
				echo "<td>" . $tecnicos['cedula'] . "</td>";     // imprime el RUC
				echo "<td style='text-align:left'>" . $tecnicos['nombre'] . "&nbsp;". $tecnicos['apellido']. " </td>"; // imprime el nombre y apellido
				echo "<td style='text-align:left'>" . $tecnicos['direccion'] . " </td>"; // imprime la direccion
				echo "<td style='text-align:left'>" . $tecnicos['telefono'] . " </td>"; // imprime el telefono
				echo "<td style='text-align:right'> 
						<a class='btn btn-info btn-xs' href='update_tecnico.php?id_tecnico=" . $tecnicos['id_tecnico']. "'>  Actualizar</a></td>";
				echo "<td style='text-align:right'>  
					 <a class='btn btn-danger btn-xs' style=\"cursor:pointer;\" onclick=\"eliminarDato('".$tecnicos['id_tecnico']."')\">
						 Eliminar</a> </td>";				
			  echo "</tr>"; 
			} // fin del bucle de ordenes
							
//cerramos la etiqueta tabla
		//	echo"<tr><td><a href='productos.php'> Regresar</a> </td></tr>";
			echo "</table>";
			
		
				/*echo $_SESSION["totalcoste"] . "<br>";
				echo $_SESSION["cantidadTotal"] . "<br>";*/
			
			echo "</div>";
		?>


<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>