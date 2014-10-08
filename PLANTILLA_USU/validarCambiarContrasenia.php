<?PHP
	
	session_start();
	#Llamado a funciones
	include "funciones.php";
	
	$conexion = conectar_db(); // realizamos la coneccion a la base de datos 

	$contraseniaAct = $_POST['contraseniaAct']; // obtenemos la contraseña actual del usuario
	$contraseniaNew = $_POST['contraseniaNew']; // obtenemos la cotraseña a la que decea cambiar
	$contraseniaNewRep = $_POST['contraseniaNewRep']; // obtenemos la repeticion de la contraseña a la que decea cambiar
	$rut_Cliente = $_SESSION['rut'];
	$bandera = 0;
	$query = "SELECT * FROM usuario";
	$rs = pg_query($query);	



	if($contraseniaAct != $_SESSION['contrasenia']){ // verificamos que la contraseña ingresada sea la del usuario por razones de seguridad
		alerta_javascript_direccionado("Contraseña ingresada incorrecta",
										"cambiarContrasenia.php");
	}
	else{
		if ($contraseniaNew == $contraseniaNewRep) { // verificamos que la contraseña nueva y su repeticion sean identicas
			$query = "UPDATE usuario SET usu_pasword = '$contraseniaNew' WHERE usu_rut = '$rut_Cliente'"; // y actualizamos su contraseña
			$rs = pg_query($query);
			$_SESSION['contrasenia'] = $contraseniaNew; // y actualizamos la contraseña de la sesion actual
			alerta_javascript_direccionado("Contraseña cambiada con exito",
											"cambiarContrasenia.php");
		}
		else{
			alerta_javascript_direccionado("Contraseña no coinciden",
											"cambiarContrasenia.php");
		}
	}
	
	desconectar_db($conexion);
?>