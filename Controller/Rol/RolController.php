<?php

include_once '../Model/Rol/RolModel.php';

class RolController {

    private $objRol;

	public function __construct()
	{

		$this->objRol = New RolModel();

	}

    public function getCrear()
    {

        include_once '../View/Rol/create.php';
    }

    public function crear()
    {
        if(isset($_POST)){

            $nombre = $_POST['nombre'];
            $id = $this->objRol->autoincrement("rol_id","t_rol");
            $this->objRol->insertar("t_rol",false,"$id,'$nombre'");
            $this->objRol->close();
            redirect(getUrl("Rol","Rol","consultar"));

        }else {
            echo "No se ha realizado un registro";
        }
        
    }

    public function consultar()
    {
        $Rol = $this->objRol->consultar("*","t_rol");
        $this->objRol->close();
        include_once '../View/Rol/consult.php';
    }

    public function getEditar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $Rol = $this->objRol->consultar("*","t_rol","rol_id=$id");
            $rl=mysqli_fetch_assoc($Rol);
            $this->objRol->close();
            include_once '../View/Rol/update.php';
        }
        include_once '../View/Rol/update.php';
    }

    public function editar()
    {
        if(isset($_POST)){
            
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];

            $this->objRol->editar(
                "t_rol",
                "rol_id='$id'",
                array(
                "rol_nombre"=>"'$nombre'"));

            $this->objRol->close();
            redirect(getUrl("Rol","Rol","consultar"));
    
        }else {
            echo "No llegaron datos para Editar";
        }
    }

    public function eliminar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $this->objRol->eliminar("t_rol","rol_id=$id");
            $this->objRol->close();
            redirect(getUrl("Rol","Rol","consultar"));
            
        }else {
            echo "No llegaron datos para Eliminar";
        }
    }

    public function filtrar()
    {
        if(isset($_POST)){

            
            $buscar = $_POST['buscar'];
            
            $Rol = $this->objRol->consultar("*","t_rol","rol_nombre LIKE '%$buscar%'");
            include_once '../View/Rol/filtro.php';
            $this->objRol->close();

        }else {
            echo "No llegaron datos para filtar";
        }

    }
}
?>