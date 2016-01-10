<?php
session_start();
include("estructura/conecta.php");

$q=$_POST['q'];
$sql = "insert into pedidos (id_cliente, fec_alta) values (".$q.",now())";
$Result1 = mysql_query($sql) or die(mysql_error());
$pedido_id = mysql_insert_id();

$detalleHtml = "<br><br><table class='table table-th-block' style='margin: 20px; width: 93%;'><tr>
		<td>Producto</td>
		<td>Cantidad</td>
		<td>Precio</td>
		<td colspan=2 align=right>Total</td>";
$totalcoste = 0;
foreach ($_SESSION['detalle'] as $row){
	$sql = "insert into det_pedidos (id_pedido, id_producto, cantidad, precio) values (".$pedido_id.",".$row['id'].",".$row['cantidad'].",".$row['precio'].")";
	$Result1 = mysql_query($sql) or die(mysql_error());
	$sql = "update productos set cantidad = cantidad - 1 where id = ".$row['id'];
	$Result2 = mysql_query($sql) or die(mysql_error());
	$coste = $row['precio'] * $row['cantidad'];
	$detalleHtml .= "<tr>
	<td align='left'>". $row['nombre']." </td>
	<td align='center'>".$row['cantidad']."</td>
	<td align='center'>".$row['precio']."</td>
	<td align='right' style='margin-left:10px'>".$coste."</td></tr>";
	$totalcoste = $totalcoste + $coste;
}
$detalleHtml .= "<tr>
<td align='right' colspan='3'><b><br>Total = </b></td>
<td align='right'><b><br>$  $totalcoste </b></td></tr> </table></body>";

$sql="select * from clientes where id_cliente='".$q."'";
$res=mysql_query($sql) or die(mysql_error());
$row_rsCliente=mysql_fetch_array($res);
$html = '<html><head><link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/style-responsive.css" rel="stylesheet">
	</head><body style="padding-top: 0px;">	
		<div style="padding: 10px; text-align: right;"><a href="javascript:window.print()"> <span class="glyphicon glyphicon-print"></span>&nbsp;Imprimir</a>	</div>							';

$html .= "<table style='margin: 20px; width: 93%;'>
	<tr>
    <td colspan='4' align='center'><strong>DATOS DEL CLIENTE</strong><br><br></td>
    </tr>
  <tr>   
    <td>C&eacute;dula / RUC:</td><td >".$row_rsCliente['cedula']."</td>   
    <td>Nombre:</td>
    <td>".$row_rsCliente['apellido']." ". $row_rsCliente['nombre']."</td>
    </tr>
  <tr>
    <td>Direcci&oacute;n:</td>
    <td >".$row_rsCliente['direccion']."</td>
    <td>Tel&eacute;fono:</td>
    <td >".$row_rsCliente['telefono']."</td>
    </tr> 
  <tr>
    <td >Email: </td>
    <td colspan='3' >".$row_rsCliente['email']."</td>
  </tr>
</table>";
unset($_SESSION['detalle']);
unset($_SESSION['carro']);
echo $html.$detalleHtml;
?>