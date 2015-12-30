<?php 
	include("estructura/conecta.php");
	include("estructura/meta_tags.php"); 

   session_start();
   $user= $_SESSION['MM_Username'] ;
   $Sql="Select * from usuario where Login = '$user'"; 
   $result = mysql_query($Sql) or die(mysql_error());
   $row = mysql_fetch_assoc($result);
   if (strcmp($row['categoria'], "administrador") ==0)
	 {
		header ("Location: productos.php");
	 }
	 else
	 {
		if (strcmp($row['categoria'], "tecnico") ==0)
			 {
				header ("Location: informe_tecnico.php");
			 }
	}
include("estructura/cerrar_etiquetas.php");
?>
