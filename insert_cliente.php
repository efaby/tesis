<?php 
session_start();
ob_start();
$titulo = "Insertar cliente";
require_once("estructura/conecta.php");
require_once("estructura/meta_tags_cliente.php");
require_once("estructura/cabecera.php");

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
  $insertSQL = sprintf("INSERT INTO clientes (cedula, nombre, apellido, email, direccion, telefono,fec_alta ) VALUES (%s, trim(%s), trim(%s), trim(%s), trim(%s), trim(%s), %s)",
                       GetSQLValueString($_POST['Cedula'], "text"),
                       GetSQLValueString($_POST['Nombre'], "text"),
                       GetSQLValueString($_POST['Apellido'], "text"),
                       GetSQLValueString($_POST['Email'], "text"),
                       GetSQLValueString($_POST['Direccion'], "text"),
                       GetSQLValueString($_POST['Telefono'], "text"),
                       GetSQLValueString($_POST['fec_alta'], "date"));

  $Result1 = mysql_query($insertSQL) or die(mysql_error());

  $insertGoTo = "lista_cliente.php";
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
    <h2 class="page-title">Creaci&oacute;n de Cliente</h2>
<form action="<?php echo $editFormAction;?>" method="post" name="form1" id="form1">
  <table align="center">
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">C&eacute;dula:</td>
      <td colspan="2"><input type="text" name="Cedula" value="" size="32" onkeypress="return soloNumeros(event)" maxlength="10" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Nombre:</td>
      <td colspan="2"><input type="text" name="Nombre" value="" size="32" onkeypress="return soloLetras(event)" /></td>
    </tr> 
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Apellido:</td>
      <td colspan="2"><input type="text" name="Apellido" value="" size="32" onkeypress="return soloLetras(event)" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Email:</td>
      <td colspan="2"><input type="text" name="Email" value="" size="32"  /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Direcci&oacute;n:</td>
      <td colspan="2"><input type="text" name="Direccion" value="" size="32" onkeypress="return LetrasNumeros(event)" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Tel&eacute;fono:</td>
      <td colspan="2"><input type="text" name="Telefono" value="" size="32" onkeypress="return soloNumeros(event)" maxlength="10" /></td>
    </tr>
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">Fecha de Alta:</td>
      <td colspan="2"><input readonly type="text" name="fec_alta" value="<?php echo date("Y/m/d"); ?>" size="32" /> </td>
    </tr>
    
    <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><br>
      <button class="btn btn-success" type="button" onclick=" valida_envia();">Insertar </button> &nbsp;
      <a class="btn btn-info" href="lista_cliente.php">Regresar</a></td>
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