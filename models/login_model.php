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

        private function autenticarPassword($password){
            $id =$this->dataUser[0]['id'];

            $sql = "SELECT `password` FROM credenciales WHERE `id` =  $id";
            $result = $this->db->query($sql);
        
            if(mysqli_num_rows($result)>0){
                 while($row = $result->fetch_assoc()){
                    $this->datapassword[] = $row;
                }

                if(password_verify($password,$this->datapassword[0]["password"])){
                    return true;
                }
            }
            return false;
           
        }

    }
