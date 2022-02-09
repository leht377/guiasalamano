<?php
    class registroguiaController{
        public function __construct() {
            require_once("./models/registroguia_model.php");
        }

        public function index(){
            
            $guia = new registroguia_model();
            require_once("./view/registroGuia.php");

        }
    }
?>