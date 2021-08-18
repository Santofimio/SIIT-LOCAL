<?php

include_once '../Model/ProgramaNivel/ProgramaNivelModel.php';

class ProgramaNivelController {

    private $objProgramaNivel;

	public function __construct()
	{

		$this->objProgramaNivel = New ProgramaNivelModel();

	}

    public function getCrear()
    {

        include_once '../View/ProgramaNivel/create.php';
    }

    public function crear()
    {
        if(isset($_POST)){

            $nombre = $_POST['nombre'];
            $id = $this->objProgramaNivel->autoincrement("pro_niv_id","t_programa_nivel");
            $this->objProgramaNivel->insertar("t_programa_nivel",false,"$id,'$nombre'");
            $this->objProgramaNivel->close();
            redirect(getUrl("ProgramaNivel","ProgramaNivel","consultar"));

        }else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consultar()
    {
        
        $programa_nivel = $this->objProgramaNivel->consultar("*","t_programa_nivel");
        $this->objProgramaNivel->close();
        include_once '../View/ProgramaNivel/consult.php';
    }

    function getEditar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $programa_nivel = $this->objProgramaNivel->consultar("*","t_programa_nivel","pro_niv_id=$id");
            $pn=mysqli_fetch_assoc($programa_nivel);
            $this->objProgramaNivel->close();
            include_once '../View/ProgramaNivel/update.php';
        }
    }

    function editar()
    {
        if(isset($_POST)){
            
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];

            $this->objProgramaNivel->editar(
                "t_programa_nivel",
                "pro_niv_id='$id'",
                array(
                "pro_niv_nombre"=>"'$nombre'"));

            $this->objProgramaNivel->close();
            redirect(getUrl("ProgramaNivel","ProgramaNivel","consultar"));
    
        }else {
                echo "No llegaron datos para Editar";
        }
    }

    function eliminar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $this->objProgramaNivel->eliminar("t_programa_nivel","pro_niv_id=$id");
            $this->objProgramaNivel->close();
            redirect(getUrl("ProgramaNivel","ProgramaNivel","consultar"));
            
        }else {
                echo "No llegaron datos para Eliminar";
        }
    }

    public function filtrar()
    {

        if(isset($_POST)){

            
            $buscar = $_POST['buscar'];
            
            $programa_nivel = $this->objProgramaNivel->consultar("*","t_programa_nivel","pro_niv_nombre LIKE '%$buscar%'");
            include_once '../View/ProgramaNivel/filtro.php';
            $this->objProgramaNivel->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
?>