<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<?PHP
    session_start();
    if( !(isset($_SESSION['user'])) || $_SESSION['cargo'] == 'CLIENTE'){       
        header("Location: ../index-proyecto/index.php");
    }
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="shortcut icon" href="img/logo.jpg">
<title>Sistema Publicidad</title>

<link rel="stylesheet" type="text/css" href="css/reset.css">
<link rel="stylesheet" type="text/css" href="css/bootswatch.css">
<link rel="stylesheet" type="text/css" href="css/main.css">

<script type="text/javascript"></script>
<style type="text/css">
</style>
</head>
<body>
	<div id="wrapper">
  		<?php include("MainNav.php"); ?>
      <div>
      <ul class="Cuerpo">
        <li class="icono">
          <a href="AdminUser.php">
            <span class="badge badge-success">Gestión Usuarios</span>
            <img src="img/administrarusuario.png">
          </a>
        </li>
        <li class="icono">
          <a href="AdminRemitentes.php">
            <span class="badge badge-success">Gestión Remitentes</span>
            <img src="img/administrarremitente.png">
          </a>
        </li>
        <li class="icono">
          <a href="AdminPlan.php">
            <span class="badge badge-success">Gestión Planes</span>
            <img src="img/administrarplan.png">
          </a>
        </li>
        <li class="icono">
          <a href="AdminDestinatarios.php">
            <span class="badge badge-success">Gestión Destinatarios</span>
            <img src="img/mostrarcorreos.png">
          </a>
        </li>
        <li class="icono">
          <a href="AdminMensaje.php">
            <span class="badge badge-success">Gestión Mensajes</span>
            <img src="img/mensaje.png">
          </a>
        </li>
        <li class="icono">
          <a href="AdminContrato.php">
            <span class="badge badge-success">Gestión Contratos</span>
            <img src="img/contrato.png">
          </a>
        </li>
      </ul>
    </div>
  </div>
  	
  	<script src="js/jquery-1.7.2.js"></script>
  	<script src="js/bootstrap.js"></script>

</body>