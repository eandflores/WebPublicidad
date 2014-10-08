<?php

    session_start();
    #Llamado a funciones
    include "funciones.php";

    $action = $_POST["action"];
    $rut_Cliente = $_SESSION['rut'];
    if ($action == "upload"){
        //cargamos el archivo al servidor con el mismo nombre
        //solo le agregue el sufijo bak_
        $archivo = $_FILES['excel']['name'];
        $trozos = explode(".", $archivo); 
        $extension = end($trozos);  
        $tipo = $_FILES['excel']['type'];
        $destino = "bak_".$archivo;

        // Con este if validamos que la extencion del archivo  ingresado sea el correcto
        if ($extension == 'xls' || $extension == 'xml' || $extension == 'xlt' || $extension == 'xla' || $extension == 'xlsx'
            || $extension == 'xlsb' || $extension == 'xlsm' || $extension == 'xltx' || $extension == 'xltm' || $extension == 'xlam') {
            
                if (copy($_FILES['excel']['tmp_name'],$destino))  alerta_javascript_direccionado("Correos enviados exitosamente",
                                                                                              "aportarDirecciones.php");
                
                else alerta_javascript_direccionado("Error al cargar el archivo",
                                                "aportarDirecciones.php");

                ////////////////////////////////////////////////////////

                if (file_exists ("bak_".$archivo)){
                
                    /** Clases necesarias */
                    require_once('../Classes/PHPExcel.php');
                    require_once('../Classes/PHPExcel/Reader/Excel2007.php');
                        
                    // Cargando la hoja de cálculo
                    $objReader = new PHPExcel_Reader_Excel2007();
                    $objPHPExcel = $objReader->load("bak_".$archivo);
                    $objFecha = new PHPExcel_Shared_Date();

                    // Asignar hoja de excel activa
                    $objPHPExcel->setActiveSheetIndex(0);

                    //conectamos con la base de datos
                    $conexion = pg_connect("host=192.168.1.116 dbname=Spam port=5432 user=postgres password=zec2012");

                    // Llenamos el arreglo con los datos  del archivo xlsx
                    $bandera = 0;

                    for ($i=1;$bandera == 0 ;$i++){
                        $verificarEspacio = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
                        
                        if($verificarEspacio != null){
                        $_DATOS_EXCEL[$i]['correo'] = $objPHPExcel->getActiveSheet()->getCell('A'.$i)->getCalculatedValue();
                        $_DATOS_EXCEL[$i]['nombre'] = $objPHPExcel->getActiveSheet()->getCell('B'.$i)->getCalculatedValue();
                        $_DATOS_EXCEL[$i]['apellido']= $objPHPExcel->getActiveSheet()->getCell('C'.$i)->getCalculatedValue();
                        $_DATOS_EXCEL[$i]['direccion']= $objPHPExcel->getActiveSheet()->getCell('D'.$i)->getCalculatedValue();
                        $_DATOS_EXCEL[$i]['telefono'] = $objPHPExcel->getActiveSheet()->getCell('E'.$i)->getCalculatedValue();
                        }
                        else{
                            $bandera = 1; 
                        }
                    }
                }

                //si por algo no cargo el archivo bak_
                else{echo "Necesitas primero importar el archivo";}

                $errores=0;

                //recorremos el arreglo multidimensional
                //para ir recuperando los datos obtenidos
                //del excel e ir insertandolos en la BD

                foreach($_DATOS_EXCEL as $campo => $valor){
                    $query = "INSERT INTO receptor VALUES ('(correo)','(nombre)','(apellido)','(direccion)','(telefono)');";
                    if (comprobar_email($valor['correo']) == 1) {
                        $query = str_replace('(correo)',$valor['correo'], $query);
                        $query = str_replace('(nombre)',$valor['nombre'], $query);
                        $query = str_replace('(apellido)',$valor['apellido'], $query);
                        $query = str_replace('(direccion)',$valor['direccion'], $query);
                        $query = str_replace('(telefono)',$valor['telefono'], $query);

                        $rs = pg_query($query);
                            if (!$rs){ echo "Error al insertar registro ".$campo;$errores+=1;}

                        $correo = $valor['correo'];
                        $query1 = "INSERT INTO aporta
                                            VALUES ('$rut_Cliente','$correo','".fecha_actual()."');";
                        $rs1 = pg_query($query1);
                    }
                    
                }
        }
        else{
            alerta_javascript_direccionado("El tipo de archivo no corresponde",
                                        "aportarDirecciones.php");
        }
                    /////////////////////////////////////////////////////////////////////////

        
        //una vez terminado el proceso borramos el
        //archivo que esta en el servidor el bak_
        pg_close($conexion);
        unlink($destino);
    }

?>