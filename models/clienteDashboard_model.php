<?php

    class clienteDashboard_model{
        private $db;
        private $sitios;
        private $categorias;
        public function __construct()
        {
            $this->db = connect::connection();
            $this->sitios = array();
            $this->categorias = array();
        }


        public function getCategorias(){
            $sql = "SELECT id, nombre,descripcion,img FROM categoria;";
			$resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
			{
				$this->categorias[] = $row;
			}
			return $this->categorias;
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

        public function getGuias($id){
            $sql = "SELECT id,nombres,foto FROM guia WHERE sitiopostulado = '$id';";
			$resultado = $this->db->query($sql);
            while($row = $resultado->fetch_assoc())
			{
				$this->sitios[] = $row;
			}
			return $this->sitios;
        }
    }

?>