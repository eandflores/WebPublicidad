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
        <title>Redactar correo</title>
        <link href="Bootswatch%20%20United_files/bootstrap.css" rel="stylesheet">
        <link href="Bootswatch%20%20United_files/bootstrap-responsive.css" rel="stylesheet">
        <link href="Bootswatch%20%20United_files/bootswatch.css" rel="stylesheet">
        <link rel="stylesheet" type="text/css" href="cssMail/estilos.css">

        <link rel="shortcut icon" href="imagenes/logo.jpg">
    </head>
    <body class="preview" data-spy="scroll" data-target=".subnav" data-offset="80" onload="whizzywig()">
  
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
                                <form action="enviarMensaje.php" method="post">
                                    
                                    <legend>REDACCIÓN DE CORREOS</legend>
                                    <div class="control-group">
                                        <label class="control-label" for="input01">Asunto</label>
                                        <div class="controls">
                                            <input class="input-xlarge" name="asunto" placeholder="Asunto" required="" type="text">
                                            
                                        </div>
                                        
                                        <div>
                                            <label class="control-label" for="input01">Contenido</label>
                                            <section id="principal">
                                                <textarea id="edited" name="contenido"></textarea>

                                            </section>
                                        </div>
                                    </div>
                                    <!--Envia la informacion ingresada a enviarMensaje.php-->
                                    <button type="submit" class="btn btn-primary" name="opcion1" value="uno" id="opcion1">Enviar</button>
                                    <button type="submit" class="btn btn-primary" name="opcion1" value="dos" id="opcion2">guardar</button>            
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