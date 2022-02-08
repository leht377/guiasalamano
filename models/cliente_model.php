<?php

    class cliente_model{
        private $db;
        private $clientes;

        public function __construct(){
            $this ->db = connect::connection();
            $this->clientes = array();
            $this->procedencia = array();


        }

        public function getinfoProcedencia(){
            
			$sql = "SELECT id,nombre FROM procedencia";
			$resultado = $this->db->query($sql);
			while($row = $resultado->fetch_assoc())
			{
				$this->procedencia[] = $row;
			}
			return $this->procedencia;

        }

        public function registrar_cliente($nombres,$apellidos,$documento,$celular,$edad,$email,$procedencia_id,$tipodocumento_id,$roles_id){
            $this->db->query("INSERT INTO cliente (`nombres`, `apellidos`, `documento`, `celular`, `edad`, `email`, `estado`, `procedencia_id`, `tipodocumento_id`, `Roles_id`) 
                            VALUES ('$nombres', '$apellidos', '$documento', '$celular', '$edad', '$email', 'activo', '$procedencia_id', '$tipodocumento_id', '$roles_id');");
        }
    }

?>