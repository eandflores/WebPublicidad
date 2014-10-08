<?php
 	error_reporting(E_ALL);
 	ini_set("display_errors", 1);
	require "mailman.php";
	$a = new MailMan("18.064.115-7",4,"clouderpruebas@gmail.com","Clouder ltda","clouder2013");  //  usu_rut , remitente, nombre remitente, password remitente
	$a->set_mensaje(1); // id del mensaje 
	$a->enviar_correos();


?>