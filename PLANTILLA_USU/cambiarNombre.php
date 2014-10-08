<!DOCTYPE html>
<?PHP
    session_start();
    
    if( !(isset($_SESSION['user'])) || $_SESSION['cargo'] == 'ADMINISTRADOR'){       
        header("Location: ../index-proyecto/index.php"); // Este if cerciora que el que ingresa no sea administrador
    }
    include "funciones.php"; 
?>
<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <title>Cambiar nombre usuario</title>
        <link href="Bootswatch%20%20United_files/bootstrap.css" rel="stylesheet">
        <link href="Bootswatch%20%20United_files/bootstrap-responsive.css" rel="stylesheet">
        <link href="Bootswatch%20%20United_files/bootswatch.css" rel="stylesheet">
        <link rel="shortcut icon" href="imagenes/logo.jpg">
    </head>
    <body class="preview" data-spy="scroll" data-target=".subnav" data-offset="80">
  
        <!--=======================================CABEZA================================-->
        <?PHP cabesera() ?> <!--Esta funcion depliega la barra superior de la pagina -->
        <!--=======================================CUERPO================================-->

        <div class="container">
            <center>
                <section id="typography">
                <!-- Headings & Paragraph Copy -->
                    <div class="row">
                        <div class="well"> 

                            <fieldset align=left>
                                <legend>CAMBIAR NOMBRE DE USUARIO</legend>
                                    <!--Este formulario se encarga de cambiar el nombre de usuario del usuario actual-->
                                    <form action="validarCambiarNombre.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="input01">Ingrese nuevo nombre de usuario</label>
                                            <div class="controls">
                                                <input class="input-xlarge" id="input01" placeholder="Nuevo nombre usuario" maxlength="10" type="text" name="usernuevo" required>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group"> <!--Se usa la contraseña como verificacion de seguridad-->
                                            <label class="control-label" for="input01">Ingrese contraseña</label>
                                            <div class="controls">
                                                <input class="input-xlarge" id="input01" placeholder="Contraseña" type='password' name="contrasenia" required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions">
                                             <!--Envia la informacion ingresada a validarCambiarNombre.php y si no, la cancela-->
                                            <button type="submit" class="btn btn-primary">Cambiar</button>
                                            <button type="reset" class="btn">Cancelar</button>
                                        </div>
                                    </form>
                            </fieldset>
                        </div> 
                    </div>
                </section>
            </center>
        </div>
        <!--=======================================PIE================================-->
        <?PHP pie() ?> <!--Esta funcion agrega los script utilizados en la pagina-->

    </body>
</html>