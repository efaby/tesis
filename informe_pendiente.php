<?php
session_start();
$titulo = "Informe de Reparaciones";
include("estructura/conecta.php");
include("estructura/meta_tags.php");
include("estructura/cabecera_tecnico.php");

$user= $_SESSION['MM_Username'] ;
$Sql="Select * from reparacion where informado=0 and id_tecnico in (select id_tecnico from tecnico where cedula = '$user')"; 
   $result = mysql_query($Sql) or die(mysql_error());
   $repara = mysql_fetch_assoc($result);

//Datos del tecnico
$sql1="select * from tecnico where cedula ='$user'";
$result1=mysql_query($sql1) or die(mysql_error());
$tecnico= mysql_fetch_assoc($result1);
?>

	<div class="section">
    <div class="container">
    <div class="the-box">
    <h2 class="page-title">T&eacute;cnico <?php echo $tecnico['nombre']. "&nbsp;". $tecnico['apellido']; ?></h2>

<table class='table table-th-block'>
<tr> 
	<th style='display:none'>id_reparecion</th>
    <th style='width:150px;text-align:center'>Art&iacute;culo</th>
    <th style='width:150px;text-align:center'>Detalle</th>
    <th style='width:150px;text-align:center'>Fecha ingreso</th>
    <th style='width:150px;text-align:center'>Informe</th>
    <th style='display:none'>Actualizar</th>
</tr>
<?php do { ?>

<tr>
	<td style='display:none'> <?php echo $repara['id_reparacion']; ?> </td>
    <td> <?php echo $repara['articulo']. "&nbsp;". $repara['marca']. "&nbsp;". $repara['modelo']; ?> </td>
    <td> <?php echo $repara['detalle']; ?> </td>
    
    <td> <?php echo $repara['fecha_ingreso']; ?> </td>
    <td align="center" > <a class="btn btn-info btn-xs" href='insert_informe.php?id_reparacion=<?php echo $repara['id_reparacion']?>'> Informe </a> </td>
    <td style='display:none'> <a href=""> Actualizar </a> </td>
</tr>		
<?php 
// comienza un bucle que leera todos los registros y ejecutara las ordenes que siguen
}while ($repara= mysql_fetch_assoc($result)); 
?>

</table>
</div>
</div>
</div>
<?php
include("estructura/cerrar_etiquetas.php");
?>