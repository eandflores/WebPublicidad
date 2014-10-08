<!DOCTYPE html>
<?PHP
	session_start();
	if( isset($_SESSION['user'])){ // if que destruye la secion al llegar a esta parte del sistema (el login)
		session_unset();
		session_destroy();
		header("Location: index.php");
	}
	include "../plantilla_usu/funciones.php";

?>
<html>
	<head>
		<title>SPAM SERVICE :: CLOUDER</title>
		<link rel="stylesheet" type="text/css" href="css/bootstrap.css">
		<link rel="shortcut icon" href="imagenes/logo.jpg">
		<meta charset="utf-8">
		<script type="text/javascript" src='jquery.js'></script>
		<style type="text/css"> /*Esilos utilizados*/
			body{
				padding-top: 40px;
				width: 100%;
			}

			form{
				margin-left: 0!important;
			}
			.hero-unit{
				border:none;
				box-shadow: 0 0 0 0 ;
			}
			h1,h2,h3,h4,h5,h6{
				margin:0;
			}
			.span4{
				height: 100%;
			}
			.special{
				color: #E86537;
			}

		</style>
	</head>
	<body>
		<div class='container-fluid'>
			<div class='row-fluid'>
				<div class='span8 well' >
					<div class='hero-unit pull-left'>
						<h1>Sistema</h1>
						<h2>de <span class='special'>Publicidad</span> masiva</h2>
					</div>
					<img class='pull-right' src='img/email.png' alt='imagen correo'>
				</div>
				<div class='span4'>
					<form class='form-horizontal pull-left' method='post' action="validarLogin.php">
						<div class='control-group'>
							<label for='username' class='control-label'>Usuario:</label>
							<div class='controls'> <!--Se ingresa el nombre de usuario-->
								<input type='text' name='username' id='username' required='requiered' placeholder="Usuario">
							</div>
						</div>
						<div class='control-group'>
							<label for='password' class='control-label'>Contraseña:</label>
							<div class='controls'> <!--Se ingresa la contraseña del usuario que quiere iniciar sesion-->
								<input type='password' name='password' id='password' required='required' placeholder='Contraseña'>
							</div>
						</div>

						<div class='control-group'>
							<div class='controls'>
								 <label class="checkbox"> <!--Se da la opcion de recordarse-->
										<input type="checkbox"> Recordarme
								 </label>
							</div>
						</div>
						<div class='form-actions'> <!--Opciones escogidas por el usuario-->
							<button type='submit' class='btn btn-primary' value="Iniciar">Iniciar Sesión</button> 
							<button type='reset' class='btn btn-warning' value="Cancelar">Cancelar</button>
						</div>
					</form>
					<address class='pull-right'>
						<strong>Clouder LTDA.</strong><br> <!--Contacto empresa programadora (nosotros)-->
						Avda. Pedro de Valdivia 911 <br>
						Concepción, Chile <br>


					</address>
				</div>
			</div>
		</div>
	</body>
</html>