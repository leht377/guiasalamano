<?php

    class clienteDashboardController{
        public function __construct() {
            require_once("./models/clienteDashboard_model.php");
        }

        public function index(){
            require_once("./view/clienteDashboard.php");
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
    }

?>