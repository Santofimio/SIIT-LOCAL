<?php

include_once '../Model/LineaTecnologica/LineaTecnologicaModel.php';

class LineaTecnologicaController {

    private $objLineaTecnologica;

	public function __construct()
	{

		$this->objLineaTecnologica = New LineaTecnologicaModel();

	}

    public function getCrear()
    {

        include_once '../View/LineaTecnologica/create.php';
    }

    public function crear()
    {
        if(isset($_POST)){

            $nombre = $_POST['nombre'];
            $id = $this->objLineaTecnologica->autoincrement("lin_tec_id","t_linea_tecnologica");
            $this->objLineaTecnologica->insertar("t_linea_tecnologica",false,"$id,'$nombre'");
            $this->objLineaTecnologica->close();
            redirect(getUrl("LineaTecnologica","LineaTecnologica","consultar"));

        }else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consultar()
    {
        
        $linea_tecnologica = $this->objLineaTecnologica->consultar("*","t_linea_tecnologica");
        $this->objLineaTecnologica->close();
        include_once '../View/LineaTecnologica/consult.php';
    }

    function getEditar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $linea_tecnologica = $this->objLineaTecnologica->consultar("*","t_linea_tecnologica","lin_tec_id=$id");
            $lt=mysqli_fetch_assoc($linea_tecnologica);
            $this->objLineaTecnologica->close();
            include_once '../View/LineaTecnologica/update.php';
        }
    }

    function editar()
    {
        if(isset($_POST)){
            
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];

            $this->objLineaTecnologica->editar(
                "t_linea_tecnologica",
                "lin_tec_id='$id'",
                array(
                "lin_tec_nombre"=>"'$nombre'"));

            $this->objLineaTecnologica->close();
            redirect(getUrl("LineaTecnologica","LineaTecnologica","consultar"));
    
        }else {
                echo "No llegaron datos para Editar";
        }
    }

    function eliminar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $this->objLineaTecnologica->eliminar("t_linea_tecnologica","lin_tec_id=$id");
            $this->objLineaTecnologica->close();
            redirect(getUrl("LineaTecnologica","LineaTecnologica","consultar"));
            
        }else {
                echo "No llegaron datos para Eliminar";
        }
    }

    public function filtrar()
    {

        if(isset($_POST)){

            
            $buscar = $_POST['buscar'];
            
            $linea_tecnologica = $this->objLineaTecnologica->consultar("*","t_linea_tecnologica","lin_tec_nombre LIKE '%$buscar%'");
            include_once '../View/LineaTecnologica/filtro.php';
            $this->objLineaTecnologica->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
?>