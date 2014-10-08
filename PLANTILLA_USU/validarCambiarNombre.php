<?PHP
	session_start();
	#Llamado a funciones
	include "funciones.php";
	
	$conexion = conectar_db(); // realizamos la coneccion a la base de datos 

	$user = $_POST["usernuevo"]; // obtenemos el nombre de usuario nuevo
	$contrasenia = $_POST["contrasenia"]; // optenemos la contraseña ingresada
	$contraseniaSesion = $_SESSION['contrasenia']; // obtenemos la contraseña del usuario de la sesion

	$query = "SELECT * FROM usuario WHERE '$user' = usu_user"; // seleccionamos y vemos si el nombre de usuario existe en la base de datos
    $rs = pg_query($query);
    if(pg_num_rows($rs) == 0){ // si no exite procesemos a actualizar el nombre de usuario
		if($contrasenia == $contraseniaSesion){ // antes de esto verificamos si la contraseña ingresada es correcta
			$query = "UPDATE usuario SET usu_user = '$user' WHERE usu_pasword = '$contrasenia'"; // actualizamos
			$rs = pg_query($query);
			desconectar_db($conexion);	// nos desconectamos de la base de datos
			$_SESSION['user'] = $user; // y actualizamos el nombre de usuario del usuario actualmente en sesion
			alerta_javascript_direccionado("Nombre de usuario cambiado",
											"cambiarNombre.php");
		}
		else{
			desconectar_db($conexion);	
			alerta_javascript_direccionado("Contraseña incorrecta",
											"cambiarNombre.php");
		}
	}
	else{
		alerta_javascript_direccionado("Nombre de usuario ya existe",
										"cambiarNombre.php");
	}

?>