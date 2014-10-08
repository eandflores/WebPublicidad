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
          $consulta = "select * from remitente";
          $res = pg_query($consulta);

          if($res)
          {
      ?>
            <table class="table table-striped">
              <thead>
                <tr>
                  <th>Correo</th>
                  <th>Password</th>
                  <th>Fecha Uso</th>
                  <th>Correos Enviados</th>
                </tr>
              </thead>

              <?php
              for($i = 0; $i < pg_num_rows($res); $i++){
                $row=pg_fetch_array($res);
              ?>
                <tr>
                  <td align="center" valign="middle"><?php echo $row["rem_correo"]; ?></td>
                  <td align="center" valign="middle" ><?php echo $row["rem_pasword"]; ?></td>
                  <td align="center" valign="middle" ><?php echo $row["rem_fechauso"]; ?></td>
                  <td align="center" valign="middle" ><?php echo $row["rem_contador"]; ?></td>
                </tr>  
              <?php 
              } 
              ?>
            </table>
          <?php 
          }
          else
            alerta_javascript_direccionado("Error al Mostrar los Datos, Intentelo mas tarde.","AdminRemitentes.php");

          Desconectar($con);
        }
        else
          alerta_javascript_direccionado("No se pudo Conectar a la BD, Intentelo mas tarde.","AdminRemitentes.php");
          ?>
      <button class="btn btn btn-primary" onclick="parent.location='AdminRemitentes.php'">Atrás</button>
    </div>
  </div>
  	
  	<script src="js/jquery-1.7.2.js"></script>
  	<script src="js/bootstrap.js"></script>

</body>