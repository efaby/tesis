<?php
session_start();
$titulo = "Ingresar el Informe";
include("estructura/conecta.php");
include("estructura/meta_tags_repara.php");
include("estructura/cabecera.php");

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


$colname_rsRepara = "-1";
if (isset($_GET['id_reparacion'])) {
  $colname_rsRepara = $_GET['id_reparacion'];
}

$query_rsRepara = sprintf("SELECT * FROM reparacion WHERE id_reparacion = %s", GetSQLValueString($colname_rsRepara, "int"));
$rsRepara = mysql_query($query_rsRepara) or die(mysql_error());
$row_rsRepara = mysql_fetch_array($rsRepara);
$totalRows_rsRepara = mysql_num_rows($rsRepara);
?>
<script type="text/javascript">
function imprimir(){
	var posicion_x; 
	var ancho = 850;
	var alto = 650;
	var posicion_y; 
	posicion_x=(screen.width/2)-(ancho/2); 
	posicion_y=(screen.height/2)-(alto/2); 
	var w = window.open("", "Imprimir Pedido", "width="+ancho+",height="+alto+",menubar=0,toolbar=0,directories=0,scrollbars=no,resizable=no,left="+posicion_x+",top="+posicion_y);
	var h = "<link href='css/bootstrap.min.css' rel='stylesheet'>";
	h = h +	"<link href='css/font-awesome/css/font-awesome.min.css' rel='stylesheet'>";
	h = h +	"<link href='css/style.css' rel='stylesheet'>";
	h = h +	"<link href='css/style-responsive.css' rel='stylesheet'>";
	h = h +	"<body style='padding-top: 0px;'>	<div style='padding: 10px; text-align: right;'><a href='javascript:window.print()'> <span class='glyphicon glyphicon-print'></span>&nbsp;Imprimir</a>	</div>";
	w.document.write( h + document.getElementById("resultado").innerHTML );								
	w.document.close();
}
</script>
<div class="section">
    <div class="container">
    <div style="text-align: right; margin: 20px;"><a class='btn btn-info btn-xs' href='javascript:imprimir();'>Imprimir</a></div>
    <div class="the-box" id="resultado">
    <h2 class="page-title">Informe de Reparaci&oacute;n</h2>
<table class='table table-th-block'>
  <tr>
    <td colspan="5"><h4>DATOS DEL EQUIPO</h4></td>
    </tr>
  <tr>
    <td width="70" >Equipo:</td>
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
    <td>Detalle del Da&ntilde;o:</td>
    <td colspan="4"><label>
      <textarea name="txtDetalle" cols="50" id="txtDetalle" readonly="readonly"><?php echo htmlentities($row_rsRepara['detalle'], ENT_COMPAT, 'utf-8'); ?></textarea>
    </label></td>
  </tr>
  <tr> 
  	<td>Fecha de Ingreso:</td>
    <td><input readonly type="text" name="fec_alta" value="<?php echo htmlentities($row_rsRepara['fecha_ingreso'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td>
    <td width="20">&nbsp;</td>
	<td>Fecha de Reparaci&oacute;n:</td>
    <td><input readonly type="text" name="fec_repara" value="<?php echo htmlentities($row_rsRepara['fecha_reparado'], ENT_COMPAT, 'utf-8'); ?>" size="32" /></td> 
    </tr>
  <tr>
  	<td>Informe de Reparaci&oacute;n:</td>
    <td colspan="4"><label>
      <textarea name="txtReparacion" cols="50" id="txtReparacion" readonly="readonly"><?php echo htmlentities($row_rsRepara['informe'], ENT_COMPAT, 'utf-8'); ?></textarea>
    </label></td>
  </tr>
  <tr>
  	 <td>Productos Usados:</td>
    <td colspan="4"><label>
      <textarea name="txtProdusa" cols="50" id="txtProdusa" readonly="readonly"><?php echo htmlentities($row_rsRepara['productos_usados'], ENT_COMPAT, 'utf-8'); ?></textarea>
    </label></td> 
  </tr>
  <tr>
  	<td>Costo:</td>
    <td><label>
      <input type="text" name="txtCosto" id="txtCosto" readonly="readonly" value="<?php echo htmlentities($row_rsRepara['costo'], ENT_COMPAT, 'utf-8'); ?>" />
    </label></td>
  </tr>
  
</table>
</div>
<div style="margin-top: 20px;"> <a class="btn btn-info" href="informe_repara.php">Regresar</a></div>

</div>
</div>