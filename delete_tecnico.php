<?php 
session_start();

$titulo = "Eliminar T&eacute;cnico";
include("estructura/conecta.php");
include("estructura/meta_tags.php");
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

if ((isset($_GET['id_tecnico'])) && ($_GET['id_tecnico'] != "")) {
  $deleteTecnico= sprintf("DELETE FROM usuario WHERE login in (select cedula from tecnico where id_tecnico=%s)",
                       GetSQLValueString($_GET['id_tecnico'], "int"));

  $Result1 = mysql_query($deleteTecnico) or die(mysql_error());

  $deleteSQL = sprintf("DELETE FROM tecnico WHERE id_tecnico=%s",
                       GetSQLValueString($_GET['id_tecnico'], "int"));

  $Result2 = mysql_query($deleteSQL) or die(mysql_error());
  
  
  $deleteGoTo = "consulta_tecnico.php";
  if (isset($_SERVER['QUERY_STRING'])) {
    $deleteGoTo .= (strpos($deleteGoTo, '?')) ? "&" : "?";
    $deleteGoTo .= $_SERVER['QUERY_STRING'];
  }
  header(sprintf("Location: %s", $deleteGoTo));
}
?>
<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>