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
          <a href="MostrarDestinatarios.php">
            <span class="badge badge-default">Mostrar Direcciones</span>
            <img src="img/mostrarcorreos.png">
          </a>
        </li>
        <li class="icono">
          <a href="AgregarDestinatario.php">
            <span class="badge badge-success">Importar Direccion</span>
            <img src="img/importarcorreo.png">
          </a>
        </li>
        <li class="icono">
          <a href="AgregarDestinatarios.php">
            <span class="badge badge-success">Importar Excel</span>
            <img src="img/importarexcel.png">
          </a>
        </li>
        <li class="icono">
          <a href="ModificarDestinatario.php">
            <span class="badge badge-warning">Modificar Dirección</span>
            <img src="img/modificarcorreo.png">
          </a>
        </li>
        <li class="icono">
          <a href="EliminarDestinatarios.php">
            <span class="badge badge-important">Eliminar Dirección</span>
            <img src="img/eliminarcorreo.png">
          </a>
        </li>
      </ul>
    </div>
  </div>
  	
  	<script src="js/jquery-1.7.2.js"></script>
  	<script src="js/bootstrap.js"></script>

</body>