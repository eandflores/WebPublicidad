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

        if($con){ 
          $Rut=$_POST['Rut'];
          $Nombre=$_POST['Nombre'];
          $ApellidoPa= $_POST['ApellidoPa'];
          $ApellidoMa=$_POST['ApellidoMa'];
          $Nick= $_POST['Nick'];
          $Password=$_POST['Password'];
          $Email= $_POST['Email'];
          $Tipo= $_POST['select1'];

          $consulta = "SELECT * FROM usuario WHERE '$Rut' = usu_rut";
          $resultado=pg_query($consulta);
          
          if(pg_num_rows($resultado) == 0){
            $veruser = "SELECT * FROM usuario WHERE '$Nick' = usu_user";
            $res = pg_query($veruser);

            if(pg_num_rows($res) == 0){
              
              if($Tipo=="ADMINISTRADOR"){
                $consulta="INSERT INTO usuario(usu_rut,usu_nombre,usu_apellidopa,usu_apellidoma,usu_user,usu_pasword,usu_email,usu_estado,usu_tipo,usu_enviados) 
                VALUES('$Rut','$Nombre','$ApellidoPa','$ApellidoMa','$Nick','$Password','$Email',true,'$Tipo',0)";
                $resultado = pg_query($consulta);
              }
              else{
                $consulta="INSERT INTO usuario(usu_rut,usu_nombre,usu_apellidopa,usu_apellidoma,usu_user,usu_pasword,usu_email,usu_estado,usu_tipo,usu_enviados) 
                VALUES('$Rut','$Nombre','$ApellidoPa','$ApellidoMa','$Nick','$Password','$Email',false,'$Tipo',0)";
                $resultado = pg_query($consulta);
              }
              
              alerta_javascript_direccionado("Usuario Registrado Exitosamente.","AgregarUser.php");
                
            }
            else
             alerta_javascript_direccionado("Nombre de usuario ya esta registrado","AgregarUser.php");
               
            
          }
          else{
            alerta_javascript_direccionado("El usuario ya existe en la base de datos","AgregarUser.php");
            
          }

            Desconectar($con);
          
        }
        else
          alerta_javascript_direccionado("No se pudo Conectar a la BD, Intentelo mas tarde.","AgregarUser.php");
      ?>
    </div>
  </div>
  	
  	<script src="js/jquery-1.7.2.js"></script>
  	<script src="js/bootstrap.js"></script>

</body>