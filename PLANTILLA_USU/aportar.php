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
        <title>Aportar Dirección(es)</title>
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
                        <div class="well"> <!--Aqui se muestran las 2 opciones que hay para aportas direcciones de correo
                            las cuales son por excel o manualmente (individualmente)-->
                            <a class="btn btn-large" data-original-title="IMPORTAR INDIVIDUALMENTE" rel="tooltip"  href="aportarDireccion.php" onclick="_gaq.push(['_trackEvent', 'click', 'outbound', 'builtwithbootstrap']);"><img src="Imagenes/IMPORTARIN.png"></a>
                            <a class="btn btn-large" data-original-title="IMPORTAR POR EXCEL" rel="tooltip" href="aportarDirecciones.php" onclick="_gaq.push(['_trackEvent', 'click', 'outbound', 'builtwithbootstrap']);"><img src="Imagenes/IMPORTAREX.png" id="logo"></a>
                        </div> 
                    </div>
                </section>
            </center>
        </div>
        <!--=======================================PIE================================-->
        <?PHP pie() ?> <!--Esta funcion agrega los script utilizados en la pagina-->

    </body>
</html>