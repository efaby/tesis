<?php
session_start();

$titulo = "Buscar Producto";
include("estructura/conecta.php");
include("estructura/meta_tags.php");
include("estructura/cabecera_tecnico.php");

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

$colname_rsProducto = "-1";
if (isset($_POST['txtCodigo'])) {
  $colname_rsProducto ="%". $_POST['txtCodigo']."%";
}

$query_rsProducto = sprintf("SELECT * FROM productos WHERE producto like %s", GetSQLValueString($colname_rsProducto, "text"));
$rsProducto = mysql_query($query_rsProducto) or die(mysql_error());
$row_rsProducto = mysql_fetch_assoc($rsProducto);
$totalRows_rsProducto = mysql_num_rows($rsProducto);

?>
<div class="section">
    <div class="container">
    <div class="the-box" id="resultado">
    <h2 class="page-title">Listado de Productos por Nombre</h2>

<form id="form1" name="form1" method="post" action="buscarproducto_tecnico.php">  
<table border="0" >
  <tr>
    <td><label id="lblOpcion" >Escriba  el Nombre: </label> </td>
    <td ><label>
      <input type="text" name="txtCodigo" id="txtCodigo" />
      </label></td>
 
    <td colspan="4" align="center"><label>
      <button type="submit" name="btnBuscar" id="btnBuscar" class="btn btn-info">Buscar</button>
    </label>     <!--<a href="productos.php">Regresar</a>--></td>
    </tr>
</table>
</form>
<table class='table table-th-block' >
  <tr align="center">
    <td ><strong>C&oacute;digo</strong></td>
    <td><strong>Nombre</strong></td>
    <td><strong>Marca</strong></td>
    <td><strong>Modelo</strong></td>
    <td><strong>Cantidad</strong></td>
    <td><strong>Precio </strong></td> 
  </tr>
    <?php do { ?>
  <tr>
    <td width="60px" align="right"><?php echo $row_rsProducto['id']; ?></td>
    <td width="120px" align="right"><?php echo $row_rsProducto['producto']; ?></td>
    <td width="80px" align="right"><?php echo $row_rsProducto['marca']; ?></td>
    <td width="80px" align="right"><?php echo $row_rsProducto['modelo']; ?></td>
    <td width="80px" align="right"><?php echo $row_rsProducto['cantidad']; ?></td>
    <td width="80px" align="right"><?php echo $row_rsProducto['precio']; ?> </td>
  </tr>
   <?php } while ($row_rsProducto = mysql_fetch_assoc($rsProducto)); ?>

</table>
</div>
</div>
</div>
<?php
mysql_free_result($rsProducto);
?>
<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>
