<?php
	include "funciones.php"; 
    session_start();
	// El mensaje
	$conexion = conectar_db();
	$asunto = $_GET["asunto"];
	$correos = $_GET["correos"];
	$mensaje = $_GET["cuerpo"];
	$rut_Cliente = $_SESSION['rut'];


	$query = "INSERT INTO mensaje(
            usu_rut, rem_correo, men_asunto, men_cuerpo, men_estado)
    		VALUES ('$rut_Cliente','$correos','$asunto','$mensaje','GUARDADO');";
	$rs = pg_query($query);

	desconectar_db($conexion);
	alerta_javascript_direccionado("Mensaje guardado",
										"redactarCorreo.php");
?>
