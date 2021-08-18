<?php

include_once '../Model/ProgramaArea/ProgramaAreaModel.php';

class ProgramaAreaController {

    private $objProgramaArea;

	public function __construct()
	{

		$this->objProgramaArea = New ProgramaAreaModel();

	}

    public function getCrear()
    {
        $linea_tecnologica = $this->objProgramaArea->consultar("*","t_linea_tecnologica");
        include_once '../View/ProgramaArea/create.php';
    }

    public function crear()
    {
        if(isset($_POST)){

            $nombre = $_POST['nombre'];
            $lin_tec = $_POST['lin_tec'];
            $id = $this->objProgramaArea->autoincrement("pro_area_id","t_programa_area");
            $this->objProgramaArea->insertar("t_programa_area",false,"$id,$lin_tec,'$nombre'");
            $this->objProgramaArea->close();
            redirect(getUrl("ProgramaArea","ProgramaArea","consultar"));

        }else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consultar()
    {
        
        $programa_area = $this->objProgramaArea->consultar("pa.pro_area_id,pa.pro_area_nombre,lt.lin_tec_nombre","t_programa_area pa, t_linea_tecnologica lt","pa.lin_tec_id=lt.lin_tec_id");
        $this->objProgramaArea->close();
        include_once '../View/ProgramaArea/consult.php';
    }

    function getEditar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $linea_tecnologica = $this->objProgramaArea->consultar("*","t_linea_tecnologica");
            $programa_area = $this->objProgramaArea->consultar("*","t_programa_area","pro_area_id=$id");
            $pa=mysqli_fetch_assoc($programa_area);
            $this->objProgramaArea->close();
            include_once '../View/ProgramaArea/update.php';
        }
    }

    function editar()
    {
        if(isset($_POST)){
            
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $lin_tec = $_POST['lin_tec'];

            $this->objProgramaArea->editar(
                "t_programa_area",
                "pro_area_id='$id'",
                array(
                    "lin_tec_id"=>"'$lin_tec'",
                    "pro_area_nombre"=>"'$nombre'"));

            $this->objProgramaArea->close();
            redirect(getUrl("ProgramaArea","ProgramaArea","consultar"));
    
        }else {
                echo "No llegaron datos para Editar";
        }
    }

    function eliminar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $this->objProgramaArea->eliminar("t_programa_area","pro_area_id=$id");
            $this->objProgramaArea->close();
            redirect(getUrl("ProgramaArea","ProgramaArea","consultar"));
            
        }else {
                echo "No llegaron datos para Eliminar";
        }
    }

    public function filtrar()
    {

        if(isset($_POST)){

            
            $buscar = $_POST['buscar'];
            
            $programa_area = $this->objProgramaArea->consultar("pa.pro_area_id,pa.pro_area_nombre,lt.lin_tec_nombre","t_programa_area pa, t_linea_tecnologica lt","pa.lin_tec_id=lt.lin_tec_id AND (pro_area_nombre LIKE '%$buscar%' OR lin_tec_nombre LIKE '%$buscar%')");
            
            include_once '../View/ProgramaArea/filtro.php';
            $this->objProgramaArea->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
?>