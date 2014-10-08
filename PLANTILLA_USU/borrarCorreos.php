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
        <title>Borrar correos</title>
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
                                <legend>BORRAR DE CORREOS</legend>
                                <form action="validarBorrarCorreos.php" method="post">
                                    <table class="table table-bordered table-striped table-hover">
                                        <thead>
                                            <tr>
                                                <th>#</th> <!--Columna donde se selecciona los datos a eliminar-->
                                                <th>Asunto</th> <!--Columna de los asuntos de los correos a eliminar-->
                                            </tr>
                                        </thead>

                                        <?PHP
                                            $conexion = conectar_db(); // realizamos la coneccion a la base de datos 
                                            $query = "SELECT * FROM mensaje";  // Muestra todo los mensajes existente                     
                                            $rs = pg_query($query);     
                                         
                                            while($fila = pg_fetch_array($rs)){
                                                if($fila["men_estado"] != 'PENDIENTE' ){ // Esto filtra todos los mensajes existentes esepto los PENDIENTES
                                        ?>
                                                <tbody>
                                                    <tr> <!--Esta entrada permite la seleccion del mensaje mediante checkbox-->
                                                        <td id="seleccion"><input type="checkbox" name="casilla[]" value="<?PHP echo $fila["men_id"]?>"></td> 
                                                        <!--Esto muestra el asunto del mensaje a eliminar y al mismo tiempo da la posibilidad de
                                                        poder mostrarlo-->
                                                        <td id="asunto"><a href="mostrarCorreoEliminar.php?valor=<?php echo $fila["men_id"]?>"><?PHP echo $fila["men_asunto"] ?></a></td>
                                                        <td>            <?PHP echo $fila["men_estado"];?></td>    
                                                    </tr>
                                                </tbody>
                                        <?PHP
                                                }
                                            }
                                        ?>

                                    </table>

                                    <div class="form-actions">
                                        <!--Envia la informacion ingresada a validarBorrarCorreos.php-->
                                        <button type="submit" class="btn btn-primary">Borrar</button>
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