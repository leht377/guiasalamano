<?php
    function cargarControlador($controlador){
        $nombreControlador = $controlador."Controller";
        $archivoControlador = 'controller/'.$controlador.'.php';
  

        if(!is_file($archivoControlador)){

            $archivoControlador ='controller/'.CONTROLADOR_PRINCIPAL.".php";
            $nombreControlador = CONTROLADOR_PRINCIPAL."Controller";
            
        }

        require_once $archivoControlador;
        $control = new $nombreControlador();

        return $control;
    } 

    function cargarAccion($controller, $accion, $id = null){
		
		if(isset($accion) && method_exists($controller, $accion)){
			if($id == null){
				$controller->$accion();
				} else {
				$controller->$accion($id);
			}
			} else {
			$controller->ACCION_PRINCIPAL();
		}	
	}
    

?>