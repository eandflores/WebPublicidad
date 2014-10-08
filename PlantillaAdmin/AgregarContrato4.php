<?PHP
	#Llamado a funciones
	include("conexion.php");
	include("Funciones.php");
	
	$conexion = Conectar();

	$plan_id = $_POST['PlanID'];
	$usu_rut = $_POST['RUT'];
	$plan_fechaini = $_POST['FechaIni'];
	$plan_fechafin = $_POST['FechaFin'];
	$bandera = 0;

	$query = "SELECT * FROM contrato";
	$rs = pg_query($query);	

	while($fila = pg_fetch_array($rs)){
		if($usu_rut == $fila["usu_rut"]  && $bandera == 0){
			$bandera = 1;
		}		
	}

	if ($bandera == 0) {
		$query = "INSERT INTO contrato(
		        usu_rut, plan_id, plan_fechaini, plan_fechafin)
				VALUES ('$usu_rut', '$plan_id', '$plan_fechaini', '$plan_fechafin');";
			
		$rs = pg_query($query);

		$query2 = "UPDATE usuario SET usu_estado='true' WHERE usu_rut='$usu_rut'";
			
		$rs2 = pg_query($query2);

		if($rs && $rs2)
			alerta_javascript_direccionado("Plan Contratado con Exito","AgregarContrato.php");
		else
			alerta_javascript_direccionado("El Contrato No se Realizo Correctamente","AgregarContrato.php");
	}
	else{
		if ($bandera == 1) {
			alerta_javascript_direccionado("No puede contratar plan debido uno actualmente contratado",
										"AgregarContrato.php");
		}
	}
	Desconectar($conexion);
?>