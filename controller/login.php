<?php

use function PHPSTORM_META\map;

    class loginController{

        public function __construct(){
            // session_start();
            // session_destroy();
            require_once("./models/login_model.php");
        }

        public function index(){
            $login = new login_model();
            require_once("./view/Login.php");
            
        }

        private function createSession($credencial){
           
            session_start();
            $rolCliente = 1;
            $rolGuia = 2;

            $credencial = $credencial [0];
           
            $_SESSION['user'] = $credencial['user'] ;
            $_SESSION['id_credenciales'] = $credencial['id'] ;
            $_SESSION['Rol'] = $credencial['Rol_id'];

            if($credencial['Rol_id'] == $rolCliente){

                require_once("./models/cliente_model.php");
                $cliente = new cliente_model();
                $resul = $cliente->getInfoClienteSession($credencial['id']);
                $_SESSION['nombres'] = $resul[0]['nombres']; 
                $_SESSION['documento'] = $resul[0]['documento'] ;
                $_SESSION['apellidos'] = $resul[0]['apellidos']; 
                $_SESSION['foto'] = $resul[0]['foto']; 
                $_SESSION['id'] = $resul[0]['id']; 

            }else if($credencial['Rol_id'] == $rolGuia){
                require_once("./models/guia_model.php");
                $guia = new guia_model();
                $resul = $guia->getInfoGuiaSession($credencial['id']);
                $_SESSION['nombres'] = $resul[0]['nombres']; 
                $_SESSION['apellidos'] = $resul[0]['apellidos']; 
                $_SESSION['foto'] = $resul[0]['foto']; 
                $_SESSION['id'] = $resul[0]['id'];
            }
          
            
        }

        public function validarCredenciales(){
            $user = $_POST["user"];
            $password = $_POST["password"];
            $login = new login_model();
            $dataUser = $login->autenticar($user,$password);
            
            if($dataUser != false){
                $this->createSession($dataUser);
                $sub [] = array ("status" => true , "rol" => $_SESSION['Rol']);
                echo json_encode($sub);
            }else{
                $items [] = array ("status" => false);
                echo json_encode($items);
            }
            
        }
    }
?>