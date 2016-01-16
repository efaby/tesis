<?php
session_start();

$titulo = "Detalle de Pedido";

include("estructura/conecta.php");
include("estructura/meta_tags.php");
include("estructura/cabecera.php");
?>
	<div class="section">
    <div class="container">
    <div class="the-box">
    <h2 class="page-title">Detalle de Pedido</h2>

		<div class='text-border'>
		<?php
			
			if (isset($_GET['id']))
				$id = $_GET['id'];
			else
				$id = 1;
			
			if (isset($_GET['action']))
				$action = $_GET['action'];
			else
				$action = "empty";
	
	
			switch($action){
			
				case "add":
					if(isset($_SESSION['carro'][$id]))					
						$_SESSION['carro'][$id]++;					
					else
						$_SESSION['carro'][$id]=1;
				break;
				
				case "remove":
					if(isset($_SESSION['carro'][$id]))
					{
						$_SESSION['carro'][$id]--;
						if($_SESSION['carro'][$id]==0)
							unset($_SESSION['carro'][$id]);
					}
					
				break;
				case "removeProd":
					if(isset($_SESSION['carro'][$id])){
						unset($_SESSION['carro'][$id]);
					}
				break;
				
				case "mostrar":
					if(isset($_SESSION['carro'][$id])){
						continue;
					}
				break;
				
				case "empty":
					unset($_SESSION['carro']);
				
				break;
						
				
			}

			/*MOSTRAR Carro*/
			/*echo "<pre>";
				print_r($_SESSION);
			  echo "</pre>";

			  echo "CANTIDAD: " .	$_SESSION['carro'][$id] . "<br>";
			  echo "ID      : " . $id . "<br>";
			*/
			
			if(isset($_SESSION['carro'])){
				echo "<br><table border=0 cellspacing=5 cellpadding=3 width='100%' >";
				$totalcoste = 0;
				//Inicializamos el contador de productos seleccionados.
				$xTotal = 0;
				
				echo "<tr style='font-size: 20px;'>";
					echo "<td>Producto</td>";
					echo "<td>Cantidad</td>";
					echo "<td>Acci&oacute;n</td>";
					echo "<td colspan=2 align=right>Total</td>";
				echo "</tr>";
				echo "<tr><td colspan=5><hr style='margin: 20px 0px;'></td></tr>";
	
				
				foreach($_SESSION['carro'] as $id => $x){
					$resultado = mysql_query("SELECT id, producto, precio, cantidad FROM productos WHERE id=$id");
					$mifila = mysql_fetch_array($resultado);
					$id = $mifila['id'];
					$producto = $mifila['producto'];
					//acortamos el nombre del producto a 40 caracteres
					$producto = substr($producto,0,40);
					$precio = $mifila['precio'];
					$cantidad = $mifila['cantidad'];
					$stock = $x;
					if($cantidad < $x){
						$_SESSION['carro'][$id]--;
						$x --;
						if($_SESSION['carro'][$id]==0)
							unset($_SESSION['carro'][$id]);
						$stock ="Stock Insuficiente, solamente hay ".$x . " productos.";
					}
					//Coste por art�culo seg�n la cantidad elegida
					$coste = $precio * $x;
					//Coste total del carro
					$totalcoste = $totalcoste + $coste;
					//Contador del total de productos a�adidos al carro
					$xTotal = $xTotal + $x;
					
					echo "<tr>";
					echo "<td align='left'> $producto </td>";
					echo "<td >$stock</td>";
					
					echo "<td align='left'>";
					echo "<a href='carro.php?id=". $id ."&action=add'><img src='img/aumentar.png' style='padding:0 0px 0 5px;' alt='Aumentar cantidad' /></a>";
					//Controlamos el display para cuando se vaya a eliminar el producto del carro o bien
					//se vaya a reducir la cantidad.
					//if ($x > 1)
						echo "<a href='carro.php?id=". $id ."&action=remove'><img src='img/restar.png' alt='Reducir cantidad' /></a>";
					//else
						echo "<a href='carro.php?id=". $id ."&action=removeProd'><img src='img/eliminar.png' alt='Reducir cantidad' /></a></td>";
					
					echo "<td align='right'> = </td>";
					echo "<td align='right' style='margin-left:10px'>$ $coste ";
					echo "</tr>";
				}
				echo "<tr><td colspan='5'><hr></td></tr>";
				echo "<tr>";
				echo "<td align='right' colspan='4'><b><br>Total = </b></td>";
				echo "<td align='right'><b><br>$  $totalcoste </b></td>";
				echo "</tr>";
				//BOTON COMPRAR
				echo "<tr>";
				echo "<td align='right' colspan='5'>
						<a class='btn btn-success' href='comprar.php'>Finalizar compra</a>
				</td>";
				echo "</tr>";
				
				echo "</table>";
				$_SESSION["totalcoste"] = $totalcoste;
				$_SESSION["cantidadTotal"] = $xTotal;
				
			}
			else
				echo "El carro est&aacute; vac&iacute;o";
	
			//Campos que nos serviran para informar la cesta de lo que llevamos comprados y que se mostrar� en 
			//la p�gina PRODUCTOS.
			
			echo "<p><a  class='btn btn-danger btn-sx' href='productos.php' title='lista de productos'>Lista de productos</a></p>";
		
		?>
		</div> <!-- Cierro text-border -->
	</div> <!-- Cierro derecha -->
	</div>
	</div>
	

<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>