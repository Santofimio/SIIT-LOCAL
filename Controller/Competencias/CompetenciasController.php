<?php

include_once '../Model/Competencias/CompetenciasModel.php';

class CompetenciasController {

    private $objCompetencias;

	public function __construct()
	{

		$this->objCompetencias = New CompetenciasModel();

	}

    public function getCrear()
    {

        include_once '../View/Competencias/create.php';
    }

    public function crear()
    {
        if(isset($_POST)){

            $nombre = $_POST['nombre'];
            $id = $this->objCompetencias->autoincrement("com_id","t_competencias");
            $this->objCompetencias->insertar("t_competencias",false,"$id,'$nombre'");
            $this->objCompetencias->close();
            redirect(getUrl("Competencias","Competencias","consultar"));

        }else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consultar()
    {
        
        $competencias = $this->objCompetencias->consultar("*","t_competencias");
        $this->objCompetencias->close();
        include_once '../View/Competencias/consult.php';
    }

    function getEditar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $competencias = $this->objCompetencias->consultar("*","t_competencias","com_id=$id");
            $com=mysqli_fetch_assoc($competencias);
            $this->objCompetencias->close();
            include_once '../View/Competencias/update.php';
        }
    }

    function editar()
    {
        if(isset($_POST)){
            
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];

            $this->objCompetencias->editar(
                "t_competencias",
                "com_id='$id'",
                array(
                "com_descripcion"=>"'$nombre'"));

            $this->objCompetencias->close();
            redirect(getUrl("Competencias","Competencias","consultar"));
    
        }else {
                echo "No llegaron datos para Editar";
        }
    }

    function eliminar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $this->objCompetencias->eliminar("t_competencias","com_id=$id");
            $this->objCompetencias->close();
            redirect(getUrl("Competencias","Competencias","consultar"));
            
        }else {
                echo "No llegaron datos para Eliminar";
        }
    }

    public function filtrar()
    {

        if(isset($_POST)){

            
            $buscar = $_POST['buscar'];
            
            $competencias = $this->objCompetencias->consultar("*","t_competencias","com_descripcion LIKE '%$buscar%'");
            include_once '../View/Competencias/filtro.php';
            $this->objCompetencias->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
?>