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
          <a href="MostrarRemitentes.php">
            <span class="badge badge-default">Mostrar Remitentes</span>
            <img src="img/mostrarremitente.png">
          </a>
        </li>
        <li class="icono">
          <a href="AgregarRemitente.php">
            <span class="badge badge-success">Agregar Remitente</span>
            <img src="img/agregarremitente.png">
          </a>
        </li>
        <li class="icono">
          <a href="ModificarRemitente.php">
            <span class="badge badge-warning">Modificar Remitente</span>
            <img src="img/modificarremitente.png">
          </a>
        </li>
        <li class="icono">
          <a href="EliminarRemitente.php">
            <span class="badge badge-important">Eliminar Remitente</span>
            <img src="img/eliminarremitente.png">
          </a>
        </li>
      </ul>
    </div>
  </div>
  	
  	<script src="js/jquery-1.7.2.js"></script>
  	<script src="js/bootstrap.js"></script>

</body>