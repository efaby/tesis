<?php
session_start();
ob_start();

$titulo = "Reparaci&oacute;n";
include("estructura/conecta.php");
include("estructura/meta_tags_repara.php");
include("estructura/cabecera.php");
?>
<?php
//obtiene los datos de los tecnicos para el combobox
$query_rsTecnico = "SELECT id_tecnico, nombre, apellido FROM tecnico ORDER BY id_tecnico ASC";
$rsTecnico = mysql_query($query_rsTecnico) or die(mysql_error());
$row_rsTecnico = mysql_fetch_array($rsTecnico);
$totalRows_rsTecnico = mysql_num_rows($rsTecnico);
$colname_rsTecnico = "-1";
if (isset($_POST['lstTecnico'])) {
  $colname_rsTecnico = $_POST['lstTecnico'];
}
if (!function_exists("GetSQLValueString")) {
function GetSQLValueString($theValue, $theType, $theDefinedValue = "", $theNotDefinedValue = "") 
{
  if (PHP_VERSION <6) {
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

//ingreso de una nueva reparacion
$editFormAction = $_SERVER['PHP_SELF'];
if (isset($_SERVER['QUERY_STRING'])) {
  $editFormAction .= "?" . htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_POST["MM_insert"])) && ($_POST["MM_insert"] == "form2")) {
  $insertSQL = sprintf("INSERT INTO reparacion (id_cliente, id_tecnico, articulo, marca, modelo, serie, detalle, fecha_ingreso,informado) VALUES (%s, %s, trim(%s), trim(%s), trim(%s), trim(%s), %s, %s,0)",
                       GetSQLValueString($_POST['txtCliente'], "int"),
                       GetSQLValueString($_POST['lstTecnico'], "int"),
                       GetSQLValueString($_POST['txtNombre'], "text"),
                       GetSQLValueString($_POST['txtMarca'], "text"),
                       GetSQLValueString($_POST['txtModelo'], "text"),
                       GetSQLValueString($_POST['txtSerie'], "text"),
					   GetSQLValueString($_POST['txtDetalle'], "text"),
                       GetSQLValueString($_POST['fec_alta'], "date"));

  $Result1 = mysql_query($insertSQL) or die(mysql_error());
  $insertGoTo = "datos_ingresados.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $insertGoTo .= (strpos($insertGoTo, '?')) ? "&" : "?";
    $insertGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $insertGoTo));
  echo "no vale";
}
?>
<div class="section">
    <div class="container">
    <div class="the-box" id="resultado">
    <h2 class="page-title">Formulario de Reparaci&oacute;n</h2>

<br /><br />

Nombre del Cliente:<input type="text" id="bus" onKeyUp="myFunction()" size="30" required="required" autofocus="autofocus" placeholder="Buscar" />

<div id="myDiv"></div>

<br />

<div id="tabla">

</div>

<form id="form2" name="form2" method="post" action="reparar.php">
<div id="pers" >
</div>
</br>
<table  class='table table-th-block'>
  <tr>
    <td colspan="5"><h4>DATOS DEL EQUIPO</h4></td>
    </tr>
  <tr>
    <td width="70" >Nombre:</td>
    <td width="200"> <label>
      <input type="text" name="txtNombre" id="txtNombre" onkeypress="return LetrasNumeros(event)" />
    </label>   
    </td>
    <td width="20">&nbsp;</td>
    <td width="57">Marca:</td>
    <td width="200"><label>
      <input type="text" name="txtMarca" id="txtMarca" onkeypress="return soloLetras(event)" />
    </label></td>
  </tr>
  <tr>
    <td>Modelo:</td>
    <td><label>
      <input type="text" name="txtModelo" id="txtModelo" onkeypress="return LetrasNumeros(event)" />
    </label></td>
     <td width="20">&nbsp;</td>
    <td width="57">Serie:</td>
    <td width="200"><label>
      <input type="text" name="txtSerie" id="txtSerie"  onkeypress="return LetrasNumeros(event)"/>
    </label></td>
  </tr>
  <tr>
    <td>Detalle da&ntilde;o:</td>
    <td colspan="4"><label>
      <textarea name="txtDetalle" cols="50" id="txtDetalle" onkeypress="return LetrasNumeros(event)"></textarea>
    </label></td>
  </tr>
  <tr> 
  	<td>Fecha de ingreso:</td>
    <td><input readonly type="text" name="fec_alta" value="<?php echo date("Y/m/d"); ?>" size="32" /></td>
    <td width="20">&nbsp;</td>
    <td> T&eacute;cnico: </td>
    <td> <select name="lstTecnico" id="lstTecnico" >
<?php
do {  
?>
<option value="<?php echo $row_rsTecnico['id_tecnico']?>"><?php echo $row_rsTecnico['nombre']. ' ' . $row_rsTecnico['apellido']; ?></option>
<?php
} while ($row_rsTecnico = mysql_fetch_assoc($rsTecnico));
?>
</select>
 </td>
  </tr>
  <tr valign="baseline">
      <td nowrap="nowrap" align="right">&nbsp;</td>
	  <td><button type="button" class="btn btn-success"  onclick=" valida_envia();"> Insertar </button>
    </tr>
</table>
<input type="hidden" name="MM_insert" value="form2" />
</form>
</div>
</div>
</div>
<?php
	include("estructura/cerrar_etiquetas.php");
	mysql_free_result($rsTecnico);
	ob_end_flush();
?>