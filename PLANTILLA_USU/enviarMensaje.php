<?php
	include "funciones.php"; 
    session_start();
	// El mensaje
	$conexion = conectar_db(); // realizamos la coneccion a la base de datos 
	$asunto = $_POST["asunto"]; // optenemos el asunto ingresado 
	$mensaje = $_POST["contenido"]; // optenemos el contenido ingresado
	$opcion1 = $_POST["opcion1"];  // optenemos la opcion ingresada que puede ser para enviar o para nuevamente guardar


	$rut_Cliente = $_SESSION['rut']; // optenemos el rut de la persona que esta enviando o guardando el mensaje

	if($opcion1 == 'uno') { // la opcion "uno" señala que se quiso enviar el mensaje
		$query = "INSERT INTO mensaje(
    	        usu_rut, men_asunto, men_cuerpo)
    			VALUES ('$rut_Cliente','$asunto','$mensaje');"; // y insertamos en los campos correspondientes
		$rs = pg_query($query);         
		desconectar_db($conexion); // nos desconectamos de la base de datos
		alerta_javascript_direccionado("Mensaje enviado a revición",
										"redactarCorreo.php");
    }
                
    if($opcion1 == 'dos') { 
    	$query = "INSERT INTO mensaje(
            usu_rut, men_asunto, men_cuerpo, men_estado)
    		VALUES ('$rut_Cliente','$asunto','$mensaje','GUARDADO');"; // y insertamos en los campos correspondientes
		$rs = pg_query($query);         
		desconectar_db($conexion); // nos desconectamos de la base de datos
		alerta_javascript_direccionado("Mensaje guardado",
										"redactarCorreo.php");                    
    }
?>
