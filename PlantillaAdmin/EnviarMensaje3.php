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
      <form action="EnviarMensaje4.php" method="post">
        <legend>Enviar Mensaje</legend>
        <div class="control-group">
          <div class="controls">
          <?php
            $con=Conectar();

            if($con){
              $rem_correo = $_POST["Remitente"]; 
              $men_id = $_POST["Mensaje"]; 

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
                  <li>Remitente:</li>
                </ul>
                <ul class="Muestra">
                  <li><?php echo $row["usu_rut"]; ?></li>
                  <li><?php echo $row["men_asunto"]; ?></li>
                  <li><?php echo $rem_correo; ?></li>
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
        </div>
        <input type="hidden" name="Remitente" value="<?php echo $rem_correo?>">
        <input type="hidden" name="Mensaje" value="<?php echo $men_id?>">
        <div class="control-group BotonForm">
          <div class="controls">
            <button type="submit" class="btn btn-success">Enviar Mensaje</button>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <button type="button" class="btn btn-danger" onclick="parent.location='AdminMensaje.php'">Cancelar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
    
    <script src="js/jquery-1.7.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>