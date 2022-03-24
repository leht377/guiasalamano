<?php
    class guiaDashboardController{


        public function index (){
            session_start(); 
            require_once("./view/guiaDashoard.php");
        }

        public function __construct()
        {
            require_once("./models/categorias_model.php");
            require_once("./models/sitios_model.php");
            require_once("./models/guia_model.php");
            require_once("./models/contrato_model.php");
        }

        public function viewCategorias()
        {
            session_start();
            if ($_SESSION["user"] != null || $_SESSION["user"] != "") {
                $modelCategoria = new categorias_model();
                $dataCategorias = $modelCategoria->getCategorias();
                $dataJson = json_encode($dataCategorias);
                echo $dataJson;
            } else {
                require_once("./view/noAutenticado.php");
                die();
            }
        }
        
        public function viewSitios($id)
        {
            $modelSitios = new sitios_model();
            $datasitios = $modelSitios->getSitiosbyCategoria($id);
            $dataJson = json_encode($datasitios);
            echo $dataJson;
            // $data[ "viewRequerida"]= "./view/component/sectionsitios.php";
            // require_once("./view/clienteDashboard.php");
        }

        public function postularsitio(){
            session_start();
            $id_destino = $_POST['id_sitio'];
            $id_guia = $_SESSION['id'];
            $modelguia = new guia_model();
            $res = $modelguia->postularSitio($id_destino,$id_guia);
            echo $res;
        }

        public function getlistsolicitudguia(){
            session_start();
            $id = $_SESSION["id"];
            $contrato = new contrato_model();
            $res = $contrato->listContratoSolicitadobyId($id,"solicitado");
            echo json_encode($res);
        }

        public function getlistclienteAceptados(){
            session_start();
            $id = $_SESSION["id"];
            $contrato = new contrato_model();
            $res = $contrato->listContratoSolicitadobyId($id,"aceptado");
            echo json_encode($res);
        }

        public function getlistContratoFinalizado(){
            session_start();
            $id = $_SESSION["id"];
            $contrato = new contrato_model();
            $res = $contrato->listContratoVencidobyId($id);
            echo json_encode($res);
        }

        public function rechazarSolicitudContrato(){
            $id = $_POST["id_contrato"];
            $estado = "rechazado";
            $contrato = new contrato_model();
            $res = $contrato->setEstadoContrato($id,$estado);
            echo $res;
        }
        public function finalizarContrato(){
            $id = $_POST["id_contrato"];
            $estado = "finalizado";
            $contrato = new contrato_model();
            $res = $contrato->setEstadoContrato($id,$estado);
            echo $res;
        }

        public function aceptarSolicitudContrato(){
            $id = $_POST["id_contrato"];
            $estado = "aceptado";
            $contrato = new contrato_model();
            $res = $contrato->setEstadoContrato($id,$estado);
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
