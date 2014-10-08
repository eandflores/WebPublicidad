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
          $Correo=$_POST['Correo'];
          $Nombre=$_POST['Nombre'];
          $Apellido=$_POST['Apellido'];
          $Direccion=$_POST['Direccion'];
          $Telefono=$_POST['Telefono'];
          $rut_Cliente = $_SESSION['rut'];

          $query = "SELECT * FROM receptor WHERE rec_correo = '$Correo'";
          $rs = pg_query($query);
  
          if (pg_num_rows($rs) == 0) {
            $query = "INSERT INTO receptor VALUES ('$Correo','$Nombre','$Apellido','$Direccion','$Telefono');";
            $query1 = "INSERT INTO aporta  VALUES ('$rut_Cliente','$Correo','".fecha_actual()."');";
            $rs = pg_query($query);
            $rs1 = pg_query($query1);
          }
          else{
            $query1 = "INSERT INTO aporta  VALUES ('$rut_Cliente','$correo','".fecha_actual()."');";
            $rs1 = pg_query($query1);
          }
          
          if($rs && $rs1){
            alerta_javascript_direccionado("Destinatario Registrado Exitosamente","AgregarDestinatario.php");
          }
          else{
            //alerta_javascript_direccionado("Error en el Ingreso, Intentelo nuevamente","AgregarDestinatario.php");
          }
          Desconectar($con);
        }
        else
          alerta_javascript_direccionado("No se pudo Conectar a la BD, Intentelo mas tarde.","AgregarDestinatario.php");
      ?>
    </div>
  </div>
  	
  	<script src="js/jquery-1.7.2.js"></script>
  	<script src="js/bootstrap.js"></script>

</body>