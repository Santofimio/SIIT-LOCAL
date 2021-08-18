<?php

include_once '../Model/ForoReaccion/ForoReaccionModel.php';

class ForoReaccionController {

    private $objForoReaccion;

	public function __construct()
	{

		$this->objForoReaccion = New ForoReaccionModel();

	}

    public function getCrear()
    {
        include_once '../View/ForoReaccion/create.php';
    }

    public function crear()
    {
        
    }

    public function consultar()
    {
        include_once '../View/ForoReaccion/consult.php';
    }

    public function getEditar()
    {
        include_once '../View/ForoReaccion/update.php';
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