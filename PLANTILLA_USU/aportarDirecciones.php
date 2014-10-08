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
        <title>Aportar direcciones</title>
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
                                <form action="validarAportarDirecciones.php" name="importa" method="post" enctype="multipart/form-data">
                                    <legend>APORTAR DIRECCIONES</legend>
                                        <p>Las columnas de la hoja excel deben poseer el siguiente formato</p>
                                        <h5>| Correo | Nombre | Apellido | Dirección | Teléfono | </h6>
                                        <br> <!--definimos el formato de como debe ser creado el excel-->
                                        <br>
                                    <div class="control-group"> <!--Esta entrada se encarga de buscar y entregar el archivo-->
                                        <label class="control-label" for="fileInput">Ingresar excel</label>
                                        <div class="controls">
                                            <input type="file" name="excel" required/>
                                        </div>
                                    </div>

                                    <div class="form-actions">
                                        <!--Envia la informacion ingresada a validarAportaDirecciones.php-->                                        
                                        <input type="hidden" value="upload" name="action" />
                                        <button type="submit" name='enviar' class="btn btn-primary">Enviar</button>
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