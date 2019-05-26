<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
	<script type="text/javascript" src="https://youneed.com.ec/wp-includes/js/jquery/jquery.js?ver=1.12.4"></script>
    <link rel="stylesheet" href="https://youneed.com.ec/wp-content/themes/Avada-Child-Theme/style.css">
	<style>
	    @import url('https://fonts.googleapis.com/css?family=Montserrat:400,600,800');
        @import url('https://fonts.googleapis.com/css?family=Poppins:400,700,800,900');
        @import url('https://fonts.googleapis.com/css?family=Open+Sans:400,700,800');
        body { font-family: "Open Sans", Arial, Helvetica, sans-serif; margin: 0px; }
		.fusion-standard-logo {
			margin: 0 auto;
			display: block;
			transform: translateX(-7px);
		}
	    @media (min-width:768px){
			.apilogin-wrapper{
				/*background: rgba(75,119,153,1);
				background: -moz-radial-gradient(center, ellipse cover, rgba(75,119,153,1) 0%, rgba(4,40,68,1) 100%);
				background: -webkit-gradient(radial, center center, 0px, center center, 100%, color-stop(0%, rgba(75,119,153,1)), color-stop(100%, rgba(4,40,68,1)));
				background: -webkit-radial-gradient(center, ellipse cover, rgba(75,119,153,1) 0%, rgba(4,40,68,1) 100%);
				background: -o-radial-gradient(center, ellipse cover, rgba(75,119,153,1) 0%, rgba(4,40,68,1) 100%);
				background: -ms-radial-gradient(center, ellipse cover, rgba(75,119,153,1) 0%, rgba(4,40,68,1) 100%);
				background: radial-gradient(ellipse at center, rgba(75,119,153,1) 0%, rgba(4,40,68,1) 100%);
				filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#4b7799', endColorstr='#042844', GradientType=1 );*/	
			}
		}
		@media (max-width:768px){
			.apilogin-wrapper{
				background: rgba(75,119,153,1);
			}
		}
	</style>
    <script type="text/javascript" src="<?php echo $app::APP_BASEURL . 'js/main.js'; ?>"></script>
</head>
    <body>
        <!-- LOGIN -->
        <div class="apilogin-wrapper yn-login" id="yn-login">
          <form class="login">
            <p class="title"><img src="https://youneed.com.ec/wp-content/uploads/2019/03/logo2.png" srcset="https://youneed.com.ec/wp-content/uploads/2019/03/logo2.png 1x" width="160" height="auto" alt="You Need Logo" data-retina_logo_url="" class="img-responsive center-block fusion-standard-logo"></p>
            <span class="error-msg" id="login-error"></span>
            <input type="text" placeholder="Email" name="api-username" id="api-username" autofocus/>
            <i class="fa fa-user"></i>
            <input type="password" name="api-password" id="api-password" placeholder="Contraseña" />
            <i class="fa fa-key"></i>
            <center><p>¿No tienes cuenta?</p></center>
            <center><a href="https://youneed.com.ec/registro_escoger/">Registrate</a></center>
            <center><a href="#">¿Olvidaste tu contraseña?</a></center>
            <button>
              <i class="spinner"></i>
              <span class="state">Ingresar</span>
            </button>
          </form>
          <footer></footer>
          </p>
        </div>
        <!-- END LOGIN -->
    </body>
</html>