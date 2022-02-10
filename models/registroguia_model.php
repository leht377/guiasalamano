<?php
    class registroguia_model{
        private $db;

        public function __construct()   {
            $this->db = connect::connection();
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
 

        public function registrar($nombres,$apellidos,$documento,$celular,$edad,$email,$direccion,$genero,$foto,$tipodocumento_id,$user,$password){

            if($this->createCredencials($documento,$user,$password)){
                 $sql = "INSERT INTO `guia` (`nombres`, `apellidos`, `documento`, `celular`, `edad`, `email`, `direccion`, `genero`, `foto`, `estado`, `tipodocumento_id`, `Roles_id`, `credenciales_id`) 
                                    VALUES ('$nombres', '$apellidos', '$documento', '$celular', '$edad', '$email', '$direccion', '$genero', '$foto', 'activo', '$tipodocumento_id', 2, '$documento');";

                $res = $this->db->query($sql);
                if ($res === false) {
                    echo " <p class='text-white'> SQL Error en credenciales: " .$this->db->error."</p>";
                }
            }

        }

        
    }
?>