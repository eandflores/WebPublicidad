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
            $usu_rut= $_POST['Rut'];
            $plan_id= $_POST['PlanID'];
                       
            $consulta="SELECT * FROM contrato WHERE plan_id='$plan_id' AND usu_rut='$usu_rut'";
            $res = pg_query($consulta);
            
            if($res){
              for($i = 0; $i < pg_num_rows($res); $i++)
                    $row=pg_fetch_array($res);
        ?>
              <form action="ModificarContrato3.php" class="form-horizontal" method="post" onsubmit="return validacion_fechas()">
              <legend>Modificar Contrato</legend>
              <div class="control-group success">
                <label class="control-label" for="inputRut">Rut Usuario</label>
                <div class="controls">
                  <input type="text" id="inputRut" name="Rut" value="<?php echo $row["usu_rut"]; ?>" class="disabled" readonly required>
                </div>
              </div>
              <div class="control-group success">
                <label class="control-label" for="inputPlanID">ID Plan</label>
                <div class="controls">
                  <input type="number" id="inputPlanID" name="PlanID" value="<?php echo $row["plan_id"]; ?>" class="disabled" readonly required>
                </div>
              </div>
              <div class="control-group success">
                <label class="control-label" for="inputFechaIni">Fecha Inicio Contrato</label>
                <div class="controls">
                  <input type="date" id="inputFechaIni" name="FechaIni" value="<?php echo $row["plan_fechaini"]; ?>" required>
                </div>
              </div>
              <div class="control-group success">
                <label class="control-label" for="inputFechaFin">Fecha Termino Contrato</label>
                <div class="controls">
                  <input type="date" id="inputFechaFin" name="FechaFin" value="<?php echo $row["plan_fechafin"]; ?>" required>
                </div>
              </div>
              <div class="control-group BotonForm">
                <div class="controls">
                  <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <button type="button" class="btn btn-danger" onclick="parent.location='ModificarContrato.php'">Cancelar</button>
                </div>
              </div>
              </form>
        <?php
            }
            else
              alerta_javascript_direccionado("Ha ocurrido un Error y no pudo Encontrarse el Plan, Intentelo mas tarde.","ModificarContrato.php");

              Desconectar($con);
            }
            else
              alerta_javascript_direccionado("No se pudo Conectar a la BD, Intentelo mas tarde.","ModificarContrato.php");
        ?>
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