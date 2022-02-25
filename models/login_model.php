<?php
    class login_model{
        private $db;
        private $dataUser;
        public function __construct()   {
            $this->db = connect::connection();
            $this->dataUser = array();
        }

        public function autenticar($user, $password){
            $sql = "SELECT `user`,`id`,`Rol_id` FROM credenciales WHERE `user` = '$user' and `password` = '$password'; ";
            $result = $this->db->query($sql);
           

            if(mysqli_num_rows($result)>0){
                while($row = $result->fetch_assoc()){
                    $this->dataUser[] = $row;
                }
                return $this -> dataUser;
            }

            return false;
        }

    }
