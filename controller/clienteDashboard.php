<?php

    class clienteDashboardController{
        public function __construct() {
            require_once("./models/clienteDashboard_model.php");
        }

        public function index(){
            $dash = new clienteDashboard_model();
            $data["categoria"] = $dash->getCategorias(); 
            $data[ "viewRequerida"]= "./view/component/sectionCategoria.php";
            require_once("./view/clienteDashboard.php");
        }


        public function viewSitios($id){
            $dash = new clienteDashboard_model();
            $data["sitios"] = $dash->getSitios($id); 
            $data[ "viewRequerida"]= "./view/component/sectionsitios.php";
            require_once("./view/clienteDashboard.php");
        }
        
        public function viewguias($id){
            $dash = new clienteDashboard_model();
            $data["guias"] = $dash->getGuias($id); 
            $data[ "viewRequerida"]= "./view/component/sectionGuias.php";
            require_once("./view/clienteDashboard.php");
        }
    }

?>