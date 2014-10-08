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
<link rel="stylesheet" type="text/css" href="cssMail/estilos.css">

<?php include("conexion.php"); ?>
<?php include("Funciones.php"); ?>

<script type="text/javascript"></script>
<style type="text/css">
</style>
</head>
<body onload="whizzywig()">
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
            <form action="ModificarMensaje3.php" class="form-horizontal" method="post">
            <legend>Modificar Mensaje</legend>
            <input type="hidden" value ="<?PHP echo $men_id; ?>" name="ID">
            <div class="control-group success">
              <label class="control-label" for="inputRut">Rut Usuario</label>
              <div class="controls">
                <input type="text" id="inputRut" name="Rut" value="<?php echo $row["usu_rut"]; ?>"  maxlength="12" class="disabled" readonly required>
              </div>
            </div>
            <div class="control-group success">
              <label class="control-label" for="inputEstado">Estado</label>
              <div class="controls">
                <input type="text" id="inputEstado" name="Estado" value="<?php echo $row["men_estado"]; ?>"  class="disabled" readonly required>
              </div>
            </div>
            <div class="control-group success">
              <label class="control-label" for="inputAsunto">Asunto</label>
              <div class="controls">
                <input type="text" id="inputAsunto" name="Asunto" value="<?php echo $row["men_asunto"]; ?>"  maxlength="30" required>
              </div>
            </div>
            <div class="control-group success" class="MenCuerpo">
              <section id="principal">
                <textarea id="edited" name="Cuerpo" ><?php echo $row["men_cuerpo"]; ?></textarea>
              </section>
            </div>
            <div class="control-group BotonForm">
                <div class="controls">
                  <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
            </div>
            <div class="control-group">
                <div class="controls">
                  <button type="button" class="btn btn-danger" onclick="parent.location='ModificarMensaje.php'">Cancelar</button>
                </div>
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
      </form>
    </div>
  </div>

    <script type="text/javascript" src="script_javascript/whizzywig61.js"></script>    
    <script type="text/javascript" src="script_javascript/espanol.js"></script>
    <script src="js/jquery-1.7.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>