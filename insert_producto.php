<?php 
session_start();
ob_start();

$titulo = "Insertar Producto";
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

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form1")) {
  $insertSQL = sprintf("INSERT INTO productos (producto, marca, modelo, cantidad, precio) VALUES (trim(%s), trim(%s), trim(%s), %s, %s)",
                       GetSQLValueString($_POST['Nombre'], "text"),
                       GetSQLValueString($_POST['marca'], "text"),
                       GetSQLValueString($_POST['modelo'], "text"),
                       GetSQLValueString($_POST['Cantidad'], "int"),
                       GetSQLValueString($_POST['Precio_compra'], "double"));

  //mysql_select_db($database_inventario, $inventario);
  $Result1 = mysql_query($insertSQL) or die(mysql_error());

  $insertGoTo = "lista_productos.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
}
?>

	<div class="section">
    <div class="container">
    <div class="the-box">
    <h2 class="page-title">Creaci&oacute;n de Producto</h2>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" >Nombre del Producto:</td>
      <td colspan="2"><input type="text" name="Nombre" value="" size="32" onkeypress="return LetrasNumeros(event)" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" >Marca:</td>
      <td colspan="2"><input type="text" name="marca" value="" size="32" onkeypress="return soloLetras(event)" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" >Modelo:</td>
      <td colspan="2"><input type="text" name="modelo" value="" size="32" onkeypress="return LetrasNumeros(event)" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" >Cantidad:</td>
      <td colspan="2"><input type="text" name="Cantidad" value="" size="32" onkeypress="return soloNumeros(event)" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" >Precio de Compra:</td>
      <td colspan="2"><input type="text" name="Precio_compra" value="" size="32" onkeypress="return soloNumeros(event)" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td>
      <br>
      <button class="btn btn-success" type="button" onclick=" valida_envia();"> Insertar </button> 
      &nbsp; <a href="lista_productos.php" class="btn btn-info">Regresar</a></td>
    </tr>
  </table>
  <input type="hidden" name="MM_insert" value="form1" />
</form>
</div>
</div>
</div>


<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
ob_end_flush();
?>