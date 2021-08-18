<?php

include_once '../Model/Pqrsf/PqrsfModel.php';

class PqrsfController{

    private $objPqrsf;

	public function __construct(){
		$this->objPqrsf = New PqrsfModel();
	}

    public function consultar(){
        $pqrsf = $this->objPqrsf->consultar(
            "*",
            "t_pqrsf pqrs, t_usuario usua, t_rol rol, t_pqrsf_tipo pqr_tip, t_estado esta",
            "pqrs.pqr_tip_id=pqr_tip.pqr_tip_id AND pqrs.usu_id=usua.usu_id AND pqrs.est_id=esta.est_id");
        include_once '../View/Pqrsf/consult.php';
    }

    public function crear(){
        //Formulario en la vista para realizar esta función
    }

    public function getResponder(){
        if(isset($_GET['id'])){
            $id = $_GET['id'];
            $pqrsf = $this->objPqrsf->consultar("*","t_pqrsf pqrs, t_rol, t_usuario, t_pqrsf_tipo, t_estado","pqrs.pqr_id=$id");
            $pqr=mysqli_fetch_assoc($pqrsf);
            include_once '../View/pqrsf/responder.php';
        }else{
            echo "No se ha enviado un valor para la acción";
        }   
    }

    public function responder(){
        if(isset($_POST['pqr_id'])){
            $pqr_id = $_POST['pqr_id'];
            $pqr_respuesta_id = $this->objPqrsf->autoincrement("pqr_res_id","t_pqrsf_respuesta");
            echo $pqr_respuesta_id;

            $usu_id = $_POST['usu_id'];
            $pqr_res_fecha=date("Y-m-d");
            $respuesta_descripcion = $_POST['respuesta'];

            $this->objPqrsf->insertar("t_pqrsf_respuesta", 
                false,
                "$pqr_respuesta_id, '$respuesta_descripcion', '$pqr_res_fecha', $pqr_id, $usu_id");
            redirect(getUrl("Pqrsf","Pqrsf","consultar"));
        }else{
            echo "No se ha enviado el valor para la acción";
        }
    }

    public function filtrar(){
        if(isset($_POST['buscar'])){
            $buscar = $_POST['buscar'];
            $pqrsf = $this->objPqrsf->consultar("*",
            "t_pqrsf pqrs, t_usuario usua, t_rol rol, t_pqrsf_tipo pqrtip, t_estado esta",
            "pqrs.pqr_tip_id=pqrtip.pqr_tip_id AND pqrs.usu_id=usua.usu_id AND pqrs.est_id=esta.est_id AND (pqrtip.pqr_tip_nombre LIKE '%$buscar%' OR pqrs.pqr_fecha LIKE '%$buscar%' OR pqrs.pqr_email LIKE '%$buscar%' OR rol.rol_nombre LIKE '%$buscar%' OR esta.est_nombre LIKE '%$buscar%')");
            include_once '../View/Pqrsf/filtro.php';
        }else{  
            echo "No se ha enviado un valor para filtrar";
        }
    }    
}
?>