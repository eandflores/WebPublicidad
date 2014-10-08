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

<script type="text/javascript"></script>
<style type="text/css">
</style>
</head>
<body>
	<div id="wrapper">
    <?php include("MainNav.php"); ?>
  	<div>
      <form class="form-horizontal Cuerpo" method="post" action="AgregarPlan2.php">
        <legend>Agregar Plan</legend>
        <div class="control-group success">
          <label class="control-label" for="inputNombre">Nombre</label>
          <div class="controls">
            <input type="text" id="inputNombre" name="Nombre" placeholder="Nombre" maxlength="10" required>
          </div>
        </div>
        <div class="control-group success">
          <label class="control-label" for="inputDescripcion">Descripción</label>
          <div class="controls">
            <input type="text" id="inputDescripcion" name="Descripcion" placeholder="Descripción" maxlength="100" required>
          </div>
        </div>
        <div class="control-group success">
          <label class="control-label" for="inputPrecio">Precio</label>
          <div class="controls">
            <input type="number" id="inputPrecio" name="Precio" placeholder="Precio" min="0" required>
          </div>
        </div>        
        <div class="control-group success">
          <label class="control-label" for="inputLimCorreos">Límite Correos</label>
          <div class="controls">
            <input type="number" id="inputLimCorreos" name="LimCorreos" placeholder="Límite Correos"  min="0" required>
          </div>
        </div>        
        <div class="control-group success">
          <label class="control-label" for="inputLimMensajes">Límite Mensajes</label>
          <div class="controls">
            <input type="number" id="inputLimMensajes" name="LimMensajes" placeholder="Límite Mensajes"  min="0" required>
          </div>
        </div>
        <div class="control-group BotonForm">
          <div class="controls">
            <button type="submit" class="btn btn-success">Agregar</button>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <button type="button" class="btn btn-danger" onclick="parent.location='AdminPlan.php'">Cancelar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  	
  	<script src="js/jquery-1.7.2.js"></script>
  	<script src="js/bootstrap.js"></script>

</body>