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
      <form action="EliminarProxy2.php" method="post">
        <legend>Eliminar Proxy</legend>
        <div class="control-group">
          <div class="controls">
          <?php
            $con=Conectar();

            if($con){ 
              $consulta = "select * from proxy";
              $res = pg_query($consulta);

              if($res){
          ?>
                <table class="table table-striped">
                  <thead>
                    <tr>
                      <th></th>
                      <th>Nombre</th>
                      <th>Dirección</th>
                    </tr>
                  </thead>

                  <?php
                  for($i = 0; $i < pg_num_rows($res); $i++){
                    $row=pg_fetch_array($res);
                  ?>
                    <tr>
                      <td align="center" valign="middle" >
                        <input type="radio" name="group1" value="<?php echo $row["pro_direccion"] ?>">
                      </td>
                      <td align="center" valign="middle" ><?php echo $row["pro_nombre"]; ?></td>
                      <td align="center" valign="middle" ><?php echo $row["pro_direccion"]; ?></td>
                    </tr>  
                  <?php 
                  } 
                  ?>
                </table>
            <?php 
              }
              else
                alerta_javascript_direccionado("Error al Mostrar los Datos, Intentelo mas tarde.","AdminProxy.php");

                Desconectar($con);
              }
            else
              alerta_javascript_direccionado("No se pudo Conectar a la BD, Intentelo mas tarde.","AdminProxy.php");
            ?>
          </div>
        </div>
        <div class="control-group BotonForm">
          <div class="controls">
            <button type="submit" class="btn btn-success">Eliminar</button>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <button type="button" class="btn btn-danger" onclick="parent.location='AdminProxy.php'">Cancelar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
    
    <script src="js/jquery-1.7.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>