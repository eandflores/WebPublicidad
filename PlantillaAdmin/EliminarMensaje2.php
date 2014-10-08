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

          if($con)
          { 
            $men_id= $_POST['group1'];
                        
            foreach ($men_id as $value){
              $consulta="DELETE FROM mensaje WHERE men_id='$value'";
              $res = pg_query($consulta);
            }
            
            if($res)
              alerta_javascript_direccionado("Mensaje Eliminado Exitosamente.","EliminarMensaje.php");
            else
              alerta_javascript_direccionado("Ha ocurrido un Error y no pudo Eliminarse el Mensaje.","EliminarMensaje.php");
            
            Desconectar($con);
          }
          else 
            alerta_javascript_direccionado("No se pudo Conectar a la BD, Intentelo mas tarde.","EliminarMensaje.php");
        ?>
    </div>
  </div>
    
    <script src="js/jquery-1.7.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>