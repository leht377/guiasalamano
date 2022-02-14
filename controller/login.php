<?php

use function PHPSTORM_META\map;

    class loginController{

        public function __construct(){
            require_once("./models/login_model.php");
        }

        public function index(){
            $login = new login_model();
            require_once("./view/Login.php");
            
        }

        private function createSession($temp){
            session_start();
            $temp = $temp [0];
            $_SESSION['user'] = $temp['user'] ;
            $_SESSION['id'] = $temp['id'] ;
        }

        public function validarCredenciales(){
            $user = $_POST["user"];
            $password = $_POST["password"];
            $login = new login_model();
            $dataUser = $login->autenticar($user,$password);
            
            if($dataUser != false){
                $this->createSession($dataUser);
                echo  true;
            }
            
            echo false;
        }
    }
?>