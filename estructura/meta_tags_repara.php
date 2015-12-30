<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES">
<head>
	<title><?php echo $titulo; ?></title>
	<!--<meta http-equiv="content-type" content="text/html; charset=utf-8"/> -->
	<meta name="title" content="Carrito de compra en PHP y MySql con forma de pago PayPal"> 
	<meta name="description" content="Guía paso a paso del BLOG COLORATE para crear un carrito de compra en Php y Mysql con forma de pago Paypal"> 
	<meta name="keywords" content="carrito de compra en php, sesiones en php, tienda virtual, colorate, blog colorate, colordeu, colordeu.es, tienda, diseño web, tutorial, tutoriales"> 
	
	<link rel="stylesheet" href="css/main.css"> 

<script src="valida.js" type="text/javascript"></script>
<script src="ajax.js"></script>

<script>

function myFunction(){

var n=document.getElementById('bus').value;

if(n==''){

 document.getElementById("myDiv").innerHTML="";
 document.getElementById("myDiv").style.border="0px";

 document.getElementById("pers").innerHTML="";

 return;
}

loadDoc("q="+n,"buscar_sugerencia.php",function(){

  if (xmlhttp.readyState==4 && xmlhttp.status==200){

    document.getElementById("myDiv").innerHTML=xmlhttp.responseText;
    document.getElementById("myDiv").style.border="1px solid #A5ACB2";

    }else{ document.getElementById("myDiv").innerHTML='<img src="img/load.gif" width="50" height="50" />'; }

  });
}

//-------------------------------

function myFunction2(cod){

document.getElementById("myDiv").innerHTML="";
document.getElementById("myDiv").style.border="0px";
document.getElementById("tabla").innerHTML="";
document.getElementById("tabla").style.border="0px";

loadDoc("vcod="+cod,"buscar_cliente.php",function(){

  if (xmlhttp.readyState==4 && xmlhttp.status==200){

    document.getElementById("pers").innerHTML=xmlhttp.responseText;
    
    
    }else{ document.getElementById("pers").innerHTML='<img src="img/load.gif" width="50" height="50" />'; }

  });
}
</script>
<script>
function valida_envia(){ 
			//valida el nombre
			if ( document.form2.txtNombre.value.trim()==""){ 
      			alert("Tiene que escribir el nombre del equipo") 
      			document.form2.txtNombre.focus() 
      			return 0; 
   			}
			
			//valida la marca
			else if (document.form2.txtMarca.value.trim()==""){ 
      			alert("Tiene que escribir la marca del equipo") 
      			document.form2.txtMarca.focus() 
      			return 0; 
			}
			
			//valida el modelo
			else if (document.form2.txtModelo.value.trim()==""){ 
      			alert("Tiene que escribir el modelo") 
      			document.form2.txtModelo.focus() 
      			return 0; 
			}
			
			//valida la serie
			else if (document.form2.txtSerie.value.trim()==""){ 
      			alert("Tiene que escribir el número de serie") 
      			document.form2.txtSerie.focus() 
      			return 0; 
			}
			
			//valida el detalle
			else if (document.form2.txtDetalle.value.trim()==""){ 
      			alert("Tiene que escribir el detalle del danio") 
      			document.form2.txtDetalle.focus() 
      			return 0; 
			}
   	
   			else {
				//el formulario se envia 
   				alert("Muchas gracias por enviar el formulario"); 
   				document.form2.submit(); 
			}
		}

</script>
</head>
<body>