<?php

include_once '../Model/Estado/EstadoModel.php';

class EstadoController {

    private $objEstado;

	public function __construct()
	{

		$this->objEstado = New EstadoModel();

	}

    public function getCrear()
    {
        include_once '../View/Estado/create.php';
    }

    public function crear()
    {
        if(isset($_POST)){

            $nombre = $_POST['nombre'];
            $id = $this->objEstado->autoincrement("est_id","t_estado");
            $this->objEstado->insertar("t_estado",false,"$id,'$nombre'");
            $this->objEstado->close();
            redirect(getUrl("Estado","Estado","consultar"));

        }else {
            echo "No se ha realizado un registro";
        }
    }

    public function consultar()
    {
        $estado = $this->objEstado->consultar("*","t_estado");
        $this->objEstado->close();
        include_once '../View/Estado/consult.php';
    }

    public function getEditar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $Estado = $this->objEstado->consultar("*","t_estado","est_id=$id");
            $est=mysqli_fetch_assoc($Estado);
            $this->objEstado->close();

            include_once '../View/Estado/update.php';
        }
       
    }

    public function editar()
    {
        if(isset($_POST)){
            
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];

            $this->objEstado->editar(
                "t_estado",
                "est_id='$id'",
                array(
                "est_nombre"=>"'$nombre'"));

            $this->objEstado->close();
            redirect(getUrl("Estado","Estado","consultar"));
    
        }else {
            echo "No llegaron datos para Editar";
        }
        
    }

    public function eliminar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $this->objEstado->eliminar("t_estado","est_id=$id");
            $this->objEstado->close();
            redirect(getUrl("Estado","Estado","consultar"));
            
        }else {
            echo "No llegaron datos para Eliminar";
        }
    }

    public function filtrar()
    {
        if(isset($_POST)){

            
            $buscar = $_POST['buscar'];
            
            $Estado = $this->objEstado->consultar("*","t_estado","est_nombre LIKE '%$buscar%'");
            include_once '../View/Estado/filtro.php';
            $this->objEstado->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
?>