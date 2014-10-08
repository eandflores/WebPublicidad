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
            $plan_id= $_POST['group1'];
                       
            $consulta="SELECT * FROM plan WHERE plan_id='$plan_id'";
            $res = pg_query($consulta);
            
            if($res){
              for($i = 0; $i < pg_num_rows($res); $i++)
                    $row=pg_fetch_array($res);
        ?>
              <form action="ModificarPlan3.php" class="form-horizontal" method="post">
              <legend>Modificar Plan</legend>
              <div class="control-group success">
                <label class="control-label" for="inputID">ID</label>
                <div class="controls">
                  <input type="text" id="inputID" name="ID" value="<?php echo $row["plan_id"]; ?>" maxlength="10" class="disabled" readonly required>
                </div>
              </div>
              <div class="control-group success">
                <label class="control-label" for="inputNombre">Nombre</label>
                <div class="controls">
                  <input type="text" id="inputNombre" name="Nombre" value="<?php echo $row["plan_nombre"]; ?>" maxlength="10" required>
                </div>
              </div>
              <div class="control-group success">
                <label class="control-label" for="inputDescripcion">Descripción</label>
                <div class="controls">
                  <input type="text" id="inputDescripcion" name="Descripcion" value="<?php echo $row["plan_descripcion"]; ?>" maxlength="100" required>
                </div>
              </div>
              <div class="control-group success">
                <label class="control-label" for="inputPrecio">Precio</label>
                <div class="controls">
                  <input type="number" id="inputPrecio" name="Precio" value="<?php echo $row["plan_precio"]; ?>" min="0" required>
                </div>
              </div>        
              <div class="control-group success">
                <label class="control-label" for="inputLimCorreos">Límite Correos</label>
                <div class="controls">
                  <input type="number" id="inputLimCorreos" name="LimCorreos" value="<?php echo $row["plan_limcorreos"]; ?>"  min="0" required>
                </div>
              </div>        
              <div class="control-group success">
                <label class="control-label" for="inputLimMensajes">Límite Mensajes</label>
                <div class="controls">
                  <input type="number" id="inputLimMensajes" name="LimMensajes" value="<?php echo $row["plan_limmensajes"]; ?>"  min="0" required>
                </div>
              </div>
              <div class="control-group BotonForm">
                <div class="controls">
                  <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <button type="button" class="btn btn-danger" onclick="parent.location='ModificarPlan.php'">Cancelar</button>
                </div>
              </div>
              </form>
        <?php
            }
            else
              alerta_javascript_direccionado("Ha ocurrido un Error y no pudo Encontrarse el Plan, Intentelo mas tarde.","ModificarPlan.php");

              Desconectar($con);
            }
            else
              alerta_javascript_direccionado("No se pudo Conectar a la BD, Intentelo mas tarde.","ModificarPlan.php");
        ?>
    </div>
  </div>
    
    <script src="js/jquery-1.7.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>