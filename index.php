 <!DOCTYPE html>
 <?php session_start();?>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
    <!-- Basic Page Needs
    ================================================== -->
        <meta charset="utf-8">
        <title>Cats-Evolutions</title>
        <meta name="description" content="">
        <!-- Mobile Specific Metas
    ================================================== -->
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->
         <!-- CSS
         ================================================== -->
        <!-- Bootstrap -->
        <link rel="stylesheet" href="css/bootstrap.min.css"/>
        <!-- FontAwesome -->
        <link rel="stylesheet" href="css/font-awesome.min.css"/>
        <!-- Animation -->
        <link rel="stylesheet" href="css/animate.css" />
        <!-- Owl Carousel -->
        <link rel="stylesheet" href="css/owl.carousel.css"/>
        <link rel="stylesheet" href="css/owl.theme.css"/>
        <!-- Pretty Photo -->
        <link rel="stylesheet" href="css/prettyPhoto.css"/>
        <!-- Main color style -->
        <link rel="stylesheet" href="css/red.css"/>
        <!-- Template styles-->
        <link rel="stylesheet" href="css/custom.css" />
        <!-- Responsive -->
        <link rel="stylesheet" href="css/responsive.css" />
        <link rel="stylesheet" href="css/jquery.fancybox.css?v=2.1.5" type="text/css" media="screen" />
	
		<script type="text/javascript" src="http://maps.google.com/maps/api/js?sensor=false"></script>
        <link href='http://fonts.googleapis.com/css?family=Lato:400,300' rel='stylesheet' type='text/css'>
        <link href='http://fonts.googleapis.com/css?family=Raleway:400,300,500' rel='stylesheet' type='text/css'>
    </head>

 <body data-spy="scroll" data-target=".navbar-fixed-top">
        <!--[if lt IE 7]>
            <p class="browsehappy">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
        <![endif]-->

    <header id="section_header" class="navbar-fixed-top main-nav" role="banner">
    	<div class="container">
    		<!-- <div class="row"> -->
                 <div class="navbar-header ">
                     <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">
                            <img src="images/logo.png" alt="">
                        </a>
                 </div><!--Navbar header End-->
                 	<nav class="collapse navbar-collapse navigation" id="bs-example-navbar-collapse-1" role="navigation">
                        <ul class="nav navbar-nav navbar-right ">
                           	<li class="active"> <a href="#slider_part" class="page-scroll">Inicio </a></li>
                            <li><a href="#service"  class="page-scroll">Servicios</a> </li>
                            <li><a href="#portfolio" class="page-scroll" >Multimedia</a> </li>
                            <li><a href="#contact" class="page-scroll">Cont&aacute;ctanos</a> </li>
                            <li><a href="sistema.php" target="_blank" class="page-scroll">Acceder Sistema</a> </li>
                        </ul>
                     </nav>
                </div><!-- /.container-fluid -->
</header>
 <!-- Slider start -->
    <section id="slider_part">
         <div class="carousel slide" id="carousel-example-generic" data-ride="carousel">
            <!-- Indicators -->
         	 <ol class="carousel-indicators text-center">
                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
             </ol>

           	<div class="carousel-inner">
           	 	<div class="item active">
           	 		<div class="overlay-slide">
           	 			<img src="images/banner/imagen1.jpg" alt="" class="img-responsive">
           	 		</div>
           	 		<div class="carousel-caption">
               	 		<div class="col-md-12 col-xs-12 text-center">                     
               	 			<h3 class="animated2"><b>Asesoría Técnica</b></h3>
               	 			<div class="line"></div>               	 			
               	 		</div>
           	 		</div>
           	 	</div>
                <div class="item">
                    <div class="overlay-slide">
                        <img src="images/banner/imagen2.png" alt="" class="img-responsive">
           	 		</div>
           	 		<div class="carousel-caption">
               	 		<div class="col-md-12 col-xs-12 text-center">                    
               	 			<h3 class="animated3"><b>Material Electrónico</b></h3>
               	 			<div class="line"></div>               	 			
               	 		</div>
           	 		</div>
           	 	</div>
           	 	<div class="item">
                    <div class="overlay-slide">
                        <img src="images/banner/imagen3.jpg" alt="" class="img-responsive">
           	 		</div>
           	 		<div class="carousel-caption">
               	 		<div class="col-md-12 col-xs-12 text-center">
                   
               	 			<h3 class="animated3"><b>Ciencia y Tecnología</b></h3>
               	 			<div class="line"></div>
               	 			
               	 		</div>
           	 		</div>
           	 	</div>

           	 </div> 	 <!-- End Carousel Inner -->

            <!-- Controls -->
            <div class="slides-control ">
                <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                	<span><i class="fa fa-angle-left"></i></span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                	<span><i class="fa fa-angle-right"></i></span>
                </a>
            </div>
        </div>
  	</section>
    <!--/ Slider end -->

