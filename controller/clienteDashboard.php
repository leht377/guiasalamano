<?php

    class clienteDashboardController{
        public function __construct() {
            require_once("./models/clienteDashboard_model.php");
            require_once("./models/cliente_model.php");
        }

        public function index(){
            session_start();
            if($_SESSION["user"] != null || $_SESSION["user"] != "" ){
                require_once("./view/clienteDashboard.php");
            }else{
                error_reporting(0);
                require_once("./view/noAutenticado.php");
                die();
            }
        }

        public function viewCategorias(){
            $dash = new clienteDashboard_model();
            $dataCategorias = $dash->getCategorias(); 
            $dataJson = json_encode($dataCategorias);
            echo $dataJson;

        }

        public function viewSitios($id){
            $dash = new clienteDashboard_model();
            $datasitios = $dash->getSitios($id); 
            $dataJson = json_encode($datasitios);
            echo $dataJson;
            // $data[ "viewRequerida"]= "./view/component/sectionsitios.php";
            // require_once("./view/clienteDashboard.php");
        }
        
        public function viewguias($id){
            $dash = new clienteDashboard_model();
            $dataguias = $dash->getGuias($id); 
            $dataguiasjson = json_encode($dataguias);
            echo $dataguiasjson;
            // $data[ "viewRequerida"]= "./view/component/sectionGuias.php";
            // require_once("./view/clienteDashboard.php");
        }

        public function getInformationFormUser($id){
            
            $cliente = new cliente_model();
            $dataCliente = $cliente->getInfoCliente($id);
            $dataClientejson = json_encode($dataCliente);
            echo $dataClientejson;
        }

        public function updateClientInformation($id){
            $cliente = new cliente_model();

            $nombres = $_POST["nombres_cli"];
            $apellidos = $_POST["apellidos_cli"];
            $documento = (int) $_POST["cedula_cli"];
            $celular = $_POST["celular_cli"];
            $edad = $_POST["edad_cli"];
            $email = $_POST["email_cli"];
            $password = $_POST["password_cli"];
           
            $res = $cliente->updateInformation($nombres,$apellidos,$celular,$edad,$email,$password,$documento,$id);
            $res = json_encode($res);
            echo $res;
        }
        
        public function logout(){
            session_start();
            if (session_destroy()){
                echo true;
            }
            echo false;
        }

    }

?>