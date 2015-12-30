<?php
session_start();

$titulo = "Carrito de Compra con Php y Mysql";
include("estructura/conecta.php");
include("estructura/meta_tags.php");
include("estructura/cabecera.php");

?>
	<div class="container">
	<div class="col-sm-8 col-md-9">
	<div class="section">
	<h1>Detalle de Productos</h1>
	
		<div class='text-border'>
		<?php
			/*MOSTRAR Carro*/
			//$id = $_GET['id'];
			
			$resultado = mysql_query("SELECT id, producto, marca, modelo, precio FROM productos");
			
			//Desplegamos una tabla con los datos de los productos
			echo "<div class=verproductos>";
			echo "<table class='table table-th-block'>
				<tr class=titulo>
					<th style='display:none'>ID</th>
					<th class='desc_largo'>Producto</th>
					<th style='width:100px;text-align:right'>Precio</th>
					<th style='width:50px;text-align:right'>Acci&oacute;n</th>
				</tr>";
				
			// comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
			while ($productos = mysql_fetch_array($resultado)) { 
				echo "<tr class='borde_tabla'><td style='display:none'>" . $productos['id'] . "</td>";     // imprime el texto
				echo "<td>" . $productos['producto'] . " ".$productos['marca']. " ".$productos['modelo']. "</td>";     // imprime el nombre
				echo "<td style='text-align:right'> $" . $productos['precio'] . " </td>"; // imprime el precio
				echo "<td style='text-align:right'>
								<a href='carro.php?id=" . $productos['id'] . "&action=";
								//Detectamos si el producto ya se ha a�adido al cesta de la compra para usar una imagen u otra.
								//Si se ha a�adido usamos una imagen para Restar una cantidad al carro
								if (isset($_SESSION['carro'][$productos['id']])){
									//echo "remove' alt='Eliminar del carro'><img src='img/remove_carro.png' width='48' height='48' alt='Eliminar del carro' title='A�adir producto al carrito'>";
									echo "removeProd' alt='Eliminar del carro'><img src='img/remove_carro.png' width='48' height='48' alt='Eliminar del carro' title='Eliminar producto del carrito'>";
								}
								else
									echo "add' alt='A&ntilde;adir al carro'><img src='img/add_carro.png' width='48' height='48' alt='A&ntilde;adir al carrito' title='A&ntilde;adir producto al carrito'>";
									
								
				echo "</a></td>";
			  echo "</tr>"; 
			} // fin del bucle de ordenes
							
			//cerramos la etiqueta tabla
			echo "</table>";
			
		
				/*echo $_SESSION["totalcoste"] . "<br>";
				echo $_SESSION["cantidadTotal"] . "<br>";*/
			
			echo "</div>";
		?>
		</div> <!-- Cierro text-border -->
		</div>
		</div>
		<div class="col-sm-4 col-md-3">	
		<div class="section sidebar">
		<div class="panel panel-square panel-success panel-no-border">
			<div class="panel-heading lg">
			<h3 class="panel-title">Detalle Carrito</h3>
			</div>
			<div class="list-group success list-group-item" style="height: 130px;">
		<table>
		<tr>
		<td><strong>Cantidad de Productos:</strong></td>
		<td align="left"><?php
							if(isset($_SESSION["cantidadTotal"]))
								echo $_SESSION["cantidadTotal"];
							else{
								echo "Carro vac&iacute;o";
								$_SESSION["totalcoste"] = 0;
									}?>
						</td>
					</tr>
		<tr >
						<td><strong>Total Compra:</strong></td>
						<td>$<?php echo $_SESSION["totalcoste"];?></td>
					</tr>
					<tr>
						<td align:right colspan=2>Ver <a href="carro.php?id=1&action=mostrar" title='lista de compra'>cesta de la compra</a></td>
					</tr>
				</table>
				</div>
				</div>
			</div>
		
		</div>
	</div> <!-- Cierro derecha -->

<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>