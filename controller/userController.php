<?php
    class user_view{
        public function index(){
            require_once("./models/cliente_model.php");
            $cliente = new cliente_model();
            require_once("./view/registroUser.php");
        }
    }
?>