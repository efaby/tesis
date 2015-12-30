<?php 
session_start();
ob_start();

$titulo = "Lista de Producto Actualizar";
include("estructura/conecta.php");
include("estructura/meta_tags_producto.php");
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
  $updateSQL = sprintf("UPDATE productos SET producto=trim(%s), marca=trim(%s), modelo=trim(%s), cantidad=%s, precio=%s WHERE id=%s",
                       GetSQLValueString($_POST['producto'], "text"),
                       GetSQLValueString($_POST['marca'], "text"),
                       GetSQLValueString($_POST['modelo'], "text"),
                       GetSQLValueString($_POST['cantidad'], "int"),
                       GetSQLValueString($_POST['precio'], "int"),
                       GetSQLValueString($_POST['Cod_Producto'], "double"));

  $Result1 = mysql_query($updateSQL) or die(mysql_error());

  $updateGoTo = "lista_productos.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsProductos = "-1";
if (isset($_GET['id'])) {
  $colname_rsProductos = $_GET['id'];
}

$query_rsProductos = sprintf("SELECT * FROM productos WHERE id = %s", GetSQLValueString($colname_rsProductos, "int"));
$rsProductos = mysql_query($query_rsProductos) or die(mysql_error());
$row_rsProductos = mysql_fetch_array($rsProductos);
$totalRows_rsProductos = mysql_num_rows($rsProductos);
?>

	<div class="section">
    <div class="container">
    <div class="the-box">
    <h2 class="page-title">Edici&oacute;n de Productos</h2>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Producto:</td>
      <td colspan="2"><input name="producto" type="text" value="<?php echo htmlentities($row_rsProductos['producto'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Marca:</td>
      <td colspan="2"><input name="marca" type="text" value="<?php echo htmlentities($row_rsProductos['marca'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Modelo:</td>
      <td colspan="2"><input name="modelo" type="text" value="<?php echo htmlentities($row_rsProductos['modelo'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Cantidad:</td>
      <td colspan="2"><input type="text" name="cantidad" value="<?php echo htmlentities($row_rsProductos['cantidad'], ENT_COMPAT, 'utf-8'); ?>" size="32" onkeypress="return soloNumeros(event)" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Precio de compra:</td>
      <td colspan="2"><input type="text" name="precio" value="<?php echo htmlentities($row_rsProductos['precio'], ENT_COMPAT, 'utf-8'); ?>" size="32" onkeypress="return soloNumeros(event)" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td>
      <br>
      <button type="submit" class="btn btn-success">Actualizar</button>
      <a href="lista_productos.php" class="btn btn-info">Regresar</a></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="Cod_Producto" value="<?php echo $row_rsProductos['id']; ?>" />
</form>
</div>
</div>
</div>

<?php
mysql_free_result($rsProductos);
?>

<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
ob_end_flush();
?>