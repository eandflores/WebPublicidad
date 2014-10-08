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
        <title>Aportar dirección</title>
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
                                <legend>APORTAR DIRECCIÓN</legend> <!--este formulario se encarga de ingresar
                                las direcciones individualmente-->
                                    <form action="validarAportarDireccion.php" method="post">
                                        <label class="control-label">Ingresar correo</label>
                                        <input class="input-xlarge" name="correo" placeholder="alguien@example.com" id="input01" type="text" required>
                                        
                                        <label class="control-label">Ingresar nombre</label>
                                        <input class="input-xlarge" name="nombre" placeholder="nombre" id="input01" type="text" >
                                        
                                        <label class="control-label">Ingresar apellido</label>
                                        <input class="input-xlarge" name="apellido" placeholder="apellido" id="input01" type="text" >
                                        
                                        <label class="control-label">Ingresar dirección</label>
                                        <input class="input-xlarge" name="direccion" placeholder="dirección" id="input01" type="text" >
                                        
                                        <label class="control-label">Ingresar telefono</label>
                                        <input class="input-xlarge" name="telefono" placeholder="telefono" id="input01" type="text" >
                                        
                                        <div class="form-actions">
                                             <!--Envia la informacion ingresada a validarAportaDireccion.php-->
                                            <button type="submit" class="btn btn-primary">Enviar</button>
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