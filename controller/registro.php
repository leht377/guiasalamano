<?php
    class registroController{

        public function __construct() {
            require_once("./models/cliente_model.php");
        }

        public function index(){
            
            $cliente = new cliente_model();
            $data_procedencia["procedencia"] = $cliente->getinfoProcedencia(); 
          
            require_once("./view/registroUser.php");
        }
    }

?>