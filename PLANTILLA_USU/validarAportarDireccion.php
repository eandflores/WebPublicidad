<?PHP
	
	session_start();
	#Llamado a funciones
	include "funciones.php";
	
	$conexion = conectar_db(); // realizamos la coneccion a la base de datos 

	$correo = $_POST['correo']; // optenemos el correo electronico aportado
	$nombre = $_POST['nombre']; // optenemos el nombre
	$apellido = $_POST['apellido']; // optenemos el apellido
	$direccion = $_POST['direccion']; // optenemos la direccion
	$telefono = $_POST['telefono']; // optenemos el telefono
	$rut_Cliente = $_SESSION['rut']; // optenemos el rut del usuario en sesión
	$bandera = 0;
	
	if (comprobar_email($correo) == 0) {
		alerta_javascript_direccionado("Correo erroneo",
									"aportardireccion.php");
	}

	$query = "SELECT * FROM receptor WHERE rec_correo = '$correo'"; // seleccionamos y vemos si esta el correo ya ingresado 
	$rs = pg_query($query);

	if (pg_num_rows($rs) == 0) { // si no lo esta lo agregamos y lo agregamos a aporta junto con el rut de quien lo aporto
		$query = "INSERT INTO receptor VALUES ('$correo','$nombre','$apellido','$direccion','$telefono');";
		$query1 = "INSERT INTO aporta  VALUES ('$rut_Cliente','$correo','".fecha_actual()."');";
		$rs = pg_query($query);
		$rs = pg_query($query1);
	}
	else{ // lo esta, solo lo agregamos a aporta junto con el rut de quien lo aporto
		$query1 = "INSERT INTO aporta  VALUES ('$rut_Cliente','$correo','".fecha_actual()."');";
		$rs = pg_query($query1);
	}
         
	alerta_javascript_direccionado("Aporte realizado con exito",
									"aportardireccion.php");

	
	desconectar_db($conexion);
?>