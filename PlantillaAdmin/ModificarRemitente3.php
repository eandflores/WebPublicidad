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
          $Correo= $_POST['Correo'];
          $Password= $_POST['Password'];
          $Fechauso= $_POST['Fechauso'];
          $Contador= $_POST['Contador'];

          if($Fechauso){
            $consulta="UPDATE remitente SET rem_correo='$Correo',rem_pasword='$Password',rem_fechauso='$Fechauso',rem_contador='$Contador' WHERE rem_correo='$Correo'";
            $resultado = pg_query($consulta);
          }
          else{
            $consulta="UPDATE remitente SET rem_correo='$Correo',rem_pasword='$Password',rem_fechauso=null,rem_contador='$Contador' WHERE rem_correo='$Correo'";
            $resultado = pg_query($consulta);
          }

          if($resultado)
            alerta_javascript_direccionado("Remitente Actualizado Exitosamente.","ModificarRemitente.php");
          else
            alerta_javascript_direccionado("Error al Actualizar, Intentelo Nuevamente.","ModificarRemitente.php");
          
          Desconectar($consulta);
        }
        else{
          alerta_javascript_direccionado("No se pudo Conectar a la BD, Intentelo mas tarde.","ModificarRemitente.php");
        }
      ?>
    </div>
  </div>
  	
  	<script src="js/jquery-1.7.2.js"></script>
  	<script src="js/bootstrap.js"></script>

</body>