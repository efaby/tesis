<?php session_start();

$titulo = "Administraci&oacute;n";
include("estructura/conecta.php");
include("estructura/meta_tags.php");
include("estructura/cabecera2.php");
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
?>
<?php
// *** Validate request to login to this site.
if (!isset($_SESSION)) {
  session_start();
}

$loginFormAction = $_SERVER['PHP_SELF'];
if (isset($_GET['accesscheck'])) {
  $_SESSION['PrevUrl'] = $_GET['accesscheck'];
}

if (isset($_POST['txtUsuario'])) {
  $loginUsername=$_POST['txtUsuario'];
  $password=$_POST['txtPass'];
  $categoria= $_POST['listTipo'];
  $MM_fldUserAuthorization = "";
  $MM_redirectLoginSuccess = "sesiones.php";
  $MM_redirectLoginFailed = "index.php";
  $MM_redirecttoReferrer = false;
  //mysql_select_db($database_inventario, $inventario);
  
  $LoginRS__query=sprintf("SELECT Login, password FROM usuario WHERE Login=%s AND password=%s AND categoria=%s" ,
    GetSQLValueString($loginUsername, "text"), GetSQLValueString($password, "text"), GetSQLValueString($categoria, "text")); 
   
  $LoginRS = mysql_query($LoginRS__query) or die(mysql_error());
  $loginFoundUser = mysql_num_rows($LoginRS);
  if ($loginFoundUser) {
     $loginStrGroup = "";
    
    //declare two session variables and assign them
    $_SESSION['MM_Username'] = $loginUsername;
    $_SESSION['MM_UserGroup'] = $loginStrGroup;	      

    if (isset($_SESSION['PrevUrl']) && false) {
      $MM_redirectLoginSuccess = $_SESSION['PrevUrl'];	
    }
    header("Location: " . $MM_redirectLoginSuccess );
  }
  else {
    echo '<div class="alert alert-danger fade in alert-dismissable" style="margin: 10px auto;width: 400px;">
		<button aria-hidden="true" data-dismiss="alert" class="close" type="button">&times;</button>El usuario no existe o el tipo de usuario no es correcto.
  		</div>';
	
	//header("Location: ". $MM_redirectLoginFailed );
  }
}
?>

<h4 align="center">INICIO DE SESI&Oacute;N </h4>
<form ACTION="<?php echo $loginFormAction; ?>" METHOD="POST" onSubmit="javascript:document.form.reset();">
<table align="center" class='table table-th-block' style="width: 400px">
  <tr>
    <td>Usuario: </td>
    <td><label>
      <input type="text" name="txtUsuario" id="txtUsuario" />
    </label></td>
  </tr>
  <tr> 
    <td>Password: </td>
    <td><label>
      <input type="password" name="txtPass" id="txtPass" />
    </label></td>
  </tr>
  <tr>
  	<td>Tipo de Usuario: </td>
    <td>
    	<select name="listTipo" class="form-control" >
    	  <option value="administrador" selected="selected">Administrador</option>
    	  <option value="tecnico">T&eacute;cnico</option>
        </select>
    </td>
  </tr>
  <tr>
    <td>&nbsp;</td>
    <td><label>
    <button class="btn btn-success" type="submit"><i class="fa fa-sign-in"></i> Ingresar</button>
    </label></td>
  </tr>
</table>

</form>

<?php
include("estructura/pie.php");
include("estructura/cerrar_etiquetas.php");
?>