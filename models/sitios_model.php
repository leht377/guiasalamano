<?php
    class sitios_model{

        private $db;
        private $sitios;

        public function __construct()
        {
            $this->db = connect::connection();
            $this->sitios = array();
        }

        public function sitiosFamosos(){
            $sql = "SELECT nombre, id FROM sitio limit 4;";
            $resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
			{
				$this->sitios[] = $row;
			}
			return $this->sitios;
        }   

        public function getSitios($id){
            $sql = "SELECT id, nombre,img,descripcion FROM sitio WHERE categoria_id = '$id';";
			$resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
			{
				$this->sitios[] = $row;
			}
			return $this->sitios;
        }

    }
?>