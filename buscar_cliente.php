<?php

include("estructura/conecta.php");

$codigo=$_POST['vcod'];


$sql="select * from clientes where id_cliente='".$codigo."'";
$res=mysql_query($sql) or die(mysql_error());


if(mysql_num_rows($res)==0){

 echo '<b>No hay dato</b>';

}else{

 $row_rsCliente=mysql_fetch_array($res);
?>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>
</head>

<body>

<table  class='table table-th-block'>
	<tr>
    <td colspan="5" align="center"><strong>DATOS DEL CLIENTE</strong></td>
    </tr>
  <tr>
    <td width="168" style="display:none"> <input type="text" name="txtCliente" id="txtCliente" value="<?php echo $row_rsCliente['id_cliente']?>"/></td>
    <td width="171">C&eacute;dula / RUC:</td>
    <td colspan="4"><input type="text" name="txtRUC" id="txtRUC" value="<?php echo $row_rsCliente['cedula']?>"readonly="readonly"/></td>
    </tr>
  <tr>
    <td>Nombre:</td>
    <td colspan="4"><label>
      <input name="txtApellido" type="text" id="txtApellido" value="<?php echo $row_rsCliente['apellido'].' '. $row_rsCliente['nombre']; ?>" readonly="readonly" />
    </label> </td>
    </tr>
  <tr>
    <td>Direcci&oacute;n:</td>
    <td colspan="2">
      <input name="txtDireccion" type="text" id="txtDireccion" value="<?php echo $row_rsCliente['direccion']; ?>" maxlength="200" readonly="readonly" /></td>
    <td width="77">Tel&eacute;fono:</td>
    <td width="168"><input name="txtTelefono" type="text" value="<?php echo $row_rsCliente['telefono']; ?>" maxlength="9" readonly="readonly" /></td>
    </tr> 
  <tr>
    <td >Email: </td>
    <td colspan="4" ><input name="txtCelular" type="text" value="<?php echo $row_rsCliente['email']; ?>" size="35" maxlength="80" readonly="readonly" /> </td>
  </tr>
</table>

</body>
</html>
<?php
}
?>