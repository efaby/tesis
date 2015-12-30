<html xmlns="http://www.w3.org/1999/xhtml" dir="ltr" lang="es-ES">
<head>
	<title><?php echo $titulo; ?></title>
	<!--<meta http-equiv="content-type" content="text/html; charset=utf-8"/> -->
	<meta name="title" content="Carrito de compra en PHP y MySql con forma de pago PayPal"> 
	<meta name="description" content="Guía paso a paso del BLOG COLORATE para crear un carrito de compra en Php y Mysql con forma de pago Paypal"> 
	<meta name="keywords" content="carrito de compra en php, sesiones en php, tienda virtual, colorate, blog colorate, colordeu, colordeu.es, tienda, diseño web, tutorial, tutoriales"> 
	
	<link rel="stylesheet" href="css/main.css"> 
    
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.9.1/themes/base/jquery-ui.css" />
    <script src="http://code.jquery.com/jquery-1.8.2.js"></script>
    <script src="/resources/demos/external/jquery.bgiframe-2.1.2.js"></script>
    <script src="http://code.jquery.com/ui/1.9.1/jquery-ui.js"></script>
    <link rel="stylesheet" href="http://www.proyectosbds.com/html/css/layout.css" />
    <script>
    function abrir_dialogo() {
      $( "#dialogo" ).dialogo({
          modal: true,
          buttons: {
                "Aceptar": function() {
                    $( this ).dialogo( "close" );
                }
            }
      });
    };
    </script>
</head>
<body>