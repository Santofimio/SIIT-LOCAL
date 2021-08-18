<?php

include_once '../Model/PqrsfTipo/PqrsfTipoModel.php';

class PqrsfTipoController {

    private $objPqrsfTipo;

	public function __construct(){

		$this->objPqrsfTipo = New PqrsfTipoModel();

	}

    public function getCrear(){
        include_once '../View/PqrsfTipo/create.php';
    }

    public function crear(){
        if(isset($_POST['nombre'])){
            $nombre = $_POST['nombre'];
            $id=$this->objPqrsfTipo->autoincrement("pqr_tip_id", "t_pqrsf_tipo");
            $this->objPqrsfTipo->insertar("t_pqrsf_tipo",false,"$id, '$nombre'");
            $this->objPqrsfTipo->close();
            redirect(getUrl("PqrsfTipo","PqrsfTipo","consultar"));
        }else{
            echo "No se ha enviado el dato para la accion";
        }
    }

    public function consultar(){
        $tipo_pqrsf = $this->objPqrsfTipo->consultar("*","t_pqrsf_tipo");
        $this->objPqrsfTipo->close();
        include_once '../View/PqrsfTipo/consult.php';
    }

    public function getEditar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $tipo_pqrsf = $this->objPqrsfTipo->consultar("*","t_pqrsf_tipo","pqr_tip_id=$id");
            $tp=mysqli_fetch_assoc($tipo_pqrsf);
            $this->objPqrsfTipo->close();
            include_once '../View/PqrsfTipo/update.php';
        }else{
            echo "No se ha enviado el dato para la accion";
        }  
    }

    public function editar(){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];

            $this->objPqrsfTipo->editar("t_pqrsf_tipo","pqr_tip_id=$id",array("pqr_tip_nombre"=>"'$nombre'"));
            $this->objPqrsfTipo->close();
            redirect(getUrl("PqrsfTipo", "PqrsfTipo", "consultar"));
        }else{
            echo "No se ha enviado el dato para la accion";
        }
    }

    public function eliminar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $this->objPqrsfTipo->eliminar("t_pqrsf_tipo", "pqr_tip_id=$id");
            $this->objPqrsfTipo->close();
            redirect(getUrl("PqrsfTipo","PqrsfTipo","consultar"));

        }else{
            echo "No se ha enviado el dato para la accion";
        }
    }

    public function filtrar(){
        if(isset($_POST['buscar'])){
            $buscar = $_POST['buscar'];
            $tipo_pqrsf = $this->objPqrsfTipo->consultar("*","t_pqrsf_tipo", "pqr_tip_nombre LIKE '%$buscar%'");
            include_once '../View/PqrsfTipo/filtro.php';
            $this->objPqrsfTipo->close();
        }else{
            echo "No se ha encontrado nada con el valor ingresado";
        }
    }
}
?>