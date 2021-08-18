<?php

include_once '../Model/NoticiaTipo/NoticiaTipoModel.php';

class NoticiaTipoController {

    private $objNoticiaTipo;

	public function __construct(){
		$this->objNoticiaTipo = New NoticiaTipoModel();
	}

    public function getCrear(){
        include_once '../View/NoticiaTipo/create.php';
    }

    public function crear(){
        if(isset($_POST['nombre'])){
            $nombre = $_POST['nombre'];
            $id = $this->objNoticiaTipo->autoincrement("not_tip_id","t_noticia_tipo");
            $this->objNoticiaTipo->insertar("t_noticia_tipo",false, "$id,'$nombre'");
            $this->objNoticiaTipo->close();
            redirect(getUrl("NoticiaTipo","NoticiaTipo","consultar"));
        }else{
            echo "No se ha enviado el dato para la acción";
        }
    }

    public function consultar(){
        $noticia_tipo = $this->objNoticiaTipo->consultar("*","t_noticia_tipo");
        $this->objNoticiaTipo->close();
        include_once '../View/NoticiaTipo/consult.php';
    }

    public function getEditar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $noticia_tipo = $this->objNoticiaTipo->consultar("*","t_noticia_tipo","not_tip_id=$id");
            $nt = mysqli_fetch_assoc($noticia_tipo);
            $this->objNoticiaTipo->close();
            include_once '../View/NoticiaTipo/update.php';
        }else{
            echo "No ha enviado el dato para la acción";
        }
    }

    public function editar(){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $this->objNoticiaTipo->editar("t_noticia_tipo","not_tip_id=$id", array("not_tip_nombre"=>"'$nombre'"));
            $this->objNoticiaTipo->close();
            redirect(getUrl("NoticiaTipo","NoticiaTipo","consultar"));
        }else{
            echo "No ha enviado el dato para la acción";
        }
    }

    public function eliminar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $this->objNoticiaTipo->eliminar("t_noticia_tipo","not_tip_id=$id");
            $this->objNoticiaTipo->close();
            redirect(getUrl("NoticiaTipo","NoticiaTipo","consultar"));
        }else{
            echo "No ha enviado el dato para la acción";
        }
    }

    public function filtrar(){
        if(isset($_POST['buscar'])){
            $buscar = $_POST['buscar'];
            $noticia_tipo = $this->objNoticiaTipo->consultar("*","t_noticia_tipo","not_tip_nombre LIKE '%$buscar%'");
             include_once '../View/NoticiaTipo/filtro.php';
            $this->objNoticiaTipo->close();
        }else{
            echo "No se ha encontrado nada";
        }
    }
}
?>