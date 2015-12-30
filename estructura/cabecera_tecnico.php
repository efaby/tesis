
 <?php
 // ** Logout the current user. **
$logoutAction = $_SERVER['PHP_SELF']."?doLogout=true";
if ((isset($_SERVER['QUERY_STRING'])) && ($_SERVER['QUERY_STRING'] != "")){
  $logoutAction .="&". htmlentities($_SERVER['QUERY_STRING']);
}

if ((isset($_GET['doLogout'])) &&($_GET['doLogout']=="true")){
  //to fully log out a visitor we need to clear the session varialbles
  $_SESSION['MM_Username'] = NULL;
  $_SESSION['MM_UserGroup'] = NULL;
  $_SESSION['PrevUrl'] = NULL;
  unset($_SESSION['MM_Username']);
  unset($_SESSION['MM_UserGroup']);
  unset($_SESSION['PrevUrl']);
  session_destroy();
  $logoutGoTo = "index.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}

 ?>

 <link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/style-responsive.css" rel="stylesheet">

<div class="top-navbar dark-color">
			<div class="container">

<div class="logo">C.A.T.S  EVOLUTION</div>  
<ul id="MenuBar1" class="menus">
<li class="parent"><a href="#" >Reparaci&oacute;n</a>
  <ul class="sub-menus">
    <li class="sub-list"><a href="informe_tecnico.php">Solucionadas</a></li>
    <li class="sub-list"><a href="informe_pendiente.php">Pendientes</a></li>
  </ul>
</li>
<li class="parent"><a href="buscarproducto_tecnico.php">Buscar Producto</a>  </li>
<li class="parent"><a href="<?php echo $logoutAction ?>">Salir</a></li>
</ul>
</div>


</div>