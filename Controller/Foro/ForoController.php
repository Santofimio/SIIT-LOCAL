<?php

include_once '../Model/Foro/ForoModel.php';

class ForoController {

    private $objForo;

	public function __construct()
	{

		$this->objForo = New ForoModel();

	}

    public function getCrear()
    {
        include_once '../View/Foro/create.php';
    }

    public function crear()
    {
        
    }

    public function consultar()
    {
        include_once '../View/Foro/consult.php';
    }

    public function getEditar()
    {
        include_once '../View/Foro/update.php';
    }

    public function editar()
    {
        
    }

    public function eliminar()
    {
        
    }

    public function filtrar()
    {

    }
}
?>