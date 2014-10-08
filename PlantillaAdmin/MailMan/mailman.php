<?php
	
	require "lib/mailer/class.phpmailer.php";
	require "lib/mailer/class.smtp.php";


	function __autoload($classname){
		$partes = explode("_", $classname);
		$file = "";
		for ($i=0; $i < count($partes); $i++) { 
			if($i == 0)
				$file .= strtolower($partes[$i]);
			else
				$file .= "/".strtolower($partes[$i]);
		}
		require $file.".class.php";
	}


	class MailMan{

		private $asunto;
		private $mensaje;
		private $destinatarios;
		private $db;
		private $num_receptores;
		private $usu_id;
		private $mailer;
		private $mensaje_id;


		public function __construct($usu_id,$recep,$remitente, $nombre, $password){
			
			$this->usu_id = $usu_id;
			$this->db = new Lib_BaseDatos();
			$this->mailer = new PHPMailer();
			$this->mailer->isSMTP();
			$this->mailer->SMTPAuth = true;
			$this->mailer->SMTPSecure = "ssl";                 
			$this->mailer->Host       = "smtp.gmail.com";      
			$this->mailer->Port       = 465;  
			$this->mailer->SetFrom($remitente, $nombre);
			$this->mailer->Username = $remitente;
			$this->mailer->Password = $password;
			$this->num_receptores = $recep;
			$this->destinatarios = array();
			ini_set('max_execution_time',3*$this->num_receptores);
			$this->carga_receptores();

			                 
		}

		private function carga_receptores(){
			$sql = "SELECT * FROM receptor WHERE rec_correo IN (SELECT rec_correo FROM aporta WHERE usu_rut='".$this->usu_id."') ORDER BY RANDOM() LIMIT ".$this->num_receptores;
			//echo $sql;
			$response = $this->db->select_query($sql);
			$tmp = $this->num_receptores;
			$flag = false;
			if(is_array($response)){
				if(count($response) < $tmp){
					$tmp -= count($response);
					$flag = true;
					foreach ($response as $key => $value) {
						$this->destinatarios[] = $value;
					}
				}
			}
			$sql = "SELECT * FROM receptor WHERE rec_correo NOT IN(SELECT rec_correo FROM aporta WHERE usu_rut='".$this->usu_id."') ORDER BY RANDOM() LIMIT ".$tmp;
			//echo $sql;
			$response = $this->db->select_query($sql);
			if(is_array($response)){
				foreach ($response as $key => $value) {
					$this->destinatarios[] = $value;
				}

			}

		}

		/* PUBLIC INTERFACE */


		public function set_mensaje($mensaje_id){
			$this->mensaje_id = $mensaje_id;
			$sql = "SELECT * FROM mensaje WHERE men_id=$mensaje_id";
			//echo $sql;
			$response = $this->db->select_query($sql);
			$this->mailer->MsgHTML($response[0]->men_cuerpo);
			$this->mailer->Subject = $response[0]->men_asunto;
		}

		public function set_remitente($rem,$nombre){
			$this->mailer->SetFrom($rem,$nombre); 		
		}

		public function set_numero_destinatarios($num){
			$this->num_receptores = $num;
		}

		public function set_usuario_id($id){
			$this->usu_id = $id;
		}

		public function enviar_correos(){

			$flag = true;
			//print_r($this->destinatarios);
			
			foreach ($this->destinatarios as $key => $value) {
				$this->mailer->ClearAddresses();
				$this->mailer->AddAddress($value->rec_correo);
				if($this->mailer->Send()){
					$sql = "INSERT INTO recibe VALUES('".$value->rec_correo."',".$this->mensaje_id.",DATE('".date("Y-m-d")."'))";
					$this->db->insert_query($sql);
					$sql = "UPDATE usuario SET usu_enviados = 1 + usu_enviados WHERE usu_rut='".$this->usu_rut;
					$this->db->insert_query($sql);
					sleep(2);
					echo "enviado a ".$value->rec_correo;
				}
				else{
					echo "Error mandando a ".$value->rec_correo;
					$flag = false;
					break;
				}
			}
			return $flag;
		}


	}


?>