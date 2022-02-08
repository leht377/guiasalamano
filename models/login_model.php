<?php
    class login_model{
        private $db;

        public function __construct()   {
            $this->db = connect::connection();
        }

        public function autenticar($user, $password){
            
        }

    }
?>