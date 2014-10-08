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
          <a href="EnviarMensaje.php">
            <span class="badge badge-success">Enviar Mensaje</span>
            <img src="img/enviarmensaje.png">
          </a>
        </li>
        <li class="icono">
          <a href="MostrarMenPendientes.php">
            <span class="badge badge-default">Mostrar Men. Pendientes</span>
            <img src="img/mostrarmenpendientes.png">
          </a>
        </li>
        <li class="icono">
          <a href="MostrarMenEnviados.php">
            <span class="badge badge-info">Mostrar Men. Enviados</span>
            <img src="img/mostrarmenenviados.png">
          </a>
        </li>
        <li class="icono">
          <a href="ModificarMensaje.php">
            <span class="badge badge-warning">Modificar Mensaje</span>
            <img src="img/actualizarmensaje.png">
          </a>
        </li>
        <li class="icono">
          <a href="EliminarMensaje.php">
            <span class="badge badge-important">Eliminar Mensaje</span>
            <img src="img/eliminarmensaje.png">
          </a>
        </li>
      </ul>
    </div>
    
  </div>
  	
  	<script src="js/jquery-1.7.2.js"></script>
  	<script src="js/bootstrap.js"></script>

</body>