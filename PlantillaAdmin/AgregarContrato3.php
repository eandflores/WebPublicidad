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

<script type="text/javascript">
</script>
<style type="text/css">
</style>
</head>
<body>
	<div id="wrapper">
    <?php include("MainNav.php"); ?>
  	<div>
      <form class="form-horizontal Cuerpo" method="post" action="AgregarContrato4.php" onsubmit="return validacion_fechas()">
        <?php
          $plan_id = $_POST['group1'];
          $usu_rut = $_POST['RUT'];
        ?>
        <span class="badge badge-success">Usuario: <?php echo $usu_rut ?></span>
        <span class="badge badge-success">Plan: <?php echo $plan_id ?></span>
        <legend>Seleccionar Fechas Contrato</legend>
        <div class="control-group success">
          <label class="control-label" for="inputFechaIni">Fecha Inicio Contrato</label>
          <div class="controls">
            <input type="date" id="inputFechaIni" name="FechaIni" min="<?php echo fecha_actual() ?>" value="<?php echo fecha_actual() ?>" required>
          </div>
        </div>
        <div class="control-group success">
          <label class="control-label" for="inputFechaFin">Fecha Termino Contrato</label>
          <div class="controls">
            <input type="date" id="inputFechaFin" name="FechaFin" min="<?php echo fecha_actual() ?>" value="<?php echo fecha_fin() ?>" required>
          </div>
        </div>
        <input type="hidden" value ="<?PHP echo $usu_rut; ?>" name="RUT">
        <input type="hidden" value ="<?PHP echo $plan_id; ?>" name="PlanID">
        <div class="control-group BotonForm">
          <div class="controls">
            <button type="submit" class="btn btn-success">Realizar Contrato</button>
          </div>
        </div>
        <div class="control-group">
          <div class="controls">
            <button type="button" class="btn btn-danger" onclick="parent.location='AdminContrato.php'">Cancelar</button>
          </div>
        </div>
      </form>
    </div>
  </div>
  	
  	<script src="js/jquery-1.7.2.js"></script>
  	<script src="js/bootstrap.js"></script>
    <script type="text/javascript">
    function validacion_fechas(){
        var fechaini = document.getElementById("inputFechaIni").value;
        var fechafin = document.getElementById("inputFechaFin").value;

        if(fechaini<=fechafin)
          return true;
        else{
          alert('La Fecha de Inicio no puede ser Mayor a la de Termino');
          return false;
        }
    }
</script>

</body>