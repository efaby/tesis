<?php
session_start();
$titulo = "Ingresar el Informe";
include("estructura/conecta.php");
include("estructura/meta_tags.php");
include("estructura/cabecera_tecnico.php");

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
  $updateSQL = sprintf("UPDATE reparacion SET informe=%s, productos_usados=%s, costo=%s, fecha_reparado=%s, informado=1  WHERE id_reparacion=%s",
                       GetSQLValueString($_POST['txtReparacion'], "text"),
                       GetSQLValueString($_POST['txtProdusa'], "text"),
                       GetSQLValueString($_POST['txtCosto'], "int"),
                       GetSQLValueString($_POST['fec_repara'], "date"),
                       GetSQLValueString($_POST['id_reparacion'], "int"));

  $Result1 = mysql_query($updateSQL) or die(mysql_error());

  $updateGoTo = "informe_tecnico.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $updateGoTo .= (strpos($updateGoTo, '?')) ? "&" : "?";
    $updateGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $updateGoTo));
}

$colname_rsRepara = "-1";
if (isset($_GET['id_reparacion'])) {
  $colname_rsRepara = $_GET['id_reparacion'];
}

$query_rsRepara = sprintf("SELECT * FROM reparacion WHERE id_reparacion = %s", GetSQLValueString($colname_rsRepara, "int"));
$rsRepara = mysql_query($query_rsRepara) or die(mysql_error());
$row_rsRepara = mysql_fetch_array($rsRepara);
$totalRows_rsRepara = mysql_num_rows($rsRepara);
?>
<div class="section">
    <div class="container">
    <div class="the-box" id="resultado">
    <h2 class="page-title">Ficha de Reparaci&oacute;n</h2>

<form id="form1" name="form1" method="post" action="<?php echo $editFormAction; ?>">
</br>
<table class='table table-th-block'>
  <tr>
    <td colspan="5"><h4>DATOS DEL EQUIPO</h4></td>
    </tr>
  <tr>
    <td width="70" >Nombre:</td>
    <td width="200"> <label>
      <input type="text" name="txtNombre" id="txtNombre" value="<?php echo htmlentities($row_rsRepara['articulo'], ENT_COMPAT, 'utf-8'); ?>" readonly="readonly" />
    </label>   
    </td>
    <td width="20">&nbsp;</td>
    <td width="57">Marca:</td>
    <td width="200"><label>
      <input type="text" name="txtMarca" id="txtMarca" value="<?php echo htmlentities($row_rsRepara['marca'], ENT_COMPAT, 'utf-8'); ?>" readonly="readonly" />
    </label></td>
  </tr>
  <tr>
    <td>Modelo:</td>
    <td><label>
      <input type="text" name="txtModelo" id="txtModelo" value="<?php echo htmlentities($row_rsRepara['modelo'], ENT_COMPAT, 'utf-8'); ?>" readonly="readonly" />
    </label></td>
     <td width="20">&nbsp;</td>
    <td width="57">Serie:</td>
    <td width="200"><label>
      <input type="text" name="txtSerie" id="txtSerie" value="<?php echo htmlentities($row_rsRepara['serie'], ENT_COMPAT, 'utf-8'); ?>" readonly="readonly" />
    </label></td>
  </tr>
  <tr>
    <td>Detalle da&ntilde;o:</td>
    <td colspan="4"><label>
      <textarea name="txtDetalle" cols="50" id="txtDetalle" readonly="readonly"><?php echo htmlentities($row_rsRepara['detalle'], ENT_COMPAT, 'utf-8'); ?></textarea>
    </label></td>
  </tr>
  <tr> 
  	<td>Fecha de ingreso:</td>
    <td><input readonly type="text" name="fec_alta" value="<?php echo htmlentities($row_rsRepara['fecha_ingreso'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    <td width="20">&nbsp;</td>
	<td>Fecha de reparacion:</td>
    <td><input readonly type="text" name="fec_repara" value="<?php echo date("Y/m/d"); ?>" size="32" /></td> 
    </tr>
  <tr>
  	<td>Informe de Reparaci&oacute;n:</td>
    <td colspan="4"><label>
      <textarea name="txtReparacion" cols="50" id="txtReparacion"></textarea>
    </label></td>
  </tr>
  <tr>
  	 <td>Productos usados:</td>
    <td colspan="4"><label>
      <textarea name="txtProdusa" cols="50" id="txtProdusa"></textarea>
    </label></td> 
  </tr>
  <tr>
  	<td>Costo:</td>
    <td><label>
      <input type="text" name="txtCosto" id="txtCosto" />
    </label></td>
  </tr>
  <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
      <td><button type="submit" class="btn btn-success">Guardar</button> &nbsp; <a class="btn btn-info" href="informe_pendiente.php">Regresar</a></td>
    </tr>
</table>

<input type="hidden" name="MM_update" value="form1" />
<input type="hidden" name="id_reparacion" value="<?php echo $row_rsRepara['id_reparacion']; ?>" />
</form>
</div>
</div>
</div>