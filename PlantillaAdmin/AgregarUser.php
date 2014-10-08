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

<script type="text/javascript"></script>
<style type="text/css">
</style>
</head>
<body>
	<div id="wrapper">
    <?php include("MainNav.php"); ?>
  	<div>
      <form class="form-horizontal Cuerpo" method="post" action="AgregarUser2.php">
        <legend>Agregar Usuario</legend>
        <div class="control-group success">
          <label class="control-label" for="inputRut">Rut</label>
          <div class="controls">
            <input type="text" id="inputRut" name="Rut" placeholder="Rut" maxlength="12" required>
          </div>
        </div>
        <div class="control-group success">
          <label class="control-label" for="inputNombre">Nombres</label>
          <div class="controls">
            <input type="text" id="inputNombre" name="Nombre" placeholder="Nombres" maxlength="20" required>
          </div>
        </div>
        <div class="control-group success">
          <label class="control-label" for="inputApellidoPa">Apellido Paterno</label>
          <div class="controls">
            <input type="text" id="inputApellidoPa" name="ApellidoPa" placeholder="Apellido Patreno" maxlength="20" required>
          </div>
        </div>
        <div class="control-group success">
          <label class="control-label" for="inputApellidoMa">Apellido Materno</label>
          <div class="controls">
            <input type="text" id="inputApellidoMa" name="ApellidoMa" placeholder="Apellido Materno" maxlength="20" required>
          </div>
        </div>
        <div class="control-group success">
          <label class="control-label" for="inputUser">Nombre Usuario</label>
          <div class="controls">
            <input type="text" id="inputUser" name="Nick" placeholder="Nombre Usuario" maxlength="10" required>
          </div>
        </div>
        <div class="control-group success">
          <label class="control-label" for="inputPassword">Password</label>
          <div class="controls">
            <input type="password" id="inputPassword" name="Password" placeholder="Password" maxlength="10" required>
          </div>
        </div>
        <div class="control-group success">
          <label class="control-label" for="inputEmail">Email</label>
          <div class="controls">
            <input type="email" id="inputEmail" name="Email" placeholder="Email" maxlength="30" required>
          </div>
        </div>
        <div class="control-group success">
          <label class="control-label" for="inputTipo">Tipo Usuario</label>
          <div class="controls">
              <select id="select" name="select1">
                <option selected="selected" value="ADMINISTRADOR">Administrador</option>
                <option value="CLIENTE">Cliente</option>
              </select>
          </div>
        </div>
        <div class="control-group BotonForm">
          <div class="controls">
            <button type="submit" class="btn btn-success">Agregar</button>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <button type="button" class="btn btn-danger" onclick="parent.location='AdminUser.php'">Cancelar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  	
  	<script src="js/jquery-1.7.2.js"></script>
  	<script src="js/bootstrap.js"></script>

</body>