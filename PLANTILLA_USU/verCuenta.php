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
        <title>Información cuenta</title>
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
                                <legend>INFORMACIÓN CUENTA</legend>
                                <table class="table table-bordered table-striped table-hover">
                                    
                                    <?PHP
                                        $conexion = conectar_db(); // realizamos la coneccion a la base de datos 
                                        $query = "SELECT * FROM usuario";  // seleccionamos a todos los usuarios               
                                        $rs = pg_query($query);  
                                    
                                        while($fila = pg_fetch_array($rs)){
                                            if ($fila["usu_rut"] == $_SESSION['rut']) { // buscamos solamente al usuario en sesión
                                    ?>
                                                    <tbody>
                                                        <tr>
                                                            <td>Nombre</td>
                                                            <td><?PHP echo $fila["usu_nombre"];?></td> <!--imprimimos su nombre-->
                                                        </tr>
                                                        <tr>
                                                            <td>Apellido materno</td>
                                                            <td><?PHP echo $fila["usu_apellidoma"];?></td> <!--imprimimos su apellido materno-->
                                                        </tr>
                                                        <tr>
                                                            <td>Apellido paterno</td>
                                                            <td><?PHP echo $fila["usu_apellidopa"];?></td>  <!--imprimimos su apellido paterno-->
                                                        </tr>
                                                        <tr>
                                                            <td>Rut</td>
                                                            <td><?PHP echo $fila["usu_rut"];?></td>  <!--imprimimos su rut-->
                                                        </tr>
                                                        <tr>
                                                            <td>Correo</td>
                                                            <td><?PHP echo $fila["usu_email"];?></td> <!--imprimimos su correo-->
                                                        </tr>
                                                        <tr>
                                                            <td>User</td>
                                                            <td><?PHP echo $fila["usu_user"];?></td>  <!--imprimimos su nombre de usuario-->
                                                        </tr>
                                                        <tr>
                                                            <td>Estado</td>
                                                            <td>  <!--imprimimos su estado-->
                                                                <?PHP 
                                                                    $estado = $fila["usu_estado"];
                                                                    if($estado == 'f'){
                                                                        $estado = 'No vigente';
                                                                    }
                                                                    else{
                                                                        $estado = 'Vigente';   
                                                                    }

                                                                    echo $estado;
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Plan inscrito</td>
                                                            <td>  <!--imprimimos su plan-->
                                                                <?PHP
                                                                    $querydos = "SELECT * FROM contrato";                       
                                                                    $rsdos = pg_query($querydos);   
                                                                    while($filados = pg_fetch_array($rsdos)){

                                                                        if($fila["usu_rut"] == $filados["usu_rut"]){
                                                                            $querytres = "SELECT * FROM plan";                       
                                                                            $rstres = pg_query($querytres);   

                                                                            while($filatres = pg_fetch_array($rstres)){
                                                                                if($filados["plan_id"] == $filatres["plan_id"]){
                                                                                    echo $filatres["plan_nombre"];
                                                                                    
                                                                                }
                                                                            }
                                                                        }
                                                                    }
                                                                ?>

                                                            </td>
                                                        </tr>
                                                        <tr>  <!--imprimimos cuando finaliza su plan-->
                                                            <td>Fin Plan</td>
                                                            <td>
                                                                <?PHP
                                                                    $querydos = "SELECT * FROM contrato";                       
                                                                    $rsdos = pg_query($querydos);   
                                                                    while($filados = pg_fetch_array($rsdos)){

                                                                        if($fila["usu_rut"] == $filados["usu_rut"]){
                                                                            echo $filados["plan_fechafin"];
                                                                        }
                                                                    }
                                                                ?>
                                                            </td>
                                                        </tr>
                                                        <tr>
                                                            <td>Correos restantes</td>
                                                            <td>  <!--imprimimos los correos restante que le quedan-->
                                                            <?PHP
                                                                $querydos = "SELECT * FROM contrato";                       
                                                                $rsdos = pg_query($querydos);   
                                                    
                                                                while($filados = pg_fetch_array($rsdos)){
                                                                    if($fila["usu_rut"] == $filados["usu_rut"]){
                                                                        $querytres = "SELECT * FROM plan";                       
                                                                        $rstres = pg_query($querytres);   

                                                                        while($filatres = pg_fetch_array($rstres)){
                                                                            if($filados["plan_id"] == $filatres["plan_id"]){
                                                                                $total = $filatres["plan_limmensajes"] - $fila["usu_enviados"];
                                                                                echo $total;
                                                                            
                                                                            }
                                                                        }
                                                                    }
                                                                }
                                                            ?>
                                                            </td>
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