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
        <title>Cambiar contraseña</title>
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
                                <legend>CAMBIAR CONTRASEÑA</legend>
                                    <!--Este formulario permite cambiar la contraseña actual que posee el usuario-->
                                    <form action="validarCambiarContrasenia.php" method="post">
                                        <div class="control-group">
                                            <label class="control-label" for="input01">Ingrese contraseña actual</label>
                                            <div class="controls">
                                                <input class="input-xlarge" id="inputact" name="contraseniaAct" placeholder="Contraseña" type='password' required>
                                            </div>
                                        </div>
                                        
                                        <div class="control-group">
                                            <label class="control-label" for="input01">Ingrese nueva contraseña</label>
                                            <div class="controls">
                                                <input class="input-xlarge" id="inputNew" name="contraseniaNew" placeholder="Nueva Contraseña" type='password' required>
                                            </div>
                                        </div>

                                        <div class="control-group">
                                            <label class="control-label" for="input01">Repita nueva contraseña</label>
                                            <div class="controls">
                                                <input class="input-xlarge" id="inputRep" name="contraseniaNewRep" placeholder="Nueva Contraseña" type='password' required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions">
                                             <!--Envia la informacion ingresada a validarCambiarContraseña.php y si no, la cancela-->
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