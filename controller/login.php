<?php
    class loginController{
        public function index(){
            require_once("./models/login_model.php");
            $login = new login_model();
            require_once("./view/Login.php");
        }
    }
?>