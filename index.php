<!DOCTYPE html>
<html lang="es">
  <head>
    <meta charset="utf-8">    
    <meta name="author" content="Peterson F.">

    <title>Sistema Informático de Procesos Eclesiásticos</title>

    <!-- Bootstrap core CSS -->
    <link href="../css/bootstrap.css" rel="stylesheet">
    <link rel="stylesheet" type="text/css" href="js/bootstrap-responsive.min.css">
    <link rel="stylesheet" type="text/css" href="js/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="js/css_personalizado.css">
    <!-- Custom styles for this template -->
    <link href="css/jumbotron.css" rel="stylesheet">

    <link rel="stylesheet" href="themes/default/default.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/light/light.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/dark/dark.css" type="text/css" media="screen" />
    <link rel="stylesheet" href="themes/bar/bar.css" type="text/css" media="screen" />
	<link rel="stylesheet" href="css/nivo-slider.css" type="text/css" media="screen" />
    <script src="js/bootstrap.min.js"></script> 
	<script src="js/jquery.min.js"></script>
    <style type="text/css">
<!--

body {
	background-color: #F4F4F4;
}
.slider-wrapper{
	width: 450px;
	margin: 50px auto;
}

#caja_izq {width: 890px;
margin: 10px auto;
color:#fff;
background-color: #4c9ab1;
overflow: auto;
}
#caja_der {width: 270px;
float: right;
background-color: #63CA69;
border-left: solid 30px #fff;
}
.columna_izquierda {width: 110px;
float: left;
padding: 10px;
position: relative;
margin-left: -610px;
}
.columna_derecha {width: 220px;
float: left;
padding: 20px;
}
-->
    </style>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"></head>

  <body>

  <div class="container">
  <h1 class="formuh1 Estilo1">Sistema Informático de Procesos Eclesiásticos</h1>
  <form id="form1" class="well col-lg-12" action="operador.php" method="post" name="form1">
  
  <div id="caja_izq">
     <div id="caja_der">
        <div class="columna_izquierda">       
		   <div class="slider-wrapper theme-light" style="overflow:auto;width:530px;height:auto;">
           <div id="slider" class="nivoSlider">
			  <img src="img/img1.jpg" title="#caption1" width="40%" height="40%" />
			  <img src="img/img2.jpg" title="#caption2" width="40%" height="40%" />
			  <img src="img/img3.jpg" title="#caption3" width="40%" height="40%" />
			  <img src="img/img5.jpg" title="#caption4" width="40%" height="40%" />		
		   </div>
		   <div id="caption1" style="display: none;">
           <h3>Iglesia "San José" del cantón Tosagua</h3>
           <p>Parroquia Bachillero</p>            
			<ul>
                <li>Dirección : Calle Santiago Vera</li>
                <li>Teléfono: 2333-333</li>
            </ul>
            </div>
		    <div id="caption2" style="display: none;">
            <h3>Iglesia "San José" del cantón Tosagua</h3>
            <p>Bautizos</p>
            
            </div>
		    <div id="caption3" style="display: none;">
            <h3>Iglesia "San José" del cantón Tosagua</h3>
            <p>Matrimonios</p>
            
            </div>
		    <div id="caption4" style="display: none;">
            <h3>Iglesia "San José" del cantón Tosagua</h3>
            <p>Primera Comunión</p>
            </div>
          </div>
        </div>
    
	    <div class="columna_derecha">  
           <div class="row">
              <div class="col-lg-6">
              <label></label><p align="right"><input name="usuario" type="text" class="form-control" id="usuario" size="220" placeholder="Por favor ingrese su usuario."/></p> 
              <p align="right"><input id="pass" class="form-control" type="password" name="pass" placeholder="Por favor ingrese su password." size="120"/></p>
              <button class="btn btn-danger pull-right" type="submit">Iniciar Sesión</button>
              </div>
           </div> 
		   
		   <p align="center">&nbsp;</p>
		   <p align="center">&nbsp;</p>
		   <p align="center" style="font-size:16px; font-weight:bold"><strong>Sistema Desarrollado Por:</strong></p>
		   <br><br>
		   <p align="center"><strong>Cedeño Varela Monica</strong></p>
		   <p align="center"><strong>Garcia Coveña Hector</strong></p>
		   <p align="center"><strong>Morales Velasquez Darwin</strong></p>
		   <p align="center"><strong>Triviño Lino Rosa</strong></p>
	    </div>
      </div>
	  </div>
	  </form>     
  </div>

    <!-- javascript para confirmar datos del formulario.
    ================================================== -->
    <!-- La página carga más rapido si estan situados al final del documento. -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>

    <script src="js/jquery.min.js" type="text/javascript"></script>
    <script src="js/jquery.nivo.slider.js" type="text/javascript"></script>
    <script type="text/javascript">
    $(window).load(function(){
        $('#slider').nivoSlider({
            effect: 'fade',
            slices: 15,
            boxCols: 8,
            boxRows: 4,
            animSpeed: 500,
            pauseTime: 3000,
            startSlide: 0,
            directionNav: true,
            controlNav: true,
            controlNavThumbs: false,
            pauseOnHover: true,
            manualAdvance: false,
            prevText: 'Prev',
            nextText: 'Next',
            randomStart: false,
        });
    });
    </script>
</body>
</html>
