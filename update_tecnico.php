<?php
session_start();
ob_start();

$titulo = "Actualizar Tecnico";
include("estructura/conecta.php");
include("estructura/meta_tags_tecnico.php");
include("estructura/cabecera.php");
?>
<?php
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION < 6) {
    $theValue = get_magic_quotes_gpc() ? stripslashes($theValue) : $theValue;
  }

  $theValue = function_exists("mysql_real_escape_string") ? mysql_real_escape_string($theValue) : mysql_escape_string($theValue);

  switch ($theType) {
    case "text":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;    
    case "long":
    case "int":
      $theValue = ($theValue != "") ? intval($theValue) : "NULL";
      break;
    case "double":
      $theValue = ($theValue != "") ? doubleval($theValue) : "NULL";
      break;
    case "date":
      $theValue = ($theValue != "") ? "'" . $theValue . "'" : "NULL";
      break;
    case "defined":
      $theValue = ($theValue != "") ? $theDefinedValue : $theNotDefinedValue;
      break;
  }
  return $theValue;
}
}

$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_update"])) && ($_POST["MM_update"] == "form1")) {
  $updateSQL = sprintf("UPDATE tecnico SET cedula=trim(%s), nombre=trim(%s), apellido=trim(%s), direccion=trim(%s), telefono=trim(%s) WHERE id_tecnico=%s",
                       GetSQLValueString($_POST['Cedula'], "text"),
                       GetSQLValueString($_POST['Nombre'], "text"),
                       GetSQLValueString($_POST['Apellido'], "text"),
					   GetSQLValueString($_POST['Direccion'], "text"),
                       GetSQLValueString($_POST['Telefono'], "text"),                      
                       GetSQLValueString($_POST['id_tecnico'], "int"));

  $Result1 = mysql_query($updateSQL) or die(mysql_error());
  
  if ($_POST['Password'])
  {
  	$updateUser= sprintf("UPDATE usuario set Password = trim(%s) WHERE Login=%s",
  		GetSQLValueString($_POST['Password'], "text"),
  		GetSQLValueString($_POST['Cedula'], "text"));
  	$Result= mysql_query($updateUser) or die(mysql_error());
  }
  
  $updateGoTo = "lista_tecnico.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsClientes = "-1";
if (isset($_GET['id_tecnico'])) {
  $colname_rsClientes = $_GET['id_tecnico'];
}

$query_rsClientes = sprintf("SELECT * FROM tecnico WHERE id_tecnico = %s", GetSQLValueString($colname_rsClientes, "int"));
$rsClientes = mysql_query($query_rsClientes) or die(mysql_error());
$row_rsClientes = mysql_fetch_array($rsClientes);
$totalRows_rsClientes = mysql_num_rows($rsClientes);
?>
	<div class="section">
    <div class="container">
    <div class="the-box">
    <h2 class="page-title">Edici&oacute;n de T&eacute;cnicos</h2>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">C&eacute;dula:</td>
      <td colspan="2"><input type="text" name="Cedula" value="<?php echo htmlentities($row_rsClientes['cedula'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nombres:</td>
      <td colspan="2"><input type="text" name="Nombre" value="<?php echo $row_rsClientes['nombre']; ?>" size="32" onkeypress="return soloLetras(event)"/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Apellidos:</td>
      <td colspan="2"><input type="text" name="Apellido" value="<?php echo $row_rsClientes['apellido']; ?>" size="32"/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Direcci&oacute;n:</td>
      <td colspan="2"><input type="text" name="Direccion" value="<?php echo $row_rsClientes['direccion']; ?>" size="32" onkeypress="return LetrasNumeros(event)" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tel&eacute;fono:</td>
      <td colspan="2"><input type="text" name="Telefono" value="<?php echo htmlentities($row_rsClientes['telefono'], ENT_COMPAT, 'utf-8'); ?>" size="32" maxlength="10" onkeypress="return soloNumeros(event)" /></td>
    </tr>
      <tr valign="baseline">
      <td nowrap="nowrap" align="right">Password:</td>
      <td colspan="2"><input type="password" name="Password" value="" size="32" maxlength="10"  /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Confirmar Password:</td>
      <td colspan="2"><input type="password" name="ConfirmarPass" value="" size="32" maxlength="10"  /></td>
    </tr>
   
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><br><button type="submit"  class="btn btn-success">Actualizar</button>&nbsp;
      <a href="lista_tecnico.php"  class="btn btn-info">Regresar</a></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id_tecnico" value="<?php echo $row_rsClientes['id_tecnico']; ?>" />
</form>
</div>
</div>
</div>
<?php
mysql_free_result($rsClientes);
?>
<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
ob_end_flush();
?>