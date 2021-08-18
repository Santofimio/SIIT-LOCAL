<?php

include_once '../Model/Noticia/NoticiaModel.php';

class NoticiaController {

    private $objNoticia;

	public function __construct(){
		$this->objNoticia = New NoticiaModel();

	}

    public function getCrear(){
        $noticia_tipo = $this->objNoticia->consultar("*", "t_noticia_tipo");
        $estado = $this->objNoticia->consultar("*", "t_estado");
        include_once '../View/Noticia/create.php';
    }

    public function crear(){
        echo "heeelo";
        if(isset($_POST)){
            $id = $this->objNoticia->autoincrement("not_id","t_noticia");
            $not_titulo = $_POST['not_titulo'];
            $not_descripcion = $_POST['descripcion'];
            $not_tip_id = $_POST['not_tip_id'];
            $est_id=1;
            $usu_id = 1;
            $not_fecha=date("Y-m-d");
            $imagen ="No hay imagen";

            if(isset($_FILES['imagen'])){
                $ext = explode(".", $_FILES['imagen']['name']);
                $name_img = "noticia-" . $id;
                $ruta_temp = $_FILES['imagen']['tmp_name'];
                $ruta_img = 'img/noticia/' . $name_img . '.' . end($ext);
                if(move_uploaded_file($ruta_temp, $ruta_img)){
                    $imagen = $ruta_img;
                }
            }
            $this->objNoticia->insertar("t_noticia", false,"$id, '$not_descripcion', '$not_titulo','$not_fecha','$imagen', $not_tip_id, $usu_id, $est_id");
            redirect(getUrl("Noticia","Noticia","consultar"));
        }else{
            echo "No se ha enviado un valor para la acción";
        }
    }

    public function consultar(){
        $noticia = $this->objNoticia->consultar("
            *, notip.not_tip_nombre, usua.usu_nombres, esta.est_nombre","t_noticia noti, t_noticia_tipo notip, t_usuario usua, t_estado esta 
            ", "noti.not_tip_id=notip.not_tip_id AND noti.usu_id=usua.usu_id AND noti.est_id=esta.est_id");
        $this->objNoticia->close();
        include_once '../View/Noticia/consult.php';
    }

    public function getEditar(){
        if(isset($_GET['id'])){
            $id=$_GET['id'];
            $noticia = $this->objNoticia->consultar("*", "t_noticia", "t_noticia.not_id=$id");
            $noticia_tipo = $this->objNoticia->consultar("*", "t_noticia_tipo", false);
            $estado = $this->objNoticia->consultar("*", "t_estado");
            include_once '../View/Noticia/update.php';
        }else{
            echo "No se ha enviado un valor para la acción";
        }
    }

    public function editar(){
        if(isset($_POST['id'])){
            $id = $_POST['id'];
            $not_titulo = $_POST['not_titulo'];
            $not_descripcion = $_POST['descripcion'];
            $not_tip_id = $_POST['not_tip_id'];
            $est_id=1;
            $usu_id = 1;
            $imagen = $_POST['imagen_old'];
            if($_FILES['imagen']){
                if(isset($_FILES['imagen'])){
                    $ext = explode(".", $_FILES['imagen']['name']);
                    $name_img = "noticia-" . $id;
                    $ruta_temp = $_FILES['imagen']['tmp_name'];
                    $ruta_img = 'img/noticia/' . $name_img . '.' . end($ext);
                    if(move_uploaded_file($ruta_temp, $ruta_img)){
                        $imagen = $ruta_img;
                    }
                }
            }else{
                $imagen=$imagen_old;
            }
            $this->objNoticia->editar(
                "t_noticia",
                "not_id=$id",
                ["not_titulo"=>"'$not_titulo'","not_descripcion"=>"'$not_descripcion'","not_tip_id"=>$not_tip_id,"est_id"=>$est_id,"not_imagen"=>"'$imagen'"]);
            redirect(getUrl("Noticia","Noticia","consultar"));
        }else{
            echo "No se ha enviado un valor para la acción";
        }
    }

    public function eliminar(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $this->objNoticia->eliminar("t_noticia","not_id=$id");
            redirect(getUrl("Noticia","Noticia","consultar"));
        }else{
            echo "No se ha enviado un valor para la acción";
        }
    }

    public function filtrar(){
        if(isset($_POST['buscar'])){

            $buscar = $_POST['buscar'];
            $noticia = $this->objNoticia->consultar(
                "*, notip.not_tip_nombre, usua.usu_nombres, esta.est_nombre",
                "t_noticia noti, t_noticia_tipo notip, t_usuario usua, t_estado esta",
                "noti.not_tip_id=notip.not_tip_id AND noti.usu_id=usua.usu_id AND noti.est_id=esta.est_id AND ( noti.not_titulo LIKE '%$buscar%' OR noti.not_fecha LIKE '%$buscar%' OR usua.usu_nombres LIKE '%$buscar%')");

            include_once '../View/Noticia/filtro.php';
            $this->objNoticia->close();

        }else {
            echo "No se ha enviado un valor para filtrar";
        }
    }
}
?>