<?php
    class calificacion_model{

        private $db;
        private $calificaciones;

        public function __construct()
        {
            $this->db = connect::connection();
            $this->calificaciones = array();
        }

        public function create($fecha,$puntos,$cliente_id,$guia_id){
            
                $sql = "INSERT INTO `guiasalamano`.`calificacion` (`fecha`, `puntos`, `estado`, `cliente_id`, `guia_id`) VALUES ('$fecha', '$puntos', 'activo', '$cliente_id', '$guia_id');";

                $res = $this->db->query($sql);

                if ($res === false) {
                    echo " <p class='text-white'> SQL Error en credenciales: " . $this->db->error . "</p>";
                    return false;
                }
                return true;
        }
}

?>