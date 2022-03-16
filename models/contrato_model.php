<?php    
    class contrato_model{
        private $contrato;

        function __construct()  {
            $this->db = connect::connection();
            $this->contrato = array();
        }

        function crearContrato($cliente_id,$sitio_id,$guia_id,$fecha,$hora,$hora_fin){
           $sql = "INSERT INTO `guiasalamano`.`contrato` (`fecha`, `hora`,`hora_fin`, `estado`, `cliente_id`, `sitio_id`, `guia_id`) VALUES ('$fecha', '$hora', '$hora_fin','solicitado', '$cliente_id', '$sitio_id', '$guia_id');";
           $res = $this->db->query($sql);
 
           if ($res === false) {
            echo " <p class='text-white'> SQL Erro: " .$this->db->error."</p>";
            return false;
          }
          return true;

        }

        function setEstadoContrato($id,$newEstado){
            $sql = "UPDATE contrato SET `estado` = '$newEstado' WHERE `id` = $id ";
            $res = $this->db->query($sql);

            if ($res === false) {
                echo " <p class='text-white'> SQL Error en credenciales: " . $this->db->error . "</p>";
                return false;
            }
            return true;
        }

        function listContratoSolicitadobyId($id,$estado){
            $sql = "
            SELECT contrato.id as id_contrato ,cliente.nombres as cliente_nombre,cliente.foto,cliente.apellidos,sitio.nombre as sitio_nombre,fecha,hora,hora_fin 
                    FROM contrato INNER JOIN cliente ON contrato.cliente_id = cliente.id 
                    INNER JOIN sitio ON sitio.id = contrato.sitio_id
                    WHERE guia_id = $id AND  contrato.estado = '$estado';
            ";

            $res = $this->db->query($sql);

            if ($res === false) {
                echo "<br> <p class='text-white'> SQL Error en registrar: " . $this->db->error . "</p>";
            }
    
            while ($row = $res->fetch_assoc()) {
                $this->contrato[] = $row;
            }
    
            return $this->contrato;
        }
    }
?>