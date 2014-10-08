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

<?php include("conexion.php"); ?>
<?php include("Funciones.php"); ?>

<script type="text/javascript"></script>
<style type="text/css">
</style>
</head>
<body>
	<div id="wrapper">
    <?php include("MainNav.php"); ?>
  	<div class="Cuerpo aviso">
      <?php
        $con=Conectar();

        if($con){
          $ID= $_POST['ID'];
          $Asunto= $_POST['Asunto'];
          $Cuerpo= $_POST['Cuerpo'];

          $consulta="UPDATE mensaje SET men_asunto='$Asunto',men_cuerpo='$Cuerpo' WHERE men_id='$ID'";
          $resultado = pg_query($consulta);

          if($resultado)
            alerta_javascript_direccionado("Mensaje Actualizado Exitosamente.","ModificarMensaje.php");
          else
            alerta_javascript_direccionado("Error al Actualizar, Intentelo Nuevamente.","ModificarMensaje.php");
          
          Desconectar($consulta);
        }
        else{
          alerta_javascript_direccionado("No se pudo Conectar a la BD, Intentelo mas tarde.","ModificarMensaje.php");
        }
      ?>
    </div>
  </div>
  	
  	<script src="js/jquery-1.7.2.js"></script>
  	<script src="js/bootstrap.js"></script>

</body>