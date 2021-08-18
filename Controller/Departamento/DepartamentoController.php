<?php
// @session_start();

// if ($_SESSION['permiso'] === true) {
    
include_once '../Model/Departamento/DepartamentoModel.php';

class DepartamentoController {

    private $objDepartamento;

	public function __construct()
	{

		$this->objDepartamento = New DepartamentoModel();

	}

    public function getCrear()
    {

        include_once '../View/Departamento/create.php';
    }

    public function crear()
    {
        if(isset($_POST)){

            $nombre = $_POST['nombre'];
            $id = $this->objDepartamento->autoincrement("dep_id","t_depto");
            $this->objDepartamento->insertar("t_depto",false,"$id,'$nombre'");
            $this->objDepartamento->close();
            redirect(getUrl("Departamento","Departamento","consultar"));

        }else {
            echo "No se ha realizado un registro";
        }
    }

    public function consultar()
    {
        
        $departamento = $this->objDepartamento->consultar("*","t_depto");
        $this->objDepartamento->close();
        include_once '../View/Departamento/consult.php';
    }

    function getEditar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $departamento = $this->objDepartamento->consultar("*","t_depto","dep_id=$id");
            $dep=mysqli_fetch_assoc($departamento);
            $this->objDepartamento->close();
            include_once '../View/Departamento/update.php';
        }
    }

    function editar()
    {
        if(isset($_POST)){
            
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];

            $this->objDepartamento->editar(
                "t_depto",
                "dep_id='$id'",
                array(
                "dep_nombre"=>"'$nombre'"));

            $this->objDepartamento->close();
            redirect(getUrl("Departamento","Departamento","consultar"));
    
        }else {
                echo "No llegaron datos para Editar";
        }
    }

    function eliminar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $this->objDepartamento->eliminar("t_depto","dep_id=$id");
            $this->objDepartamento->close();
            redirect(getUrl("Departamento","Departamento","consultar"));
            
        }else {
                echo "No llegaron datos para Eliminar";
        }
    }

    public function filtrar()
    {

        if(isset($_POST)){

            
            $buscar = $_POST['buscar'];
            
            $departamento = $this->objDepartamento->consultar("*","t_depto","dep_nombre LIKE '%$buscar%'");
            include_once '../View/Departamento/filtro.php';
            $this->objDepartamento->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
?>