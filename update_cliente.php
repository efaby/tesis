<?php
session_start();
ob_start();
$titulo = "Lista de Clientes para Actualizar / Eliminar";
include("estructura/conecta.php");
include("estructura/meta_tags_cliente.php");
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
  $updateSQL = sprintf("UPDATE clientes SET cedula=trim(%s), nombre=trim(%s), apellido=trim(%s), email=trim(%s), direccion=trim(%s), telefono=trim(%s) WHERE id_cliente=%s",
                       GetSQLValueString($_POST['Cedula'], "text"),
                       GetSQLValueString($_POST['Nombre'], "text"),
                       GetSQLValueString($_POST['Apellido'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
					   GetSQLValueString($_POST['Direccion'], "text"),
                       GetSQLValueString($_POST['Telefono'], "text"),                      
                       GetSQLValueString($_POST['id_cliente'], "int"));

  $Result1 = mysql_query($updateSQL) or die(mysql_error());

  $updateGoTo = "lista_cliente.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsClientes = "-1";
if (isset($_GET['id_cliente'])) {
  $colname_rsClientes = $_GET['id_cliente'];
}

$query_rsClientes = sprintf("SELECT * FROM clientes WHERE id_cliente = %s", GetSQLValueString($colname_rsClientes, "int"));
$rsClientes = mysql_query($query_rsClientes) or die(mysql_error());
$row_rsClientes = mysql_fetch_array($rsClientes);
$totalRows_rsClientes = mysql_num_rows($rsClientes);
?>
	<div class="section">
    <div class="container">
    <div class="the-box">
    <h2 class="page-title">Edici&oacute;n de Clientes</h2>
<form action="<?php echo $editFormAction; ?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">C&eacute;dula:</td>
      <td colspan="2"><input name="Cedula" type="text" value="<?php echo htmlentities($row_rsClientes['cedula'], ENT_COMPAT, 'utf-8'); ?>" size="32" readonly="readonly" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nombre:</td>
      <td colspan="2"><input name="Nombre" type="text" value="<?php echo htmlentities($row_rsClientes['nombre'], ENT_COMPAT, 'utf-8'); ?>" size="32" onkeypress="return soloLetras(event)"/></td>
    </tr>
    <tr valign="baseline">
      <td nowrap=" nowrap" align="right">Apellido:</td>
      <td colspan="2"><input name="Apellido" type="text" value="<?php echo htmlentities($row_rsClientes['apellido'], ENT_COMPAT, 'utf-8'); ?>" size="32" onkeypress="return soloLetras(event)" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Email:</td>
      <td colspan="2"><input type="text" name="Email" value="<?php echo htmlentities($row_rsClientes['email'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Direcci&oacute;n:</td>
      <td colspan="2"><input type="text" name="Direccion" value="<?php echo htmlentities($row_rsClientes['direccion'], ENT_COMPAT, 'utf-8'); ?>" size="32" onkeypress="return LetrasNumeros(event)" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tel&eacute;fono:</td>
      <td colspan="2"><input type="text" name="Telefono" value="<?php echo htmlentities($row_rsClientes['telefono'], ENT_COMPAT, 'utf-8'); ?>" size="32" onkeypress="return soloNumeros(event)"  maxlength="10" /></td> 
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><br><button class="btn btn-success" type="submit" onclick=" valida_envia();">Actualizar</button>&nbsp;
      <a href="lista_cliente.php" class="btn btn-info">Regresar</a></td>
    </tr>
  </table>
  <input type="hidden" name="MM_update" value="form1" />
  <input type="hidden" name="id_cliente" value="<?php echo $row_rsClientes['id_cliente']; ?>" />
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