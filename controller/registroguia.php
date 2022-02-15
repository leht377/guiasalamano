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
            $usuario_guia = $_POST["usuario_guia"];
            $password_guia = $_POST["password_guia"];
            
            [$ruta,$estado,$msg] = $this-> upload();
            
            
            $guia = new registroguia_model();
            $guia-> registrar( $nombres_guia,$apellidos_guia, $documento_guia, $celular_guia,$edad_guia, $email_guia ,$direccion_guia, $genero_guia,$ruta, $tipodocumento_guia,  $usuario_guia,$password_guia);

            header('Location:index.php');
            die();

        }

        private function upload (){
               
            $directorio = "./recursos_img_usuarios/";

            $archivo = $directorio . basename($_FILES["file"]["name"]);
           
            $tipoArchivo = strtolower(pathinfo($archivo, PATHINFO_EXTENSION));

            // valida que es imagen
            $checarSiImagen = getimagesize($_FILES["file"]["tmp_name"]);

            
            //var_dump($size);

            if($checarSiImagen != false){

                //validando tamaño del archivo
                $size = $_FILES["file"]["size"];

                if($size > 500000){
                    echo "El archivo tiene que ser menor a 500kb";
                }else{

                    //validar tipo de imagen
                    if($tipoArchivo == "jpg" || $tipoArchivo == "jpeg"){
                        // se validó el archivo correctamente
                        if(move_uploaded_file($_FILES["file"]["tmp_name"], $archivo)){
                            return [$archivo, true,"Se subio correctamente"];
                        }else{
                            return [null,false,"Hubo un error en la subida del archivo"];
                        }
                    }else{
                        return [null,false,"Solo se admiten archivos jpg/jpeg"];
                    }
                }
            }else{
                return [null,false,"El documento no es una image"];
            }
        }

    }
?>