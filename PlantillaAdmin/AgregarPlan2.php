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
          $Nombre=$_POST['Nombre'];
          $Descripcion=$_POST['Descripcion'];
          $Precio= $_POST['Precio'];
          $LimCorreos=$_POST['LimCorreos'];
          $LimMensajes= $_POST['LimMensajes'];

          $consulta="INSERT INTO plan(plan_nombre,plan_descripcion,plan_precio,plan_limcorreos,plan_limmensajes) 
            VALUES('$Nombre','$Descripcion','$Precio','$LimCorreos','$LimMensajes')";
          $resultado=pg_query($consulta);
          
          if($resultado)
            alerta_javascript_direccionado("Plan Registrado Exitosamente.","AgregarPlan.php");

          else
            alerta_javascript_direccionado("Error en el Ingreso, Intentelo mas tarde.","AgregarPlan.php");


          Desconectar($con);
        }
        else
          alerta_javascript_direccionado("No se pudo Conectar a la BD, Intentelo mas tarde.","AgregarPlan.php");
      ?>
    </div>
  </div>
  	
  	<script src="js/jquery-1.7.2.js"></script>
  	<script src="js/bootstrap.js"></script>

</body>