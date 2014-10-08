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
          $men_id = $_POST["group1"]; 
          $consulta = "select * from mensaje where men_id='$men_id'";
          $res = pg_query($consulta);

          if($res)
          {
            for($i = 0; $i < pg_num_rows($res); $i++)
                $row=pg_fetch_array($res);
      ?>
            <div class="ContenedorMuestra">
              <ul class="Muestra">
                <li>Rut Usuario:</li>
                <li>Asunto:</li>
                <li>Estado Mensaje:</li>
              </ul>
              <ul class="Muestra">
                <li><?php echo $row["usu_rut"]; ?></li>
                <li><?php echo $row["men_asunto"]; ?></li>
                <li><?php echo $row["men_estado"]; ?></li>
              </ul>
            </div>
            <div>
              <ul class="MuestraMensaje">
                <li class="ElementoMensaje">
                  Mensaje
                </li>
                <li class="ElementoMensaje Contenido">
                  <?php echo $row["men_cuerpo"]; ?>
                </li>
              </ul>
            </div>
          <?php 
          }
          else
            alerta_javascript_direccionado("Error al Mostrar los Datos, Intentelo mas tarde.","AdminMensaje.php");

          Desconectar($con);
        }
        else
          alerta_javascript_direccionado("No se pudo Conectar a la BD, Intentelo mas tarde.","AdminMensaje.php");
          ?>
      <button class="btn btn btn-primary" onclick="history.back()">Atrás</button>
    </div>
  </div>
    
    <script src="js/jquery-1.7.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>