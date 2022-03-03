<?php    
    class contrato_model{
        private $contrato;

        function __construct()  {
            $this->db = connect::connection();
            $this->contrato = array();
        }

        function crearContrato($cliente_id,$sitio_id,$guia_id,$fecha,$hora){
           $sql = "INSERT INTO `guiasalamano`.`contrato` (`fecha`, `hora`, `estado`, `cliente_id`, `sitio_id`, `guia_id`) VALUES ('$fecha', '$hora', 'solicitado', '$cliente_id', '$sitio_id', '$guia_id');";
           $res = $this->db->query($sql);
 
           if ($res === false) {
            echo " <p class='text-white'> SQL Erro: " .$this->db->error."</p>";
            return false;
          }
          return true;

        }
    }
?>