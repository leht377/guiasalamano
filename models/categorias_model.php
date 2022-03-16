<?php
    class categorias_model{
        private $db;
        private $categorias;

        public function __construct(){
            $this->db = connect::connection();
            $this->categorias = array();
        }

        public function getCategorias(){
            $sql = "SELECT id, nombre,descripcion,img FROM categoria WHERE estado = 'activo';";
			$resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
			{
				$this->categorias[] = $row;
			}
			return $this->categorias;
        }
        
    }
?>