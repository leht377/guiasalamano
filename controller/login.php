<?php
    class loginController{

        public function __construct(){
            require_once("./models/login_model.php");
        }

        public function index(){
            $login = new login_model();
            require_once("./view/Login.php");
            
        }

        public function validarCredenciales(){
            header('Location:index.php?c=clienteDashboard');
            die();
        }
    }
?>