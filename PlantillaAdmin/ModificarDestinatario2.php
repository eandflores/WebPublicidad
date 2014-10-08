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
            $rec_correo= $_POST['group1'];
                       
            $consulta="SELECT * FROM receptor WHERE rec_correo='$rec_correo'";
            $res = pg_query($consulta);
            
            if($res){
              for($i = 0; $i < pg_num_rows($res); $i++)
                    $row=pg_fetch_array($res);
        ?>
              <form action="ModificarDestinatario3.php" class="form-horizontal" method="post">
              <legend>Modificar Destinatario</legend>
              <div class="control-group success">
                <label class="control-label" for="inputCorreo">Correo</label>
                <div class="controls">
                  <input type="text" id="inputCorreo" name="Correo" value="<?php echo $row["rec_correo"]; ?>" maxlength="30" class="disabled" readonly required>
                </div>
              </div>
              <div class="control-group success">
                <label class="control-label" for="inputNombre">Nombre</label>
                <div class="controls">
                  <input type="text" id="inputNombre" name="Nombre" value="<?php echo $row["rec_nombre"]; ?>" maxlength="20" required>
                </div>
              </div>
              <div class="control-group success">
                <label class="control-label" for="inputApellido">Apellido</label>
                <div class="controls">
                  <input type="text" id="inputApellido" name="Apellido" value="<?php echo $row["rec_apellido"]; ?>" maxlength="20" required>
                </div>
              </div>
              <div class="control-group success">
                <label class="control-label" for="inputDireccion">Dirección</label>
                <div class="controls">
                  <input type="text" id="inputDireccion" name="Direccion" value="<?php echo $row["rec_direccion"]; ?>" maxlength="40" required>
                </div>
              </div>        
              <div class="control-group success">
                <label class="control-label" for="inputTelefono">Teléfono</label>
                <div class="controls">
                  <input type="number" id="inputTelefono" name="Telefono" value="<?php echo $row["rec_telefono"]; ?>"  maxlength="10" required>
                </div>
              </div>        
              <div class="control-group BotonForm">
                <div class="controls">
                  <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <button type="button" class="btn btn-danger" onclick="parent.location='ModificarDestinatario.php'">Cancelar</button>
                </div>
              </div>
              </form>
        <?php
            }
            else
              alerta_javascript_direccionado("Ha ocurrido un Error y no pudo Encontrarse el Destinatario, Intentelo mas tarde.","ModificarDestinatario.php");

              Desconectar($con);
            }
            else
              alerta_javascript_direccionado("No se pudo Conectar a la BD, Intentelo mas tarde.","ModificarDestinatario.php");
        ?>
    </div>
  </div>
    
    <script src="js/jquery-1.7.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>