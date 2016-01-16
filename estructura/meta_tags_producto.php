<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES">
<head>
	<title><?php echo $titulo; ?></title>
	<!--<meta http-equiv="content-type" content="text/html; charset=utf-8"/> -->
	<meta name="title" content="Carrito de compra en PHP y MySql con forma de pago PayPal"> 
	<meta name="description" content="Guía paso a paso del BLOG COLORATE para crear un carrito de compra en Php y Mysql con forma de pago Paypal"> 
	<meta name="keywords" content="carrito de compra en php, sesiones en php, tienda virtual, colorate, blog colorate, colordeu, colordeu.es, tienda, diseño web, tutorial, tutoriales"> 
	
	<link rel="stylesheet" href="css/main.css"> 
    <script src="ajax.js"></script>
   <script src="valida.js" type="text/javascript"></script>


<script>

	function dos_decimales(cadena){
		var expresion=/^\d+(\.\d{0,2})?$/;
		var resultado=expresion.test(cadena);
		return resultado;
	}
	
	

	function valida_envia(){ 
			//valida el nombre
			if ( document.form1.Nombre.value.trim()==""){ 
      			alert("Tiene que escribir su nombre") 
      			document.form1.Nombre.focus() 
      			return 0; 
   			}
			
			//valida la marca
			else if (document.form1.marca.value.trim()==""){ 
      			alert("Tiene que escribir la marca") 
      			document.form1.marca.focus() 
      			return 0; 
			}
			
			//valida el modelo
			else  if( document.form1.modelo.value.trim()=="" ) {
   				alert("El modelo no es valido ");
				document.form1.modelo.focus()
				return 0;
  			}
			
			//valida la cantidad
			else  if (document.form1.Cantidad.value.trim()=="" ){ 
      			alert("Tiene que escribir la cantidad") 
      			document.form1.Cantidad.focus() 
      			return 0; 
   			}
   			
			//valida el precio 
			else  if (document.form1.Precio_compra.value.trim()=="" ){ 
      			alert("Tiene que escribir la cantidad") 
      			document.form1.Precio_compra.focus() 
      			return 0; 
   			}
			
   			else {
				//el formulario se envia 
   				//alert("Muchas gracias por enviar el formulario"); 
   				document.form1.submit(); 
			}
		}
//funciones para confirmar la eliminacion de unregistro
function objetoAjax(){
	var xmlhttp=false;
	try {
		xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
	} catch (e) {
		try {
		   xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
		} catch (E) {
			xmlhttp = false;
  		}
	}

	if (!xmlhttp && typeof XMLHttpRequest!='undefined') {
		xmlhttp = new XMLHttpRequest();
	}
	return xmlhttp;
}

function eliminarDato(idempleado){
	//donde se mostrará el resultado de la eliminacion
	divResultado = document.getElementById('resultado');
	
	//usaremos un cuadro de confirmacion	
	var eliminar = confirm("\xbfEst\xe1 seguro que desea eliminar el dato?")
	if ( eliminar ) {
		//instanciamos el objetoAjax
		ajax=objetoAjax();
		//uso del medotod GET
		//indicamos el archivo que realizará el proceso de eliminación
		//junto con un valor que representa el id del empleado
		ajax.open("GET", "delete_producto.php?id="+idempleado);
		ajax.onreadystatechange=function() {
			if (ajax.readyState==4) {
				//mostrar resultados en esta capa
				divResultado.innerHTML = ajax.responseText
			}
		}
		//como hacemos uso del metodo GET
		//colocamos null
		ajax.send(null)
	}
}

</script>
</head>
<body>