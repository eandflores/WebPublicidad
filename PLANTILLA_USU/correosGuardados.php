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
        <title>Correos guardados</title>
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
                                <legend>CORREOS GUARDADOS</legend>
                                <label class="checkbox">
                                    <table class="table table-bordered table-striped table-hover">
                                    <thead>
                                        <tr>
                                            <th>Asunto</th>
                                        </tr>
                                    </thead>
                                    
                                    <?php
                                    $conexion = conectar_db(); // realizamos la coneccion a la base de datos 
                                    $query = "SELECT * FROM mensaje";    // Selecionamos todos los mensajes existentes                 
                                    $rs = pg_query($query);     
                            
                                    while($fila = pg_fetch_array($rs)){
                                            if($fila["men_estado"] == 'GUARDADO' ){ // Filtramos y mostramos solamente los mensajes guardados
                                    ?>
                                                <tbody>
                                                            <tr> <!--Aqui seleccionamos el correo guardado para posteriormente el usuario pueda continuar redactandolo-->
                                                                <td id="asunto"><a href="mostrarCorreoGuardado.php?valor=<?PHP echo $fila["men_id"]?>"><?PHP echo $fila["men_asunto"] ?></a></td>
                                                                <td><?PHP echo $fila["men_estado"] ?></td>
                                                            </tr>
                                                        </tbody>
                                    <?PHP
                                            }
                                        }
                                    ?>


                                </table>
                                
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