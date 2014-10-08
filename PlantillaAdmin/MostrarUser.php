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
          $usu_rut = $_GET["valor"]; 
          $consulta = "select * from usuario where usu_rut='$usu_rut'";
          $res = pg_query($consulta);

          if($res)
          {
            for($i = 0; $i < pg_num_rows($res); $i++)
                $row=pg_fetch_array($res);
      ?>
            <div class="ContenedorMuestra">
              <ul class="Muestra">
                <li>Rut:</li>
                <li>Nombre:</li>
                <li>Apellido:</li>
                <li>Username:</li>
                <li>Password:</li>
                <li>Email:</li>
                <li>Estado:</li>
                <li>Tipo:</li>
                <li>Envios:</li>
              </ul>
              <ul class="Muestra">
                <li><?php echo $row["usu_rut"]; ?></li>
                <li><?php echo $row["usu_nombre"]; ?></li>
                <li><?php echo $row["usu_apellidopa"]." ".$row["usu_apellidoma"]; ?></li>
                <li><?php echo $row["usu_user"]; ?></li>
                <li><?php echo $row["usu_pasword"]; ?></li>
                <li><?php echo $row["usu_email"]; ?></li>
                <li><?php echo $row["usu_estado"]; ?></li>
                <li><?php echo $row["usu_tipo"]; ?></li>
                <li><?php echo $row["usu_enviados"]; ?></li>
              </ul>
            </div>
          <?php 
          }
          else
            alerta_javascript_direccionado("Error al Mostrar los Datos, Intentelo mas tarde.","AdminUser.php");

          Desconectar($con);
        }
        else
          alerta_javascript_direccionado("No se pudo Conectar a la BD, Intentelo mas tarde.","AdminUser.php");
          ?>
      <button class="btn btn btn-primary" onclick="history.back()">Atrás</button>
    </div>
  </div>
  	
  	<script src="js/jquery-1.7.2.js"></script>
  	<script src="js/bootstrap.js"></script>

</body>