<!-- Service Area start -->

    <section id="service">
        <div class="container">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <div class="feature_header text-center">
                            <h3 class="feature_title">Nuestros <b>Servicios</b></h3>
                            <h4 class="feature_sub"><p style="text-align: justify;">La  Empresa CATS Evolution nació  el 21 de Abril del año 2004, orientado en un principio al Asesoramiento, Capacitación e Investigación Tecnológica, de ahí proviene el significado de cada una de las letras.
                            Se creó esta micro empresa previo a un estudio y análisis de  la problemática de aquel entonces en cuestión de asesoramientos. Las Áreas que se manejaban en aquel entonces eran las de Informática, Electricidad, Electrónica, dando como resultado la elaboración de proyectos los mismos que han sido expuestos en ferias locales y nacionales dando como resultado nominaciones de mucho agrado para la empresa y personas que han sido asesoradas.<br>
                            <br>En la actualidad se cuenta con el manejo de proyección y de asesoramiento, así como también de ejecución de las siguientes áreas: Electrónica, Informática, Proyectos combinados de Electrónica e Informática, Domótica, Robótica, Electricidad, Telefonía, Pre Producción, Producción, Post producción de video, Diseño, Análisis y Elaboración de Proyectos en estas áreas, cuyos trabajos realizados tienen como aval respectivo las condecoraciones respectivas en los festivales de Ciencia y Tecnología.
                            <br><br>
                            En caso de Producción de video se ha obtenido el reconocimiento a nivel local, nacional e internacional por parte  de  las alcabalas de Madrid y de Zaragoza en el proyecto de producción organizado en Riobamba en el año 2009, cuyo video es el porta estandarte del país en aquella organización, así como también la obtención del primer y segundo puesto en el concurso organizado por la Casa de la Cultura Juvenil de Chimborazo, en la sección de nano metrajes, esto en el año 2010.</p></h4>
                            <div class="divider"></div>
                        </div>
                    </div>  <!-- Col-md-12 End -->
                </div>
                <div class="row">
                    <div class="main_feature text-center">
                        <div class="col-md-3 col-xs-12 col-sm-6">
                                <div class="feature_content">
                                    <i class="fa fa-lightbulb-o"></i>
                                    <h5>Asesoramiento</h5>                      
                                   
                                </div>
                            </div>
                        <div class="col-md-3 col-xs-12 col-sm-6">
                                <div class="feature_content">
                                    <i class="fa fa-pencil"></i>
                                    <h5>Proyectos</h5>
                                    
                                </div>
                        </div> <!-- Col-md-4 Single_feature End -->
                        <div class="col-md-3 col-xs-12 col-sm-6">
                                <div class="feature_content">
                                    <i class="fa fa-cog"></i>
                                    <h5>Tecnología</h5>
                                    
                                </div>
                        </div> <!-- Col-md-4 Single_feature End -->
                        <div class="col-md-3 col-xs-12 col-sm-6">
                                <div class="feature_content">
                                    <i class="fa fa-desktop"></i>
                                    <h5>Informática</h5>
                                    
                                </div>
                        </div> <!-- Col-md-4 Single_feature End -->
                        <!-- <button class="btn btn-main"> Read More</button> -->
                    </div>
            </div>  <!-- Row End -->
        </div>  <!-- Container End -->
    </section>
<!-- Service Area End -->
<!-- About details start -->
<!-- Portfolio works Start -->

    <section id="portfolio">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-sm-12 col-xs-12">
                    <div class="feature_header text-center">
                        <h3 class="feature_title"><b>Multimedia</b></h3>                        
                        <div class="divider"></div>
                    </div>
                </div>  <!-- Col-md-12 End -->
            </div>
            <div class="col-md-12 col-sm-12 col-xs-12">
            	<div class="embed-responsive embed-responsive-16by9" style="margin: 0 auto; width: 600px;">
  <iframe class="embed-responsive-item" src="https://www.youtube.com/embed/40DoaYPtsMo" style="width: 600px; height: 400px;"></iframe>
