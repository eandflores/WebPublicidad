<!DOCTYPE html>
<?PHP
    session_start();
    if( !(isset($_SESSION['user'])) || $_SESSION['cargo'] == 'ADMINISTRADOR'){       
        header("Location: ../index-proyecto/index.php"); // Este if cerciora que el que ingresa no sea administrador
    }
    include "funciones.php"; 
    $conexion = conectar_db();
    $rutSecion = $_SESSION['rut'];
    $query = "SELECT * FROM contrato WHERE usu_rut = '$rutSecion'";
    $rs = pg_query($query);
    
    if(pg_num_rows($rs) == 0){
        alerta_javascript_direccionado("Usted no posee plan inscrito",
                                                    "indexUsuario.php");
    }
    desconectar_db($conexion);
?>

<html lang="en">
    <head>
        <meta http-equiv="content-type" content="text/html; charset=UTF-8"> 
        <title>Renunciar plan</title>
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
                                <legend>RENUNCIAR A PLAN</legend>
                                <form action="estaSeguro.php" method="post">
                                        <div id="informacion">
                                            <legend>Usted posee el plan</legend>
                                            <?PHP
                                                $conexion = conectar_db(); // realizamos la coneccion a la base de datos 
                                                $query = "SELECT * FROM usuario"; // seleccionamos a todos los usuarios                  
                                                $rs = pg_query($query);  

                                                while($fila = pg_fetch_array($rs)){
                                                    if ($fila["usu_rut"] == $_SESSION['rut']) { // buscamos solamente el usuario ingresado actualmente en el sistema
                                            
                                                        $querydos = "SELECT * FROM contrato";   // luego buscamos el contrato al cual esta ligado ese usuario
                                                        $rsdos = pg_query($querydos);   

                                                        while($filados = pg_fetch_array($rsdos)){

                                                            if($fila["usu_rut"] == $filados["usu_rut"]){ // y asi el plan el cual esta en el contrato
                                                                $querytres = "SELECT * FROM plan";                       
                                                                $rstres = pg_query($querytres);   

                                                                while($filatres = pg_fetch_array($rstres)){
                                                                    if($filados["plan_id"] == $filatres["plan_id"]){
                                                                        echo $filatres["plan_nombre"]; // teniendo ya el plan se muestra el nombre de este
                                            ?>
                                             <!--Guardamos el id de este plan-->
                                            <?php
                                                                                            
                                                                    }
                                                                }
                                                            }
                                                        }
                                                    }
                                                }                                              
                                                desconectar_db($conexion);  
                                            ?>
                                        </div>
                                        
                                        <div class="control-group"> <!--Con esto hacemos que la renuncia sea más segura verificando 
                                            la contraseña del usuario actualmente ingresado-->
                                            <label class="control-label" for="input01">Ingrese contraseña para confirmar</label>
                                            <div class="controls">
                                                <input class="input-xlarge" name="contrasenia" placeholder="Contraseña" id="input01" type='password' required>
                                            </div>
                                        </div>
                                        
                                        <div class="form-actions">
                                            <!--Envia la informacion ingresada a validarRenunciarPlan.php-->
                                            <button type="submit" class="btn btn-primary">renunciar</button>
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