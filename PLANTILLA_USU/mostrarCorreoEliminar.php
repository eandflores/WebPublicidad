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
        <title>Correos enviados</title>
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
                                <legend>CORREOS ENVIADOS</legend>
                                    <form action="borrarCorreos.php" method="post">
                                        <div id="mostrar">
                                            <h3><font color="8B1717">Asunto:</font>
                                                
                                            <?php
                                                $mensaje_id = $_GET["valor"]; // optenemos el id del mensaje que queremos mostrar
                                                $conexion = conectar_db(); // realizamos la coneccion a la base de datos 
                                                $query = "SELECT * FROM mensaje"; // selecctionamos todos los mensajes
                                                $rs = pg_query($query);     
                                        
                                                while($fila = pg_fetch_array($rs)){
                                                    if ($fila["men_id"] == $mensaje_id) { // realizamos la busqueda del mensaje seleccionado
                                                        echo $fila["men_asunto"] ; // mostramos el asunto
                                                        echo "<br />";
                                            ?>
                                            <font color="8B1717">Mensaje:</font>
                                            </h3>
                                            <p class="lead">
                                            <?php
                                                        echo $fila["men_cuerpo"] ; // posteriormente mostramos el cuerpo del mensaje
                                                    }
                                                }
                                                
                                            ?>
                                            </p>
                                        </div> <!--Luego se oprime ok si se quiere volver a la pagina anterior-->
                                        <button type="submit" class="btn btn-primary">OK</button>
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