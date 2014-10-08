<?php

	class Lib_BaseDatos{

		private $link;

		function __construct($dataBase=null){
			$this->link = pg_connect("host=192.168.1.116 port=5432 dbname=Spam user=postgres password=zec2012");
			if($this->link==null)
				$this->link = "ERROR CONEXION";
		}

		public function select_query($strQuery){
			$response = pg_query($this->link,$strQuery);

			if(pg_num_rows($response) >= 1){
				$datas = array();
				while($tmp = pg_fetch_object($response)){
					array_push($datas,$tmp);
				}
				return $datas;
			}
			else
				return $strQuery;
		}

		public function insert_query($strQuery){
			pg_query($this->link,$strQuery);
			if(pg_affected_rows() > 0)
				return true;
			else
				return false;
		}

	}

?>