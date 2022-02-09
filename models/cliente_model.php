<?php

use function PHPSTORM_META\type;

class cliente_model{
        private $db;
        private $clientes;
        private $procedencia;

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



        public function createCredencials($id,$user,$password){

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

       
    }

?>