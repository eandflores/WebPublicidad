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
      <form action="AgregarDestinatarios2.php" name="importa" method="post" enctype="multipart/form-data" class="Cuerpo">
        <legend>APORTAR DIRECCIONES</legend>
        <p>Las columnas de la hoja excel deben poseer el siguiente formato</p>
        <h5>| Correo | Nombre | Apellido | Dirección | Teléfono | </h6>
          <div class="control-group">
            <label class="control-label" for="fileInput">Ingresar excel</label>
            <div class="controls">
              <input type="file" name="excel" required/>
            </div>
          </div>
          
          <div class="form-actions">
            <input type="hidden" value="upload" name="action" />
            <button type="submit" name='enviar' class="btn btn-primary">Enviar</button>
         </div>
      </form>
    </div>
  </div>
  	
  	<script src="js/jquery-1.7.2.js"></script>
  	<script src="js/bootstrap.js"></script>

</body>