<?php
session_start();

$titulo = "Lista de Reparaciones";
include("estructura/conecta.php");
include("estructura/meta_tags_repara.php");
include("estructura/cabecera.php");
?>
<?php
$query_rsReparacion = "SELECT * FROM reparacion order by id_cliente";
$rsRepara = mysql_query($query_rsReparacion) or die(mysql_error());
$row_rsRepara = mysql_fetch_assoc($rsRepara);
?>

	<div class="section">
    <div class="container">
    <div class="the-box" id="resultado">
    <h2 class="page-title">Listado Reparaciones</h2>
<table class='table table-th-block'>
<tr class=titulo>
	<th style='display:none'>id_reparacion</th>
	<th style='width:50px;text-align:center'>Cliente</th>
	<th style='width:250px;text-align:center'>T&eacute;cnico</th>
	<th style='width:250px;text-align:center'>Articulo</th>
	<th style='width:50px;text-align:center'>Detalle de da&ntilde;o</th>
	<th style='width:50px;text-align:center'>Fecha Ingreso</th>
	<th style='width:50px;text-align:center'>Informe</th>
    <th style='width:50px;text-align:center'>Productos Usados</th>
    <th style='width:50px;text-align:center'>Costo</th>
    <th style='width:50px;text-align:center'>Fecha Reparado</th>
</tr>
<?php
// comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
			while ($row_rsRepara = mysql_fetch_array($rsRepara)) { 
				//busca los datos del cliente 
				$sqlCliente="select nombre, apellido from clientes where id_cliente='".$row_rsRepara['id_cliente']."%'" ;
				$rsCliente= mysql_query($sqlCliente) or die(mysql_error());
				$row_rsCliente = mysql_fetch_assoc($rsCliente);
				//busca los datos del tecnico
				$sqlTecnico="select nombre, apellido from tecnico where id_tecnico='".$row_rsRepara['id_tecnico']."%'" ;
				$rsTecnico= mysql_query($sqlTecnico) or die(mysql_error());
				$row_rsTecnico = mysql_fetch_assoc($rsTecnico);
?>
<tr class='borde_tabla'>
	<td style='display:none'> <?php echo $row_rsRepara['id_reparacion']; ?></td>
	<td> <?php echo $row_rsCliente['nombre']. "&nbsp;". $row_rsCliente['apellido']; ?> </td>
   	<td> <?php echo $row_rsTecnico['nombre']. "&nbsp;". $row_rsTecnico['apellido']; ?> </td>
   	<td> <?php echo $row_rsRepara['articulo']. "&nbsp;". $row_rsRepara['marca']. "&nbsp;". $row_rsRepara['modelo']; ?> </td>
   	<td> <?php echo $row_rsRepara['detalle']; ?> </td>
    <td> <?php echo $row_rsRepara['fecha_ingreso']; ?> </td>
    <td> <?php echo $row_rsRepara['informe']; ?> </td>
    <td> <?php echo $row_rsRepara['productos_usados']; ?> </td>
    <td> <?php echo $row_rsRepara['costo']; ?> </td>
    <td> <?php echo $row_rsRepara['fecha_reparado']; ?> </td>
</tr>
<?php
			}
?>
</table>
</div>
</div>
</div>

<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>
<a href="productos.php">Regresar</a>