</div>
            </div>
        </div>


   
</section>  <!-- Portfolio Section End -->
<!-- Conatct Area Start-->

<section id="contact">
    <div class="container">
        <div class="row">
  			<div class="col-md-12 col-sm-12 col-xs-12">
                <div class="feature_header text-center">
                    <h3 class="feature_title">Mantengase en <b>Contacto</b></h3>
                    <h4 class="feature_sub">Para solicitar información, rellene el siguiente formulario. Si lo prefiere, también puede ponerse en contacto con nosotros a través del teléfono o enviándonos un <b>e-mail</b>. </h4>
                    <div class="divider"></div>
                </div>
  			</div>
        </div>
        <?php if (!empty($_SESSION['message'])):?>
	        <?php if (!empty($_SESSION['valor'])):?>        	
	        <div class="alert alert-success square fade in alert-dismissable">			  
			<?php else:?>
			<div class="alert alert-danger square fade in alert-dismissable">
			<?php endif;?>
				<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
				<strong><?php echo $_SESSION['message'];?></strong>			
			</div>
			<?php session_destroy();?>
		<?php endif;?>	
        <form action="enviar_email.php"  method="post" id="frmContacto" name="frmContacto">
        <div class="row">
             <div class="contact_full">
                <div class="col-md-6 left">
                    <div class="left_contact">
                            <div class="form-group">
                            	<div class="form-level">
                            		<input type="text" class="form-control" name="name" id="name" placeholder="Nombre">
                                	<span class="form-icon fa fa-user"></span>
                                </div>
                            </div>
                            <div class="form-group">
                            	<div class="form-level">
                               		<input name="email" placeholder="Email" id="mail" class="form-control" value="" type="email">
                                	<span class="form-icon fa fa-envelope-o"></span>
                                </div>	
                            </div>
                            <div class="form-group">
                            	<div class="form-level">
                            		<input name="phone" placeholder="Teléfono" id="phone" class="form-control" value="" type="text" maxlength="10">                                	
                                	<span class="form-icon fa fa-phone"></span>
                                </div>	
                            </div>                        
                    </div>
                </div>

                <div class="col-md-6 right">
                    <div class="form-group">
                    	<div class="form-level">
                    		<textarea name="message" id="message"  rows="5" class="form-control" placeholder="Mensaje"></textarea>
                        	<span class="form-icon fa fa-pencil"></span>
                        </div>	
                    </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" class="btn btn-main featured">Enviar Ahora</button>
                </div>
            </div>
        </div>
        </form>
    </div>
</section>

<!-- Footer Area Start -->

<section id="footer">
    <div class="footer_top">
        <div class="container">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <h3 class="menu_head">Menu Principal</h3>
                    <div class="footer_menu">
                        <ul>
                            <li><a href="#about">Inicio</a></li>
                            <li><a href="#service">Servicios</a></li>
                            <li><a href="#portfolio">Multimedia</a></li>
                            <li><a href="#contact">Contactos</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-3 col-sm-6 col-xs-12">
                    <h3 class="menu_head">Contactanos</h3>
                    <div class="footer_menu_contact">
                        <ul>
                            <li> <i class="fa fa-home"></i>
                                <span> Riobamba, Ecuador </span></li>
                            <li><i class="fa fa-globe"></i>
                                <span> +593 32 637 689</span></li>
                            <li><i class="fa fa-phone"></i>
                                <span> info@cats-evolutions.com</span></li>
                            <li><i class="fa fa-map-marker"></i>
                            <span> www.cats-evolutios.com</span></li>
                        </ul>
                    </div>
                </div>

               

            </div>
        </div>
    </div>

    <div class="footer_b">
        <div class="container">
            <div class="row">
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="footer_bottom">
                        <p class="text-block"> &copy; Copyright derechos reservados <span>Cats-evolutions </span></p>
                    </div>
                </div>
                <div class="col-md-6 col-sm-6 col-xs-12">
                    <div class="footer_mid pull-right">
                        <ul class="social-contact list-inline">
                            <li> <a href="http://www.facebook.com" target="_blank"><i class="fa fa-facebook"></i></a></li>
                            <li> <a href="https://twitter.com" target="_blank"><i class="fa fa-twitter"></i></a></li>
                            <li> <a href="https://plus.google.com" target="_blank"><i class="fa fa-google-plus"></i> </a></li>
                            <li><a href="https://es.linkedin.com" target="_blank"> <i class="fa fa-linkedin"></i></a></li>
                        </ul>
                    </div>
                </div>

            </div>
        </div>
    </div>
