<?php
    class registroguiaController{

        public function __construct() {
            require_once("./models/registroguia_model.php");
        }

        public function index(){
            
            $guia = new registroguia_model();
            $data["tipo_documento"] = $guia->getinfotipodocumento();
            require_once("./view/registroGuia.php");

        }


        public function registrasGuia(){

            $nombres_guia = $_POST["nombres_guia"];
            $apellidos_guia = $_POST["apellidos_guia"];
            $edad_guia = (int) $_POST["edad_guia"];
            $celular_guia = $_POST["celular_guia"];
            $email_guia = $_POST["email_guia"];
            $direccion_guia = $_POST["direccion_guia"];
            $tipodocumento_guia = (int) $_POST["tipodocumento_guia"];
            $documento_guia =  $_POST["documento_guia"];
            $genero_guia = $_POST["genero_guia"];
            $foto_guia = $_POST["foto_guia"];
            $usuario_guia = $_POST["usuario_guia"];
            $password_guia = $_POST["password_guia"];

            $guia = new registroguia_model();
            $guia->registrar( $nombres_guia,$apellidos_guia, $documento_guia, $celular_guia,$edad_guia, $email_guia ,$direccion_guia, $genero_guia,$foto_guia, $tipodocumento_guia,  $usuario_guia,$password_guia);

            header('Location:index.php');
            die();

        }
    }
?>