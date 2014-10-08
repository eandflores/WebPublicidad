<?PHP
	
	session_start();
	#Llamado a funciones
	include "funciones.php";
	
	$conexion = conectar_db(); // realizamos la coneccion a la base de datos 
	$rut_Cliente = $_SESSION['rut']; // obtenemos el rut del usuario en secion
	$opcion = $_POST['OPCION'];

	if($opcion == 'NO'){ // verificamos si la contraseña ingresada es correcta
		header("Location: renunciarPlan.php");
	}
	else{
		$query = "DELETE FROM contrato WHERE usu_rut = '$rut_Cliente'"; // eliminamos el contrato del usuario en sesion
		$rs = pg_query($query);
		$query = "UPDATE usuario SET usu_estado = 'f' WHERE usu_rut = '$rut_Cliente'";
		$rs = pg_query($query);
		alerta_javascript_direccionado("Renuncia realizada con exito",
										"../index-proyecto/index.php");
	}
	
	desconectar_db($conexion);
?>