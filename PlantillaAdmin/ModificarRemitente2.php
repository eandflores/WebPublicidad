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
            $rem_correo= $_POST['group1'];
                       
            $consulta="SELECT * FROM remitente WHERE rem_correo='$rem_correo'";
            $res = pg_query($consulta);
            
            if($res){
              for($i = 0; $i < pg_num_rows($res); $i++)
                    $row=pg_fetch_array($res);
        ?>
              <form action="ModificarRemitente3.php" class="form-horizontal" method="post">
              <legend>Modificar Remitente</legend>
              <div class="control-group success">
                <label class="control-label" for="inputCorreo">Correo</label>
                <div class="controls">
                  <input type="text" id="inputCorreo" name="Correo" value="<?php echo $row["rem_correo"]; ?>" maxlength="30" class="disabled" readonly required>
                </div>
              </div>
              <div class="control-group success">
                <label class="control-label" for="inputPassword">Password</label>
                <div class="controls">
                  <input type="password" id="inputPassword" name="Password" value="<?php echo $row["rem_pasword"]; ?>" maxlength="20" required>
                </div>
              </div>
              <div class="control-group success">
                <label class="control-label" for="inputFechauso">Fecha Uso</label>
                <div class="controls">
                  <input type="date" id="inputFechauso" name="Fechauso" value="<?php echo $row["rem_fechauso"]; ?>">
                </div>
              </div>    
              <div class="control-group success">
                <label class="control-label" for="inputContador">Correos Enviados</label>
                <div class="controls">
                  <input type="number" id="inputContador" name="Contador" value="<?php echo $row["rem_contador"]; ?>"  min="0" required>
                </div>
              </div>
              <div class="control-group BotonForm">
                <div class="controls">
                  <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <button type="button" class="btn btn-danger" onclick="parent.location='ModificarRemitente.php'">Cancelar</button>
                </div>
              </div>
              </form>
        <?php
            }
            else
              alerta_javascript_direccionado("Ha ocurrido un Error y no pudo Encontrarse el Remitente, Intentelo mas tarde.","ModificarRemitente.php");

              Desconectar($con);
            }
            else
              alerta_javascript_direccionado("No se pudo Conectar a la BD, Intentelo mas tarde.","ModificarRemitente.php");
        ?>
    </div>
  </div>
    
    <script src="js/jquery-1.7.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>