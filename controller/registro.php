<?php
    class registroController{

        public function __construct() {
            require_once("./models/cliente_model.php");
        }

        public function index(){
            $cliente = new cliente_model();
            $data_procedencia["procedencia"] = $cliente->getinfoProcedencia(); 
            $data_tipoducumento["tipo_documento"] = $cliente->getinfotipodocumento();
            require_once("./view/registroCliente.php");

        }

        public function registrarCliente(){

            $nombres = $_POST["nombres_cli"];
            $apellidos = $_POST["apellidos_cli"];
            $tipdocumento_id = (int) $_POST["tDocumento_cli"];
            $documento = (int) $_POST["cedula_cli"];
            $celular = $_POST["celular_cli"];
            $edad = $_POST["edad_cli"];
            $email = $_POST["email_cli"];
            $user = $_POST["usuario_cli"];
            $password = $_POST["password_cli"];
            $procedencia_id = (int) $_POST["procedencia"];
           
            $cliente = new cliente_model();
            $cliente->registrar_cliente($nombres, $apellidos, $documento,$celular, $edad,$email, $procedencia_id, $tipdocumento_id, $user, $password);

            header('Location:index.php');
            die();

        }
    }

?>