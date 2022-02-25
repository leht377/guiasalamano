<?php

    class guia_model{
        private $guias;
        public function __construct(){
            $this ->db = connect::connection();
            $this ->guias = array();
        }

        public function getInfoGuiaSession($id){
            $sql = "SELECT `nombres`,`id`,`apellidos` FROM `guia` WHERE `credenciales_id` = '$id';";
            $res = $this->db->query($sql);
            while($row = $res->fetch_assoc())
			{
				$this->guias[] = $row;
                
			}
            return $this-> guias;
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

        public function createCredencials($user,$password){

            $sql = "INSERT INTO `guiasalamano`.`credenciales` ( `user`, `password`,`Rol_id`) VALUES ('$user', '$password',2);";
  
            $res = $this->db->query($sql);
 
            if ($res === false) {
             echo " <p class='text-white'> SQL Error en credenciales: " .$this->db->error."</p>";
             return false;
           }
 
           return true;
         }

         private function existeUsuario ($user){
            $sql = "SELECT `user` FROM credenciales WHERE `user` = '$user'; ";
            $result = $this->db->query($sql);
            if(empty($result) || mysqli_num_rows($result)>0){
                return true;
            }
            return false;
        }

        private function existeCedula ($cedula){
            $sql = "SELECT `nombres` FROM guia WHERE `documento` = '$cedula'; ";
            $result = $this->db->query($sql);
            if(empty($result) || mysqli_num_rows($result)>0){
                return true;
            }
            return false;

        }

        private function existeCorreo($correo){
            $sql = "SELECT `nombres` FROM guia WHERE `email` = '$correo'; ";
            $result = $this->db->query($sql);
            if(empty($result)  || mysqli_num_rows($result)>0){
                return true;
            }
            return false;
        }

        private function deleteCredencials($id){
            $sql = "DELETE FROM `guiasalamano`.`credenciales` WHERE (`id` = '$id');";
            $result = $this->db->query($sql);
        }

        public function registrar($nombres,$apellidos,$documento,$celular,$edad,$email,$direccion,$genero,$foto,$tipodocumento_id,$user,$password){
            if($this->existeCedula($documento) === false){

                if($this->existeCorreo($email) === false){

                    if($this->existeUsuario($user) === false){

                            if($this->createCredencials($user,$password)){
                                $credencialid = $this->db->insert_id;
                                $sql = "INSERT INTO `guia` (`nombres`, `apellidos`, `documento`, `celular`, `edad`, `email`, `direccion`, `genero`, `foto`, `estado`, `tipodocumento_id`,  `credenciales_id`) 
                                                    VALUES ('$nombres', '$apellidos', '$documento', '$celular', '$edad', '$email', '$direccion', '$genero', '$foto', 'activo', '$tipodocumento_id', '$credencialid');";

                                $res = $this->db->query($sql);
                                if ($res === false) {
                                    $this->deleteCredencials($credencialid);
                                    return "No crear";
                                }
                                return "creado";
                            }
                        }else{
                            return "existe usuario";
                        }
    
                    }else{
                        return "existe correo";
                    }
                }else{
                    return "existe cedula";
                }

        }

        public function getGuiasbySitios($id){
            $sql = "SELECT id,nombres,foto FROM guia WHERE sitiopostulado = '$id';";
			$resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
			{
				$this->guias[] = $row;
			}
			return $this->guias;
        }

    }

?>