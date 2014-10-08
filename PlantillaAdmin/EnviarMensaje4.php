<?php
    error_reporting(E_ALL);
    ini_set("display_errors", 1);
	include("conexion.php"); 
	include("Funciones.php"); 
	require("MailMan/mailman.php");

	$con=Conectar();

	if($con){
		$rem_correo = $_POST["Remitente"]; 
		$men_id = $_POST["Mensaje"]; 

		$consulta = "SELECT U.usu_rut, P.plan_limcorreos, U.usu_nombre
         FROM Mensaje M, Usuario U, Contrato C, Plan P 
         WHERE M.men_id='$men_id' AND M.usu_rut=U.usu_rut AND U.usu_rut=C.usu_rut AND C.plan_id=P.plan_id";
       
        $res = pg_query($consulta);

		if($res){
    		for($i = 0; $i < pg_num_rows($res); $i++)
            	$row=pg_fetch_array($res);

            $RUT=$row["usu_rut"];
            $NOMBRE=$row["usu_nombre"];
            $PLAN_LIMITE=$row["plan_limcorreos"];
        }
        else
            alerta_javascript_direccionado("Error al Mostrar los Datos, Intentelo mas tarde.","AdminMensaje.php");

		$consulta = "SELECT * FROM remitente WHERE rem_correo='$rem_correo'";
		$res = pg_query($consulta);

		if($res){
    		for($i = 0; $i < pg_num_rows($res); $i++)
            	$row=pg_fetch_array($res);

            $REMITENTE=$row["rem_correo"];
            $PASS=$row["rem_pasword"];
        }
        else
            alerta_javascript_direccionado("Error al Mostrar los Datos, Intentelo mas tarde.","AdminMensaje.php");

        $a = new MailMan($RUT,$PLAN_LIMITE,$REMITENTE,$NOMBRE,$PASS);  //  usu_rut , remitente, nombre remitente, password remitente
        $a->set_mensaje(1); // id del mensaje 
        $a->enviar_correos();

        Desconectar($con);
    }
    else
        alerta_javascript_direccionado("No se pudo Conectar a la BD, Intentelo mas tarde.","AdminMensaje.php");
?>