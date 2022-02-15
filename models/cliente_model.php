<?php

use function PHPSTORM_META\type;

class cliente_model{
        private $db;
        private $clientes;
        private $procedencia;
        private $clientes2;
        public function __construct(){
            $this ->db = connect::connection();
            $this->clientes = array();
            $this->procedencia = array();
            $this->tipoDocumento = array();

        }

        public function getinfoProcedencia(){
            
			$sql = "SELECT id,nombre FROM procedencia";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->procedencia[] = $row;
			}
			return $this->procedencia;

        }

        public function getinfotipodocumento(){
            
			$sql = "SELECT id,nombre FROM tipodocumento";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->tipoDocumento[] = $row;
			}
			return $this->tipoDocumento;
            
        }



        private function createCredencials($id,$user,$password){

           $sql = "INSERT INTO `guiasalamano`.`credenciales` (`id`, `user`, `password`) VALUES ('$id', '$user', '$password');";
 
           $res = $this->db->query($sql);

           if ($res === false) {
            echo " <p class='text-white'> SQL Error en credenciales: " .$this->db->error."</p>";
          }

          return $res;
        }


        public function registrar_cliente($nombres,$apellidos,$documento,$celular,$edad,$email,$procedencia_id,$tipodocumento_id,$user,$password){
            
            if($this->createCredencials($documento,$user,$password)){

                $sql = "INSERT INTO cliente (`nombres`, `apellidos`, `documento`, `celular`, `edad`, `email`, `estado`, `procedencia_id`, `tipodocumento_id`, `Roles_id`, `credenciales_id`)
                VALUES ('$nombres', '$apellidos', '$documento', '$celular', '$edad', '$email', 'activo', '$procedencia_id', '$tipodocumento_id', 1, '$documento');";

                $res = $this->db->query($sql);
    
                if ($res === false) {
                    echo "<br> <p class='text-white'> SQL Error en registrar: " .$this->db->error."</p>";
                }
            }


        }

        public function getInfoCliente($id){

            $sql = "
            SELECT cliente.nombres,cliente.apellidos,cliente.documento,cliente.celular,cliente.edad,cliente.email,
            procedencia.nombre as procedencia ,tipodocumento.nombre as tipo_documento,credenciales.user,credenciales.password
            FROM cliente,procedencia,tipodocumento,credenciales WHERE credenciales.id = cliente.documento AND
                                                                      cliente.procedencia_id = procedencia.id AND
                                                                      cliente.tipodocumento_id = tipodocumento.id AND
                                                                      cliente.id ='$id';
            ";


            $res = $this->db->query($sql);
            
            if ($res === false) {
                echo "<br> <p class='text-white'> SQL Error en registrar: " .$this->db->error."</p>";
            }

            while($row = $res->fetch_assoc())
			{
				$this->clientes[] = $row;
                
			}

			return $this->clientes;

        }

        public function updateInformation($nombres,$apellidos,$celular,$edad,$email,$password,$documento,$id){
            $sql = "UPDATE `cliente` SET `nombres` = '$nombres',`apellidos` = '$apellidos',`celular` = '$celular',`edad` = '$edad',`email` = '$email' WHERE (`id` = '$id');";
            $res = $this->db->query($sql);

            if ($res === false) {
                echo " <p class='text-white'> SQL Error en credenciales: " .$this->db->error."</p>";
                return false;
            }

            $sql2 ="UPDATE `credenciales` SET  `password` = '$password' WHERE (`id` = '$documento'); ";
            $res2 = $this->db->query($sql2);

           if ($res2 === false ) {
                echo " <p class='text-white'> SQL Error en credenciales: " .$this->db->error."</p>";
                return false;
            }

            return true;
        }
       

        public function getInfoClienteSession($id){
            $sql = "SELECT `nombres`,`id`,`apellidos`,`Roles_id` FROM `cliente` WHERE `documento` = '$id';";
            $res = $this->db->query($sql);
            while($row = $res->fetch_assoc())
			{
				$this->clientes2[] = $row;
                
			}
            return $this-> clientes2;
        }

       
    }
