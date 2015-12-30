<?php 
session_start();

$titulo = "Informe de Reparaci&oacute;n";
include("estructura/conecta.php");
include("estructura/meta_tags_informe.php");
include("estructura/cabecera.php");

?>

<div class="section">
    <div class="container">
    <div class="the-box" id="resultado">
    <h2 class="page-title">Lista Reparaciones por Cliente</h2>

<br /><br />

Nombre del Cliente:<input type="text" id="bus" onKeyUp="myFunction()" size="30" required="required" autofocus="autofocus" placeholder="Buscar" />

<div id="myDiv"></div>

<br />

<div id="tabla">

</div>
<div id="pers" >
</div>
</div>
</div>
</div>

<?php
	include("estructura/cerrar_etiquetas.php");
?>