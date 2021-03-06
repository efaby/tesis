<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES">
<head>
	<title><?php echo $titulo;?></title>
	<!--<meta http-equiv="content-type" content="text/html; charset=utf-8"/> -->
	<meta name="title" content="Carrito de compra en PHP y MySql con forma de pago PayPal"> 
	<meta name="description" content="Gu�a paso a paso del BLOG COLORATE para crear un carrito de compra en Php y Mysql con forma de pago Paypal"> 
	<meta name="keywords" content="carrito de compra en php, sesiones en php, tienda virtual, colorate, blog colorate, colordeu, colordeu.es, tienda, dise�o web, tutorial, tutoriales"> 
	<link rel="stylesheet" href="css/main.css"> 
    <script src="/carro_final/ajax.js"></script>
    <script src="/carro_final/valida.js" type="text/javascript"></script>
    <script>
	
	   	function valida_envia(){ 
   		//valido la cedula q no sea espacio en blanco
			cedula=document.form1.Cedula.value.length
   			if (cedula==0 ){ 
      			alert("Ingrese una c\xe9dula v\xe1lida.") 
      			document.form1.Cedula.focus() 
      			return 0; 
   			}
			
			//valida que la cedula tenga 10 caracteres y no tenga guion
			else if (cedula<10 ){ 
      			alert("Ingrese una  c\xe9dula con 10 caracteres y sin gui\xf3n.") 
      			document.form1.Cedula.focus() 
      			return 0; 
   			} 
			
			//valida el nombre
			else if ( document.form1.Nombre.value.trim()==""){ 
      			alert("Ingrese un nombre v\xe1lido.") 
      			document.form1.Nombre.focus() 
      			return 0; 
   			}
			
			//valida el apellido
			else if (document.form1.Apellido.value.trim()==""){ 
      			alert("Ingrese un apellido v\xe1lido.") 
      			document.form1.Apellido.focus() 
      			return 0; 
			}
			
			//valida la direccion
			else if (document.form1.Direccion.value.trim()==""){ 
      			alert("Ingrese una direcci\xf3n v\xe1lida.") 
      			document.form1.Direccion.focus() 
      			return 0; 
			}
			
			//valida el numero de telefono
			else if (document.form1.Telefono.value.trim()==""){ 
      			alert("Ingrese un n\xfamero de tel\xe9fono v\xe1lido.") 
      			document.form1.Telefono.focus() 
      			return 0; 
			}
			
			//valida que el telefono tenga 9 digitos
			else if (document.form1.Telefono.value.length<9 ){ 
      			alert("Ingrese un n\xfamero de tel\xe9fono de 9 caracteres.") 
      			document.form1.Telefono.focus() 
      			return 0; 
   			}
   			
			//valida contraseña
			else if (document.form1.Password.value != document.form1.ConfirmarPass.value ){ 
      			alert("La contrase\xf1a y confirmar contrase\xf1a no son iguales.") 
      			document.form1.Password.focus() 
      			return 0; 
   			}
   			
   			else {
				//el formulario se envia 
   			//	alert("Muchas gracias por enviar el formulario"); 
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

function eliminarDato(idtecnico){
	//donde se mostrar� el resultado de la eliminacion
	divResultado = document.getElementById('resultado');
	
	//usaremos un cuadro de confirmacion	
	var eliminar = confirm("\xbfEst\xe1 seguro que desea eliminar el dato?")
	if ( eliminar ) {
		//instanciamos el objetoAjax
		ajax=objetoAjax();
		//uso del medotod GET
		//indicamos el archivo que realizar� el proceso de eliminaci�n
		//junto con un valor que representa el id del empleado
		ajax.open("GET", "delete_tecnico.php?id_tecnico="+idtecnico);
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