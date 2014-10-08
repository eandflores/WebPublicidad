<?PHP
	session_start();
	
	include "../plantilla_usu/funciones.php";
	
	$conexion = conectar_db(); // nos conectamos a la base de datos
	$query = "SELECT * FROM Usuario"; // seleccionamos todos los usuario existentes en la base de datos
	$rs = pg_query($query);		
	
	
	while($fila = pg_fetch_array($rs)){ 
		if( ($_POST["username"] == $fila["usu_user"]) && ($_POST["password"] == $fila["usu_pasword"])){ 
			// Con este if nos aseguramos que el nombre de usuario y la contraseña sean las correctas
			// Si lo son 
			// Copiamos la informacion del usuario en las respectivas variables sesiones  
			$_SESSION['user'] = $fila["usu_user"]; 
			$_SESSION['contrasenia'] = $fila["usu_pasword"];
			$_SESSION['cargo'] = $fila["usu_tipo"];
			$_SESSION['rut'] = $fila["usu_rut"];
			$_SESSION['estado'] = $fila["usu_estado"];

			$estado = 1; // al encontral el usuario correcto se cambia la ventana a 1
			break; // y se hace el quiebre del while
		}
		else
		{
			$estado = 0; // la bandera queda en 0 si no lo encuentra 	
		}
	}
	
	$query = "SELECT plan_fechafin FROM Contrato WHERE usu_rut = '$_SESSION[rut]'"; // buscamos la fecha fin del usuario si posee contrato
	$rs = pg_query($query);
	$fila = pg_fetch_array($rs);
	

	$fecha_actual = fecha_actual(); // obtenemos la fecha actual
	$fecha_fin = date("d/m/Y",strtotime($fila["plan_fechafin"])); // pasamos la fecha fin obtenida al formato que queremos
	

	if( $estado == 1 && $_SESSION['estado'] == "t"){  // entra al if si encontro al usuario y si su estado en TRUE (vigente)
		// de lo contrario vuelve al index nuevamente
		if( $_SESSION['cargo'] == "ADMINISTRADOR"){	 // si el usuario es administrador, inmediatamente ingresa a su sistema correspondiente
			header("Location: ../PlantillaAdmin/Administrador.php");
		}
		else
		{	
			if (pg_num_rows($rs) == 0) { // si el usuario no tiene contrato vuelve al index sin ingresar al sistema
				header("Location: ../plantilla_usu/index.php");
			}
			else{ // si posee contrato vemos si esta dentro de la fecha en la que tiene vigencia el contrato para entrar
				if ($fecha_fin >= $fecha_actual) {
					header("Location: ../plantilla_usu/indexUsuario.php");
				}		
				else{
					header("Location: index.php");
				}
			}
			
		}		
	}
	else 
	{
		header("Location: index.php");
		
	}
	desconectar_db($conexion);
?>	