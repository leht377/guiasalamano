<?php
    class login_model{
        private $db;
        private $dataUser;
        private $datapassword;
        public function __construct()   {
            $this->db = connect::connection();
            $this->dataUser = array();
            $this->datapassword = array();

        }

        public function autenticar($user, $password){
            $sql = "SELECT `user`,`id`,`Rol_id` FROM credenciales WHERE `user` = '$user'";
            $result = $this->db->query($sql);


            if(mysqli_num_rows($result)>0){
                while($row = $result->fetch_assoc()){
                    $this->dataUser[] = $row;
                }
                if($this->autenticarPassword($password)){
                    return $this->dataUser;
                }
            }

            return false;
        }

        private function autenticarPassword($password,$id = null){
            if($id == null){
                $id =$this->dataUser[0]['id'];
            }

            $sql = "SELECT `password` FROM credenciales WHERE `id` =  $id";
            $result = $this->db->query($sql);

            if(mysqli_num_rows($result)>0){
                 while($row = $result->fetch_assoc()){
                    $this->datapassword = $row;
                }

                if(password_verify($password,$this->datapassword["password"])){
                    return true;
                }
            }
            return false;

        }

        public function setPassword($idCredenciales,$newPassword){
            $passwordCryp = password_hash($newPassword,PASSWORD_DEFAULT,['cost'=>10]);
            $sql = "UPDATE `credenciales` SET `password` = '$passwordCryp'  WHERE `id` = '$idCredenciales';";
            $res = $this->db->query($sql);
                if ($res === false) {
                    echo " <p class='text-white'> SQL Error en credenciales: " . $this->db->error . "</p>";
                    return false;
                }
                return true;
        }


        public function changePassword($old_password,$new_password){
            session_start(); 
            $id_credenciales = $_SESSION['id_credenciales'];

            if($this->autenticarPassword($old_password,$id_credenciales)){
                if($this->setPassword($id_credenciales,$new_password)){
                    return ["status" => true, "msg" => "la contreseña se cambio satisfactoriamente"];
                }
            }
            
            return ["status" => false, "msg" => "la contraseña antigua no es correcta"];
            
        }

        // public function
    }
