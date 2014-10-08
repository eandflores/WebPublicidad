<!DOCTYPE html>
<?PHP
    session_start();
    if( !(isset($_SESSION['user'])) || $_SESSION['cargo'] == 'ADMINISTRADOR'){       
        header("Location: ../index-proyecto/index.php"); // Este if cerciora que el que ingresa no sea administrador
    }
    include "funciones.php"; 
    
        $conexion = conectar_db(); // realizamos la coneccion a la base de datos 

        $contrasenia = $_POST['contrasenia']; // obtenemos la contraseña ingresada
        $rut_Cliente = $_SESSION['rut']; // obtenemos el rut del usuario en secion

        if($contrasenia != $_SESSION['contrasenia']){ // verificamos si la contraseña ingresada es correcta
        alerta_javascript_direccionado("Contraseña ingresada incorrecta",
                                        "renunciarPlan.php");
        }                         
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
                                <legend>¿ESTA SEGURO DE RENUNCIAR AL PLAN?</legend> <!--este formulario se encarga de ingresar
                                las opciones-->
                                    <p>La renuncia de plan desabilitara todo el ingreso que el usuario tenga con el sistema</p>
                                    <form action="validarRenunciarPlan.php" method="post">
                                        <input name="OPCION" value="SI" required="" type="radio">
                                        <p>SI</p>
                                        <input name="OPCION" value="NO" required="" type="radio">
                                        <p>NO</p>

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