</section>
<!-- Footer Area End -->

<!-- Back To Top Button -->
    <div id="back-top">
        <a href="#slider_part" class="scroll" data-scroll>
            <button class="btn btn-primary" title="Back to Top"><i class="fa fa-angle-up"></i></button>
        </a>
    </div>
    <!-- End Back To Top Button -->



<!-- Javascript Files
    ================================================== -->
    <!-- initialize jQuery Library -->

		<!-- initialize jQuery Library -->
        <!-- Main jquery -->
		    <script type="text/javascript" src="js/jquery.js"></script>
        <!-- Bootstrap jQuery -->
         <script src="js/bootstrap.min.js"></script>
        <!-- Owl Carousel -->
        <script src="js/owl.carousel.min.js"></script>
        <!-- Isotope -->
        <script src="js/jquery.isotope.js"></script>
        <!-- Pretty Photo -->
		    <script type="text/javascript" src="js/jquery.prettyPhoto.js"></script>
        <!-- SmoothScroll -->
        <script type="text/javascript" src="js/smooth-scroll.js"></script>
        <!-- Image Fancybox -->
        <script type="text/javascript" src="js/jquery.fancybox.pack.js?v=2.1.5"></script>
        <!-- Counter  -->
        <script type="text/javascript" src="js/jquery.counterup.min.js"></script>
        <!-- waypoints -->
        <script type="text/javascript" src="js/waypoints.min.js"></script>
        <!-- Bx slider -->
        <script type="text/javascript" src="js/jquery.bxslider.min.js"></script>
        <!-- Scroll to top -->
        <script type="text/javascript" src="js/jquery.scrollTo.js"></script>
        <!-- Easing js -->
        <script type="text/javascript" src="js/jquery.easing.1.3.js"></script>
   		 <!-- PrettyPhoto -->
        <script src="js/jquery.singlePageNav.js"></script>
      	<!-- Wow Animation -->
        <script type="js/javascript" src="js/wow.min.js"></script>
        
			 <!-- Custom js -->
        <script src="js/custom.js"></script>
        
        <script type="text/javascript" src="js/bootstrapValidator.min.js"></script>
        <link rel="stylesheet" href="css/bootstrapValidator.min.css"></link>
        <script type="text/javascript">
    jQuery(document).ready(function() {
		jQuery('#frmContacto').bootstrapValidator({
		    	message: 'This value is not valid',
				feedbackIcons: {
					valid: 'glyphicon glyphicon-ok',
					invalid: 'glyphicon glyphicon-remove',
					validating: 'glyphicon glyphicon-refresh'						
				},
				fields: {
					name: {
						validators: {
							notEmpty: {
								message: 'El nombre no puede ser vacío.'
							},					
							regexp: {
								regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ0-9-_ \.]+$/,
								message: 'Ingrese un nombre válido.'
							}
						}
					},
					email: {
						validators: {
							notEmpty: {
								message: 'El email no puede ser vacío.'
							},					
							emailAddress: {
		                        message: 'El email no es válido.'
		                    }

						}
					},
					phone: {
						validators: {
							notEmpty: {
								message: 'El número de teléfono no puede ser vacío.'							
						},
						regexp: {
							regexp: /^[0-9]+$/,							
							message: 'Ingrese un número de teléfono no es válido.'							
						},
						stringLength:{
							min:9,
							message: 'Ingrese un número de telefono con mínimo 9 dígitos.'
							}
						}
					},	

					message: {
						validators: {
							notEmpty: {
								message: 'El mensaje no puede ser vacío.'							
						},
						regexp: {
							regexp: /^[a-zA-ZáéíóúÁÉÍÓÚ0-9_ ,-\.]+$/,
							message: 'Ingrese mensaje válido.'
						}
						}
					},
			}
		});
});		
</script>        	     
</body>
</html>