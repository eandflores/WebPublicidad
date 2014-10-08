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
            $usu_rut= $_POST['group1'];
                       
            $consulta="SELECT * FROM usuario WHERE usu_rut='$usu_rut'";
            $res = pg_query($consulta);
            
            if($res){
              for($i = 0; $i < pg_num_rows($res); $i++)
                    $row=pg_fetch_array($res);
        ?>
              <form action="ModificarUser3.php" class="form-horizontal" method="post">
              <legend>Modificar Usuario</legend>
              <div class="control-group success">
                <label class="control-label" for="inputRut">Rut</label>
                <div class="controls">
                  <input type="text" id="inputRut" name="Rut" value="<?php echo $row["usu_rut"]; ?>" maxlength="12" class="disabled" readonly required>
                </div>
              </div>
              <div class="control-group success">
                <label class="control-label" for="inputNombre">Nombre</label>
                <div class="controls">
                  <input type="text" id="inputNombre" name="Nombre" value="<?php echo $row["usu_nombre"]; ?>" maxlength="20" required>
                </div>
              </div>
              <div class="control-group success">
                <label class="control-label" for="inputApellidoPa">Apellido Paterno</label>
                <div class="controls">
                  <input type="text" id="inputApellidoPa" name="ApellidoPa" value="<?php echo $row["usu_apellidopa"]; ?>" maxlength="20" required>
                </div>
              </div>
              <div class="control-group success">
                <label class="control-label" for="inputApellidoMa">Apellido Materno</label>
                <div class="controls">
                  <input type="text" id="inputApellidoMa" name="ApellidoMa" value="<?php echo $row["usu_apellidoma"]; ?>" maxlength="20" required>
                </div>
              </div>
              <div class="control-group success">
                <label class="control-label" for="inputUser">Nombre de Usuario</label>
                <div class="controls">
                  <input type="text" id="inputUser" name="User" value="<?php echo $row["usu_user"]; ?>" maxlength="10" required>
                </div>
              </div>
              <div class="control-group success">
                <label class="control-label" for="inputPassword">Password</label>
                <div class="controls">
                  <input type="password" id="inputPassword" name="Password" value="<?php echo $row["usu_pasword"]; ?>" maxlength="10" required>
                </div>
              </div>
              <div class="control-group success">
                <label class="control-label" for="inputEmail">Email</label>
                <div class="controls">
                  <input type="email" id="inputEmail" name="Email" value="<?php echo $row["usu_email"]; ?>" maxlength="30" required>
                </div>
              </div>    
              <?php if($row["usu_tipo"]=="ADMINISTRADOR"){ ?>
              <div class="control-group success lista">
                <label class="control-label" for="inputEstado">Estado Usuario</label>
                <div class="controls">
                  <select id="select1" name="select1">
                    <?php if($row["usu_estado"]=='t'){ ?>
                            <option selected="selected" value="true">Hablitado</option>
                            <option value="false">Deshablitado</option>
                    <?php } 
                          else{
                    ?> 
                            <option selected="selected" value="false">Deshabilitado</option>
                            <option value="true">Habilitado</option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <?php } ?>
              <div class="control-group success lista">
                <label class="control-label" for="inputTipo">Tipo Usuario</label>
                <div class="controls">
                  <select id="select2" name="select2">
                    <?php if($row["usu_tipo"]=="CLIENTE"){ ?>
                            <option selected="selected" value="CLIENTE">Cliente</option>
                            <option value="ADMINISTRADOR">Administrador</option>
                    <?php }
                          else{
                    ?>
                            <option  selected="selected" value="ADMINISTRADOR">Administrador</option>
                            <option value="CLIENTE">Cliente</option>
                    <?php } ?>
                  </select>
                </div>
              </div>
              <div class="control-group success">
                <label class="control-label" for="inputEnvios">Envios</label>
                <div class="controls">
                  <input type="number" id="inputEnvios" name="Envios" value="<?php echo $row["usu_enviados"]; ?>"  min="0" required>
                </div>
              </div>
              <div class="control-group BotonForm">
                <div class="controls">
                  <button type="submit" class="btn btn-success">Actualizar</button>
                </div>
              </div>
              <div class="control-group">
                <div class="controls">
                  <button type="button" class="btn btn-danger" onclick="parent.location='ModificarUser.php'">Cancelar</button>
                </div>
              </div>
              </form>
        <?php
            }
            else
              alerta_javascript_direccionado("Ha ocurrido un Error y no pudo Encontrarse el Usuario, Intentelo mas tarde.","ModificarUser.php");

              Desconectar($con);
            }
            else
              alerta_javascript_direccionado("No se pudo Conectar a la BD, Intentelo mas tarde.","ModificarUser.php");
        ?>
    </div>
  </div>
    
    <script src="js/jquery-1.7.2.js"></script>
    <script src="js/bootstrap.js"></script>

</body>