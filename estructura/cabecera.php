<?php
//initialize the session
if (!isset($_SESSION)) {
  session_start();
}

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
  $logoutGoTo = "sistema.php";
  if ($logoutGoTo) {
    header("Location: $logoutGoTo");
    exit;
  }
}
?>
<script src="SpryAssets/SpryMenuBar.js" type="text/javascript"></script>
<link href="SpryAssets/SpryMenuBarHorizontal.css" rel="stylesheet" type="text/css"/>

<link href="css/bootstrap.min.css" rel="stylesheet">
<link href="css/font-awesome/css/font-awesome.min.css" rel="stylesheet">
<link href="css/style.css" rel="stylesheet">
<link href="css/style-responsive.css" rel="stylesheet">

<div class="top-navbar dark-color">
			<div class="container">

<div class="logo" style="color: #fff;"><img src="images/logo.png"></div>  

<ul class="menus">
  <li class="parent"><a href="#fakelink">Producto</a> 
    <ul class="sub-menus">
      <li class="sub-list"><a href="productos.php">Venta</a></li>
      <li class="sub-list"><a href="lista_productos.php">Listado Productos</a></li>
    </ul>    
  </li>
  <li class="parent"><a href="#" >Reparaci&oacute;n</a>
    <ul class="sub-menus">
      <li class="sub-list"><a href="reparar.php">Nueva Orden</a></li>
      <li class="sub-list"><a href="informe_repara.php">Informe Reparaci&oacute;n</a></li>
    </ul>
  </li>
  <li class="parent"><a href="lista_proveedor.php" >Proveedor</a></li>
  <li class="parent"><a href="lista_cliente.php">Cliente</a></li>
  <li class="parent"><a href="lista_tecnico.php" >T&eacute;cnico</a></li>
  <li class="parent"><a href="#">Reportes</a>
    <ul  class="sub-menus">
      <li class="sub-list"><a href="inventario.php">Inventario</a></li>
      <li class="sub-list"><a href="reporte_repara.php">Reparaciones</a></li>
      <li class="sub-list"><a href="buscarproducto.php">Buscar Producto</a></li>
    </ul>
  </li>
  <li class="parent"><a href="<?php echo $logoutAction ?>">Salir</a></li>
</ul>

</div>
</div>