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
<?php include("Funciones.php") ?>

<script type="text/javascript"></script>
<style type="text/css">
</style>
</head>
<body>
  <div id="wrapper">
    <?php include("MainNav.php"); ?>
    <div class="Cuerpo aviso">
      <form action="EliminarMensaje2.php" method="post">
        <legend>Eliminar Mensaje</legend>
        <div class="control-group">
          <div class="controls">
          <?php
            $con=Conectar();

            if($con){ 
              $consulta = "select * from mensaje";
              $res = pg_query($consulta);

              if($res){
          ?>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Rut Usuario</th>
                      <th>Remitente</th>
                      <th>Asunto</th>
                      <th>Estado</th>
                    </tr>
                  </thead>

                  <?php
                  for($i = 0; $i < pg_num_rows($res); $i++){
                    $row=pg_fetch_array($res);
                  ?>
                    <tr class="mensaje">
                      <td align="center" valign="middle" >
                        <input type="checkbox" name="group1[]" value="<?php echo $row["men_id"] ?>">
                      </td>
                      <td align="center" valign="middle" class="mensaje">
                        <a href="MostrarUser.php?valor=<?php echo $row["usu_rut"]?>"><?php echo $row["usu_rut"]; ?></a>
                      </td>
                      <td align="center" valign="middle" class="mensaje">
                        <a href="MostrarRemitente.php?valor=<?php echo $row["rem_correo"]?>"><?php echo $row["rem_correo"]; ?></a>
                      </td>
                      <td align="center" valign="middle" class="mensaje">
                        <a href="MostrarMensaje.php?valor=<?php echo $row["men_id"]?>"><?php echo $row["men_asunto"]; ?></a>
                      </td>
                      <td align="center" valign="middle" ><?php echo $row["men_estado"] ?></td>
                    </tr>  
                  <?php 
                  } 
                  ?>
                </table>
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
        </div>
        <div class="control-group BotonForm">
          <div class="controls">
            <button type="submit" class="btn btn-success">Eliminar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
    
    <script src="js/jquery-1.7.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>