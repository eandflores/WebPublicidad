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
        <title>Contratar plan</title>
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
                                <legend>PLANES VIGENTES</legend>

                                <div id="informacion">
                                    <legend>¿Como funcionan?</legend>
                                        <p>Estos tipos de planes permiten al usuario enviar correos por medio de Spam 
                                            a una cantidad definidas de direcciones de correos electrónicos, proporcionando 
                                            una propagación fácil, dinámica y segura de sus mensajes.
                                            <br>
                                            <br>
                                            Cada plan contiene una cantidad limitada de mensajes en proporción al costo 
                                            de este, dependiendo del bolsillo del cliente que adjudicara el contrato de 
                                            nuestros servicios.</p>
                                </div>
                                <legend>PLANES</legend>
 
                                <?PHP
                                    $conexion = conectar_db(); // realizamos la coneccion a la base de datos 
                                    $query = "SELECT * FROM plan"; // seleccionamos todos los planes
                                    $rs = pg_query($query);     
                                    
                                    while($fila = pg_fetch_array($rs)){ // con esto mostramos los datos de cada plan
                                ?>
                                        <table class="table table-bordered table-striped table-hover">
                                                        <tr><td id="uno">Nombre</td> 
                                                            <td><?PHP echo $fila["plan_nombre"];?></td>  <!--mostramos el nombre-->

                                                        </tr>
                                                        <tr>
                                                            <td id="uno">Precio</td>
                                                            <td><?PHP echo $fila["plan_precio"];?></td> <!--mostramos el presio-->
                                                        </tr>   
                                                        <tr>
                                                            <td id="uno">Descripcion</td>
                                                            <td><?PHP echo $fila["plan_descripcion"];?></td> <!--mostramos la descripcion-->
                                                        </tr>  
                                                        <tr>
                                                            <td id="uno">Cantidad de direcciones</td>
                                                            <td><?PHP echo $fila["plan_limcorreos"];?></td> <!--mostramos la cantidad de direcciones que posee este plan como limite-->
                                                        </tr>  
                                                        <tr>
                                                            <td id="uno">Cantidad de mensajes</td>
                                                            <td><?PHP echo $fila["plan_limmensajes"];?></td> <!--mostramos la cantidad de mensajes que posee este plan como limite-->
                                                        </tr>  
                                                    </table>
                                <?PHP
                                    }
                                ?>
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