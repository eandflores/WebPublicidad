<?PHP
	function cabesera(){ // Esta funcion depliega la barra superior de la pagina 
		echo '
		<div class="navbar navbar-fixed-top"> 
            <div class="navbar-inner">
                <div class="container">
                    <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </a>       
                    <a class="brand" href="http://clouder.cl/" target="_blanc" ><img src="Imagenes/MG_Clouder.jpg"></a>
                        <div class="nav-collapse" id="main-menu">
                            <ul class="nav" id="main-menu-left">
                                <li><a onclick="pageTracker._link(this.href); return false;" href="indexUsuario.php">Inicio</a></li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Gestión de correos<b class="caret"></b></a>
                                        <ul class="dropdown-menu" id="swatch-menu">
                                            <li><a href="redactarCorreo.php">Redactar</a></li>
                                            <li><a href="borrarCorreos.php">Eliminar</a></li>
                                            <li><a href="correosGuardados.php">Borrador</a></li>
                                            <li><a href="correosEnviados.php">Enviados</a></li>
                                        </ul>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Gestión de direcciones<b class="caret"></b></a>
                                        <ul class="dropdown-menu" id="swatch-menu">
                                            <li><a href="aportarDireccion.php">Importar dirección individual</a></li>
                                            <li><a href="aportarDirecciones.php">Importar dirección por excel</a></li>
                                        </ul>
                                </li>
                                <li class="dropdown">
                                    <a class="dropdown-toggle" data-toggle="dropdown" href="#">Estado de cuenta<b class="caret"></b></a>
                                        <ul class="dropdown-menu" id="swatch-menu">
                                            <li><a href="verCuenta.php">Mostrar información</a></li>
                                            <li><a href="cambiarNombre.php">Cambiar nombre de usuario</a></li>
                                            <li><a href="cambiarContrasenia.php">Cambiar contraseña</a></li>
                                            <li><a href="verPlan.php">Ver planes vigentes</a></li>
                                            <li><a href="renunciarPlan.php">Renunciar a plan</a></li>
                                        </ul>
                                </li>
                            </ul>
                            <ul class="nav pull-right" id="main-menu-right">
                                <li><a data-original-title="CERRAR SESIÓN" rel="tooltip" href="../index-proyecto/index.php" >salir <i class="icon-share-alt"></i></a></li>
                            </ul>
                        </div>
                </div>
            </div>
        </div>';
	}
	
    function pie(){
		echo '
        <script src="Bootswatch%20%20United_files/jquery.js"></script>
        <script src="Bootswatch%20%20United_files/bootstrap.js"></script>
        <script src="Bootswatch%20%20United_files/application.js"></script>
        <script src="Bootswatch%20%20United_files/bootswatch.js"></script>
        <script src="Bootswatch%20%20United_files/bsa.js"></script>
        <script type="text/javascript" src="script_javascript/whizzywig61.js"></script>    
        <script type="text/javascript" src="script_javascript/espanol.js"></script>';

        
	}

    function conectar_db(){ // esta función realiza la coneccion con la base de datos
        $conexion = pg_connect("host=localhost dbname=Spam port=5432 user=postgres password='' ");
        return $conexion;
    }

    function desconectar_db($conexion){ // esta función realiza la desconeccion con la base de datos
        return pg_close($conexion);
    }
    
    function fecha_actual(){ // esta función la fecha actual en formato date
        $dia = date("d");
        $mes = date("m");
        $agno = date("Y");
        
        return $dia."/".$mes."/".$agno;
    }

    function alerta_javascript_direccionado($mensaje,$web){
        echo "<script language=javascript>
                alert('". $mensaje ."')
                document.location=('". $web ."')
            </script>";
    }


    function comprobar_email($email){ // esta funcion es la encarda de ver si la estructura o sintaxis de la direccion del correo electronico sea correcta
    $mail_correcto = 0;
    //compruebo unas cosas primeras
    if ((strlen($email) >= 6) && (substr_count($email,"@") == 1) && (substr($email,0,1) != "@") && (substr($email,strlen($email)-1,1) != "@")){
       if ((!strstr($email,"'")) && (!strstr($email,"\"")) && (!strstr($email,"\\")) && (!strstr($email,"\$")) && (!strstr($email," "))) {
          //miro si tiene caracter .
          if (substr_count($email,".")>= 1){
             //obtengo la terminacion del dominio
             $term_dom = substr(strrchr ($email, '.'),1);
             //compruebo que la terminación del dominio sea correcta
             if (strlen($term_dom)>1 && strlen($term_dom)<5 && (!strstr($term_dom,"@")) ){
                //compruebo que lo de antes del dominio sea correcto
                $antes_dom = substr($email,0,strlen($email) - strlen($term_dom) - 1);
                $caracter_ult = substr($antes_dom,strlen($antes_dom)-1,1);
                if ($caracter_ult != "@" && $caracter_ult != "."){
                   $mail_correcto = 1;
                }
             }
          }
       }
    }
    if ($mail_correcto)
       return 1;
    else
       return 0;
    } 
?>