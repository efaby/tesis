<?php

include("estructura/conecta.php");

$codigo=$_POST['vcod'];


$sql="select * from clientes where id_cliente='".$codigo."'";
$res=mysql_query($sql) or die(mysql_error());

$sql1= "select * from reparacion where id_cliente='".$codigo."'";
$res1=mysql_query($sql1) or die(mysql_error());

$sql2="select * from tecnico where id_tecnico in (select id_tecnico from reparacion where id_cliente='".$codigo."')";
$res2= mysql_query($sql2) or die(mysql_error());


if(mysql_num_rows($res1)==0){

 echo '<b>No hay dato</b>';

}else{

 $clientes=mysql_fetch_array($res);
 $repara= mysql_fetch_array($res1);
 $tecnico= mysql_fetch_array($res2);
}
 
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>

<body>

<table class='table table-th-block'>
<tr> 
	<th style='display:none'>id_reparecion</th>
	<th style='width:50px;text-align:center'>C&eacute;dula</th> 
    <th style='width:150px;text-align:center'>Nombre</th>
    <th style='width:150px;text-align:center'>Art&iacute;culo</th>
    <th style='width:150px;text-align:center'>Detalle</th>
    <th style='width:150px;text-align:center'>Fecha ingreso</th>
    <th style='width:150px;text-align:center'>T&eacute;cnico</th>
    <th style='width:150px;text-align:center'>Informe</th>
</tr>
<?php do { ?>

<tr>
	<td style='display:none'> <?php echo $repara['id_reparacion']; ?> </td>
    <td><?php echo $clientes['cedula'] ?> </td>
	<td> <?php echo $clientes['nombre'] . "&nbsp;". $clientes['apellido']; ?> </td>
    <td> <?php echo $repara['articulo']. "&nbsp;". $repara['marca']. "&nbsp;". $repara['modelo']; ?> </td>
    <td> <?php echo $repara['detalle']; ?> </td>
    <td> <?php echo $repara['fecha_ingreso']; ?> </td>
    <td> <?php echo $tecnico['nombre']. "&nbsp;". $tecnico['apellido']; ?> </td>
    <td align="center"> <a class="btn btn-info btn-xs" href='mostrar_informe.php?id_reparacion=<?php echo $repara['id_reparacion']?>'> Mostrar Informe </a> </td>
</tr>		
<?php 
// comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
}while ($repara= mysql_fetch_assoc($res1)); 
?>

</table>

</body>
</html>
<?php
include("estructura/cerrar_etiquetas.php");
?>