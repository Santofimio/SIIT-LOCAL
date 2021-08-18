<?php

include_once '../Model/ResultadosAprendizaje/ResultadosAprendizajeModel.php';

class ResultadosAprendizajeController {

    private $objResultadosAprendizaje;

	public function __construct()
	{

		$this->objResultadosAprendizaje = New ResultadosAprendizajeModel();

	}

    public function getCrear()
    {
        $competencias = $this->objResultadosAprendizaje->consultar("*","t_competencias");
        include_once '../View/ResultadosAprendizaje/create.php';
    }

    public function crear()
    {
        if(isset($_POST)){

            $nombre = $_POST['nombre'];
            $competencia = $_POST['com'];
            $id = $this->objResultadosAprendizaje->autoincrement("res_apr_id","t_resultados_aprendizaje");
            $this->objResultadosAprendizaje->insertar("t_resultados_aprendizaje",false,"$id,'$nombre',$competencia");
            $this->objResultadosAprendizaje->close();
            redirect(getUrl("ResultadosAprendizaje","ResultadosAprendizaje","consultar"));

        }else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consultar()
    {
        
        $resultados_aprendizaje = $this->objResultadosAprendizaje->consultar("ra.res_apr_id,ra.res_apr_descripcion,c.com_descripcion","t_resultados_aprendizaje ra, t_competencias c","ra.com_id=c.com_id");
        $this->objResultadosAprendizaje->close();
        include_once '../View/ResultadosAprendizaje/consult.php';
    }

    function getEditar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $competencias = $this->objResultadosAprendizaje->consultar("*","t_competencias");
            $resultados_aprendizaje = $this->objResultadosAprendizaje->consultar("*","t_resultados_aprendizaje","res_apr_id=$id");
            $ra=mysqli_fetch_assoc($resultados_aprendizaje);
            $this->objResultadosAprendizaje->close();
            include_once '../View/ResultadosAprendizaje/update.php';
        }
    }

    function editar()
    {
        if(isset($_POST)){
            
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];

            $this->objResultadosAprendizaje->editar(
                "t_resultados_aprendizaje",
                "res_apr_id='$id'",
                array(
                "res_apr_descripcion"=>"'$nombre'"));

            $this->objResultadosAprendizaje->close();
            redirect(getUrl("ResultadosAprendizaje","ResultadosAprendizaje","consultar"));
    
        }else {
                echo "No llegaron datos para Editar";
        }
    }

    function eliminar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $this->objResultadosAprendizaje->eliminar("t_resultados_aprendizaje","res_apr_id=$id");
            $this->objResultadosAprendizaje->close();
            redirect(getUrl("ResultadosAprendizaje","ResultadosAprendizaje","consultar"));
            
        }else {
                echo "No llegaron datos para Eliminar";
        }
    }

    public function filtrar()
    {

        if(isset($_POST)){

            
            $buscar = $_POST['buscar'];
            
            $resultados_aprendizaje = $this->objResultadosAprendizaje->consultar("ra.res_apr_id,ra.res_apr_descripcion,c.com_descripcion","t_resultados_aprendizaje ra, t_competencias c","ra.com_id=c.com_id AND (res_apr_descripcion LIKE '%$buscar%' OR com_descripcion LIKE '%$buscar%')");
            include_once '../View/ResultadosAprendizaje/filtro.php';
            $this->objResultadosAprendizaje->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
?>