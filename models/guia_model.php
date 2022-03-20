<?php

    class guia_model{
        private $guias;
        public function __construct(){
            $this ->db = connect::connection();
            $this ->guias = array();
        }

        public function getInfoGuiaSession($id){
            $sql = "SELECT `nombres`,`id`,`apellidos`,`foto` FROM `guia` WHERE `credenciales_id` = '$id';";
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
			while($row = $resultado->fetch_assoc()){
				$this->tipoDocumento[] = $row;
			}
			return $this->tipoDocumento;
            
        }
        
        public function getCampoGuia($campo,$id){
            
            $sql = "SELECT $campo FROM guia WHERE `id` = $id";
			$resultado = $this->db->query($sql);

			while($row = $resultado->fetch_assoc()){
				$this->guias[] = $row;
			}
			return $this->guias;

        }

        public function createCredencials($user,$password){
            $passwordCryp = password_hash($password,PASSWORD_DEFAULT,['cost'=>10]);
            $sql = "INSERT INTO `guiasalamano`.`credenciales` ( `user`, `password`,`Rol_id`) VALUES ('$user', '$passwordCryp',2);";
  
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
            $sql = "SELECT id,nombres,foto,calificacion,edad FROM guia WHERE sitiopostulado = '$id' and estado = 'activo';";
			$resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
			{
				$this->guias[] = $row;
			}
			return $this->guias;
        }

     
        private function contratopendientes($id_de_guia){
            $sql = "SELECT id FROM contrato WHERE guia_id = $id_de_guia and estado = 'solicitado' ";
            $res = $this->db->query($sql);
            if(mysqli_num_rows($res)>0){
                return true;
            }
            return false;
        }

        public function postularSitio($id_sitio, $id_guia){
            
            if($this->contratopendientes($id_guia)){
                return "false";
            }else{
                $sql = "UPDATE `guia` SET `sitiopostulado` = $id_sitio WHERE `id` = $id_guia" ;
                $res = $this->db->query($sql);
                if ($res === false) {
                    // echo " <p class='text-white'> SQL Error en credenciales: " . $this->db->error . "</p>";
                    return "false";
                }
                return "true";
            }
           
            
        }
        private function calcularPromedioCalificacion($id_guia)
        {
            $sql = "
                SELECT avg(puntos) as promedio from calificacion WHERE guia_id = $id_guia; 
            ";
            $res = $this->db->query($sql);

            if ($res === false) {
                echo "<br> <p class='text-white'> SQL Error en registrar: " . $this->db->error . "</p>";
            }
    
            while ($row = $res->fetch_assoc()) {
                $this->contrato[] = $row;
            }
    
            return [$this->contrato[0]["promedio"],true];
        }
        public function actualizarCalificacionGuia($id_guia,$nuevaCalificacion){
            $sql = "UPDATE `guia` SET `calificacion` = $nuevaCalificacion WHERE `id` = $id_guia" ;
                $res = $this->db->query($sql);
                if ($res === false) {
                    // echo " <p class='text-white'> SQL Error en credenciales: " . $this->db->error . "</p>";
                    return false;
                }
                return true;
        }

        public function refrescarCalificacionGuia($id_guia){
            [$nuevaCalificacion,$estado] = $this->calcularPromedioCalificacion($id_guia); 
            if($estado){
                $estado =  $this->actualizarCalificacionGuia($id_guia,$nuevaCalificacion);
                if($estado){
                    return true;
                }
            }
            return false;
        }
        public function getGuiabyid($id){
            $sql = "SELECT id as id_guia,nombres as nombre_guia ,foto as foto_guia, apellidos as apellido_guia, calificacion FROM guia WHERE id = '$id' and estado = 'activo';";
			$resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
			{
				$this->guias[] = $row;
			}
			return $this->guias;
        }

    }

?>