<?php

include_once '../Model/ForoTema/ForoTemaModel.php';

class ForoTemaController {

    private $objForoTema;

	public function __construct()
	{

		$this->objForoTema = New ForoTemaModel();

	}

    public function getCrear()
    {
        include_once '../View/ForoTema/create.php';
    }

    public function crear()
    {
        
    }

    public function consultar()
    {
        include_once '../View/ForoTema/consult.php';
    }

    public function getEditar()
    {
        include_once '../View/ForoTema/update.php';
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