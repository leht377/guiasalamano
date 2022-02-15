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
            require_once("./models/cliente_model.php");
            $cliente = new cliente_model();
            session_start();
            $temp = $temp [0];
            $resul = $cliente->getInfoClienteSession($temp['id']);

            $_SESSION['user'] = $temp['user'] ;
            $_SESSION['documento'] = $temp['id'] ;
            $_SESSION['nombres'] = $resul[0]['nombres']; 
            $_SESSION['apellidos'] = $resul[0]['apellidos']; 
            $_SESSION['id'] = $resul[0]['id']; 
            $_SESSION['Rol'] = $resul[0]['Roles_id']; 
            
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