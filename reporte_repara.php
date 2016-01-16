<?php
session_start();

$titulo = "Lista de Reparaciones";
include("estructura/conecta.php");
include("estructura/meta_tags_repara.php");
include("estructura/cabecera.php");
?>
		<link href="css/datepicker.min.css" rel="stylesheet">
<script src="js/jquery.min.js"></script>
<script src="js/jquery.min.js"></script>
<script src="js/bootstrap-datepicker.js"></script>
<script type="text/javascript">
$(document).ready(function(){
if ($('#datepicker1').length > 0){
	var nowTemp = new Date();
	var now = new Date(nowTemp.getFullYear(), nowTemp.getMonth(), nowTemp.getDate(), 0, 0, 0, 0);
	 
	var checkin = $('#datepicker1').datepicker({
	  onRender: function(date) {
		return '';
	  }
	}).on('changeDate', function(ev) {
	  
		var newDate = new Date(ev.date)
		newDate.setDate(newDate.getDate());
		checkout.setValue(newDate);
	 
	  checkin.hide();
	  $('#datepicker2')[0].focus();
	}).data('datepicker');
	
	var checkout = $('#datepicker2').datepicker({
	  onRender: function(date) {
		return date.valueOf() < checkin.date.valueOf() ? 'disabled' : '';
	  }
	}).on('changeDate', function(ev) {
	  checkout.hide();
	}).data('datepicker');
}

});
</script>
<?php
$fecha_inicio = (isset($_POST['fecha_inicio'])?$_POST['fecha_inicio']:'');
$fecha_fin = (isset($_POST['fecha_fin'])?$_POST['fecha_fin']:'');
$where = '';
if($fecha_inicio != ''){
	$where = " where fecha_reparado BETWEEN '".$fecha_inicio."' and '".$fecha_fin."' ";
}
$query_rsReparacion = "SELECT * FROM reparacion $where order by id_cliente";

$rsRepara = mysql_query($query_rsReparacion) or die(mysql_error());
$row_rsRepara = mysql_fetch_assoc($rsRepara);
?>

	<div class="section">
    <div class="container">
    <div class="the-box" id="resultado">
    <h2 class="page-title">Listado Reparaciones</h2>
    <br>
    <form action="" method="post">
    <table>
    <tr>
    <td>Desde:</td>
    <td> <input id="datepicker1" class="form-control datepicker" type="text" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" name="fecha_inicio" value="<?php echo $fecha_inicio;?>"></td>
    <td>Hasta:</td>
    <td> <input id="datepicker2" class="form-control datepicker" type="text" placeholder="yyyy-mm-dd" data-date-format="yyyy-mm-dd" name="fecha_fin" value="<?php echo $fecha_fin;?>"></td>
    <td><button type="submit" class="btn btn-success">Buscar</button></td>
    </tr>
    </table>
    </form>
    <br><br>
<table class='table table-th-block'>
<tr class=titulo>
	<th style='display:none'>id_reparacion</th>
	<th style='text-align:center'>Cliente</th>
	<th style='text-align:center'>T&eacute;cnico</th>
	<th style='text-align:center'>Art&iacute;culo</th>
	<th style='text-align:center'>Detalle de Da&ntilde;o</th>
	<th style='text-align:center'>Fecha de Ingreso</th>
	<th style='text-align:center'>Informe</th>
    <th style='text-align:center'>Productos Usados</th>
    <th style='text-align:center'>Costo</th>
    <th style='text-align:center'>Fecha de Reparaci&oacute;n</th>
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