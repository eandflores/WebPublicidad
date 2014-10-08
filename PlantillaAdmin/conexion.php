<?php
	function Conectar(){
		$con=pg_connect("host=192.168.1.116 dbname=Spam port=5432 user=postgres password=zec2012");
		if($con){
			return $con;			
		}
		else{
			return null;
		}
	}
	
	function Desconectar($conexion){
        return pg_close($conexion);
    }
?>