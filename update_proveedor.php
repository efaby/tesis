<?php 
session_start();
ob_start();

$titulo = "Actualizar Proveedor";
include("estructura/conecta.php");
include("estructura/meta_tags_proveedor.php");
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
  $updateSQL = sprintf("UPDATE proveedor SET RUC=trim(%s), Nombre=trim(%s), Apellido=trim(%s), Direccion=trim(%s), Telefono=trim(%s), Celular=trim(%s) WHERE Cod_Proveedor=%s",
                       GetSQLValueString($_POST['RUC'], "undefined"),
                       GetSQLValueString($_POST['Nombre'], "text"),
                       GetSQLValueString($_POST['Apellido'], "text"),
                       GetSQLValueString($_POST['Direccion'], "text"),
                       GetSQLValueString($_POST['Telefono'], "text"),
                       GetSQLValueString($_POST['Celular'], "text"),
                       GetSQLValueString($_POST['Cod_Proveedor'], "int"));

  $Result1 = mysql_query($updateSQL) or die(mysql_error());

  $updateGoTo = "lista_proveedor.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsProveedor = "-1";
if (isset($_GET['Cod_Proveedor'])) {
  $colname_rsProveedor = $_GET['Cod_Proveedor'];
}

$query_rsProveedor = sprintf("SELECT * FROM proveedor WHERE Cod_Proveedor = %s", GetSQLValueString($colname_rsProveedor, "int"));
$rsProveedor = mysql_query($query_rsProveedor) or die(mysql_error());
$row_rsProveedor = mysql_fetch_array($rsProveedor);
$totalRows_rsProveedor = mysql_num_rows($rsProveedor);
?>

	<div class="section">
    <div class="container">
    <div class="the-box">
    <h2 class="page-title">Edici&oacute;n de Proveedor</h2>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">RUC:</td>
      <td colspan="2"><input type="text" name="RUC" value="<?php echo htmlentities($row_rsProveedor['RUC'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly"></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nombre:</td>
      <td colspan="2"><input name="Nombre" type="text" value="<?php echo $row_rsProveedor['Nombre']; ?>" size="32"/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Apellido:</td>
      <td colspan="2"><input name="Apellido" type="text" value="<?php echo $row_rsProveedor['Apellido']; ?>" size="32"/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Direcci&oacute;n:</td>
      <td colspan="2"><input type="text" name="Direccion" value="<?php echo $row_rsProveedor['Direccion']; ?>" size="32" onkeypress="return LetrasNumeros(event)" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tel&eacute;fono:</td>
      <td colspan="2"><input name="Telefono" type="text" value="<?php echo htmlentities($row_rsProveedor['Telefono'], ENT_COMPAT, 'utf-8'); ?>" size="32" maxlength="9" onkeypress="return soloNumeros(event)" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Celular:</td>
      <td colspan="2"><input name="Celular" type="text" value="<?php echo htmlentities($row_rsProveedor['Celular'], ENT_COMPAT, 'utf-8'); ?>" size="32" maxlength="10" onkeypress="return soloNumeros(event)" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><br>
      <button type="submit" class="btn btn-success">Actualizar</button>&nbsp;
      <a href="lista_proveedor.php" class="btn btn-info">Regresar</a></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="Cod_Proveedor" value="<?php echo $row_rsProveedor['Cod_Proveedor']; ?>" />
</form>
</div>
</div>
</div>
<?php
mysql_free_result($rsProveedor);
?>
<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
ob_end_flush();
?>