<?php
	//Iniciamos o continuamos sesi�n
	session_start();

	$titulo = "Carrito de Compra con Php y Mysql";
	include("estructura/conecta.php");
	include("estructura/meta_tags.php");
	include("estructura/cabecera.php");
?>
<script>

function myFunction(){

var n=document.getElementById('bus').value;

if(n==''){

 document.getElementById("myDiv").innerHTML="";
 document.getElementById("myDiv").style.border="0px";

 document.getElementById("pers").innerHTML="";

 return;
}

loadDoc("q="+n,"buscar_sugerencia.php",function(){

  if (xmlhttp.readyState==4 && xmlhttp.status==200){

    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    document.getElementById("myDiv").style.border="1px solid #A5ACB2";

    }else{ document.getElementById("myDiv").innerHTML='<img src="img/load.gif" width="50" height="50" />'; }

  });
}

function validar(){
	var cliente = document.frmRegistro.txtCliente;
		
	if (typeof cliente == "undefined" ){ 
			alert("Tiene que seleccionar un Cliente para asociarlo con la compra.") 
			
		} else {
			loadDoc("q="+cliente.value,"guardar_pedido.php",function(){

				  if (xmlhttp.readyState==4 && xmlhttp.status==200){
							//levantar popup
							var posicion_x; 
							var ancho = 650;
							var alto = 450;
							var posicion_y; 
							posicion_x=(screen.width/2)-(ancho/2); 
							posicion_y=(screen.height/2)-(alto/2); 
							var w = window.open("", "Imprmir Pedido", "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y);
								w.document.write( xmlhttp.responseText );								
								w.document.close();
				    }

				  });
							
		}
	
}
//-------------------------------

function myFunction2(cod){

document.getElementById("myDiv").innerHTML="";
document.getElementById("myDiv").style.border="0px";
document.getElementById("tabla").innerHTML="";
document.getElementById("tabla").style.border="0px";

loadDoc("vcod="+cod,"buscar_cliente.php",function(){

  if (xmlhttp.readyState==4 && xmlhttp.status==200){

    document.getElementById("pers").innerHTML=xmlhttp.responseText;
    
    
    }else{ document.getElementById("pers").innerHTML='<img src="img/load.gif" width="50" height="50" />'; }

  });
}
</script>

<div class="section">
    <div class="container">
    <div class="the-box">
    <h2 class="page-title">Detalle de Pedido</h2>
		<br /><br />

Nombre del Cliente: <input type="text" id="bus" onKeyUp="myFunction()" size="30" required="required" autofocus="autofocus" placeholder="Buscar" />

<div id="myDiv"></div>

<br />
<form action="" method="post" name="frmRegistro" id="frmRegistro">
<div id="tabla">

</div>

	<div id="pers" >
</div>	
		<div class='text-border'>
<?php 
				if(isset($_SESSION['carro'])){
				echo "<br><table border=0 cellspacing=5 cellpadding=3 width='100%' >";
				$totalcoste = 0;
				//Inicializamos el contador de productos seleccionados.
				$xTotal = 0;
				
				echo "<tr style='font-size: 20px;'>";
					echo "<td>Producto</td>";
					echo "<td>Cantidad</td>";
					echo "<td>Precio</td>";
					echo "<td colspan=2 align=right>Total</td>";
				echo "</tr>";
				echo "<tr><td colspan=5><hr style='margin: 20px 0px;'></td></tr>";
	
				$detalle =  array();
				foreach($_SESSION['carro'] as $id => $x){
					$resultado = mysql_query("SELECT id, producto, precio FROM productos WHERE id=$id");
					$mifila = mysql_fetch_array($resultado);
					$id = $mifila['id'];
					$producto = $mifila['producto'];
					//acortamos el nombre del producto a 40 caracteres
					$producto = substr($producto,0,40);
					$precio = $mifila['precio'];
					//Coste por art�culo seg�n la cantidad elegida
					$coste = $precio * $x;
					//Coste total del carro
					$totalcoste = $totalcoste + $coste;
					//Contador del total de productos a�adidos al carro
					$xTotal = $xTotal + $x;
					
					echo "<tr>";
					echo "<td align='left'> $producto </td>";
					echo "<td align='center'>$x</td>";
					echo "<td align='center'>".$precio * 1 ."</td>";
					
					echo "<td align='right' style='margin-left:10px'>$ $coste ";
					echo "</tr>";
					$row = array('id'=>$id, 'nombre' => $producto, 'cantidad' => $x, 'precio' => $precio * 1);
					$detalle[] = $row;
				}
				$_SESSION['detalle'] = $detalle;
				echo "<tr><td colspan='4'><hr></td></tr>";
				echo "<tr>";
				echo "<td align='right' colspan='3'><b><br>Total = </b></td>";
				echo "<td align='right'><b><br>$  $totalcoste </b></td>";
				echo "</tr>";
				//BOTON COMPRAR
				echo "<tr>";
				echo "<td align='right' colspan='4'>
						<a class='btn btn-success' href='javascript:validar();'>Imprimir Compra</a>
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
		</form>
	</div> <!-- Cierro derecha -->
	</div>
	</div>

<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>