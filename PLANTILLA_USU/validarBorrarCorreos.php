<?PHP
	print_r($_POST);
	session_start();
	#Llamado a funciones
	include "funciones.php";
	
	$conexion = conectar_db();

	$x = $_POST['casilla'];

		foreach ($x as $value){
			$query = "DELETE  FROM mensaje WHERE men_id = '$value'";
			$rs = pg_query($query);

			
		  
		}
	desconectar_db($conexion);	
	header("Location: borrarCorreos.php");

?>

