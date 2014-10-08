<?php
	include "funciones.php"; 
    session_start();
	// El mensaje
	$conexion = conectar_db(); // realizamos la coneccion a la base de datos 
	$asunto = $_POST["asunto"];  // optenemos el asunto ingresado 
	$mensaje = $_POST["contenido"]; // optenemos el contenido ingresado
	$opcion1 = $_POST["opcion1"]; // optenemos la opcion ingresada que puede ser para enviar o para nuevamente guardar
	$mensaje_id	= $_POST["mensajeid"]; // optenemos el id del mensaje tratado

	$rut_Cliente = $_SESSION['rut']; // optenemos el rut de la persona que esta enviando o guardando el mensaje


	if($opcion1 == 'uno') { // la opcion "uno" señala que se quiso enviar el mensaje
		$query = "	UPDATE mensaje 
					SET men_asunto = '$asunto', men_cuerpo = '$mensaje', men_estado = 'ENVIADO' 
					WHERE men_id = $mensaje_id"; // y actualizamos los campos correspondientes
		$rs = pg_query($query);      
	   	desconectar_db($conexion); // nos desconectamos de la base de datos
		alerta_javascript_direccionado("Mensaje enviado a revición",
										"CorreosGuardados.php");
    }

   	if($opcion1 == 'dos') {  // la opcion "dos" señala que se quiso guardar el mensaje
	   	$query = "	UPDATE mensaje
					SET men_asunto = '$asunto', men_cuerpo = '$mensaje'
					WHERE men_id = $mensaje_id"; // y actualizamos los campos correspondientes
		$rs = pg_query($query);      
	   	desconectar_db($conexion); // nos desconectamos de la base de datos
		alerta_javascript_direccionado("Mensaje guardado",
										"correosGuardados.php");     
	}
?>
