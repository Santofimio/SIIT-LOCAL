<?php

include_once '../Model/Oferta/OfertaModel.php';

class OfertaController {

    private $objOferta;

	public function __construct()
	{

		$this->objOferta = New OfertaModel();

	}

    public function getCrear()
    {
        $programa = $this->objOferta->consultar("*", "t_programa");
        include_once '../View/Oferta/create.php';
    }

    public function crear()
    {
        if (isset($_POST)) {

            $descripcion = $_POST['descripcion'];
            $fecha_ini = $_POST['fecha_ini'];
            $fecha_fin = $_POST['fecha_fin'];
            $usuario = 1;
            $estado = 1;
            $id = $this->objOferta->autoincrement("ofe_id", "t_oferta");


            if (isset($_FILES['imagen'])) {

                $ext = explode(".", $_FILES['imagen']['name']);
                $name_img = "oferta-" . $id;
                $ruta_temp = $_FILES['imagen']['tmp_name'];
                $ruta_img = 'img/oferta/' . $name_img . '.' . end($ext);

                if (move_uploaded_file($ruta_temp, $ruta_img)) {
                    $imagen = $ruta_img;
                }
            } else {
                $imagen = "No hay Immagen";
            }

            $this->objOferta->insertar("t_oferta", false, "$id,'$descripcion','$fecha_ini','$fecha_fin','$imagen',$usuario,$estado");


            if (isset($_POST['programa'])) {

                $programa = $_POST['programa'];
                $cupos = $_POST['cupos'];

                for ($i = 0; $i < count($programa); $i++) {

                    $ido = $this->objOferta->autoIncrement("ofe_det_id", "t_oferta_detalle");
                    $this->objOferta->insertar(
                        "t_oferta_detalle",
                        false,
                        "$ido,".$cupos[$i].",'" . $programa[$i] . "', " . $id
                    );
                }
            }

            redirect(getUrl("Oferta", "Oferta", "consultar"));
        } else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consultar()
    {
        $oferta = $this->objOferta->consultar("*","t_oferta","est_id=1");
        include_once '../View/Oferta/consult.php';
    }

    public function getEditar()
    {
        if (isset($_GET['id'])) {

            $id = $_GET['id'];
            $programa = $this->objOferta->consultar("*", "t_programa");
            $oferta_detalle = $this->objOferta->consultar("od.ofe_det_id,od.ofe_det_cupos,p.pro_nombre", "t_oferta_detalle od, t_programa p","od.pro_id=p.pro_id AND ofe_id=$id");
            // print_r($oferta_detalle);
            $oferta = $this->objOferta->consultar("*", "t_oferta", "ofe_id=$id");
            $ofe = mysqli_fetch_assoc($oferta);
            include_once '../View/Oferta/update.php';
        } else {
            echo "No llegaron datos";
        }
        
    }

    public function editar()
    {
        if (isset($_POST)) {

            $id = $_POST['id'];
            $descripcion = $_POST['descripcion'];
            $fecha_ini = $_POST['fecha_ini'];
            $fecha_fin = $_POST['fecha_fin'];
            $imagen_old = $_POST['imagen_old'];

            if (isset($_FILES['imagen'])) {

                $ext = explode(".", $_FILES['imagen']['name']);
                $name_img = "oferta-" . $id;
                $ruta_temp = $_FILES['imagen']['tmp_name'];
                $ruta_img = 'img/oferta/' . $name_img . '.' . end($ext);

                if (move_uploaded_file($ruta_temp, $ruta_img)) {
                    $imagen = $ruta_img;
                }
            } else {
                $imagen = $imagen_old;
            }

            $this->objOferta->editar(
                "t_oferta",
                "ofe_id='$id'",
                array(
                    "ofe_descripcion" => "'$descripcion'",
                    "ofe_fecha_ini" => "'$fecha_ini'",
                    "ofe_fecha_fin" => "'$fecha_fin'",
                    "ofe_imagen" => "'$imagen'"
                )
            );

            if (isset($_POST['programa'])) {

                $programa = $_POST['programa'];
                $cupos = $_POST['cupos'];

                for ($i = 0; $i < count($programa); $i++) {

                    $ido = $this->objOferta->autoIncrement("ofe_det_id", "t_oferta_detalle");
                    $this->objOferta->insertar(
                        "t_oferta_detalle",
                        false,
                        "$ido,".$cupos[$i].",'" . $programa[$i] . "', " . $id
                    );
                }
            }

            redirect(getUrl("Oferta", "Oferta", "consultar"));
        } else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function eliminar()
    {
        if (isset($_GET)) {

            $id = $_GET['id'];

            $this->objOferta->editar(
                "t_oferta",
                "ofe_id='$id'",
                array(
                    "est_id" => "2"
                )
            );

            redirect(getUrl("Oferta", "Oferta", "consultar"));
        } else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function filtrar()
    {
        if(isset($_POST)){

            $buscar = $_POST['buscar'];
            $oferta = $this->objOferta->consultar("*","t_oferta","est_id=1 AND (ofe_descripcion LIKE '%".$buscar."%' OR ofe_fecha_ini LIKE '%".$buscar."%' OR ofe_fecha_fin LIKE '%".$buscar."%')");
            include_once '../View/Oferta/filtro.php';
            $this->objOferta->close();

        }else {
            echo "No llegaron datos para filtar";
        }
    }

    public function deleteItem(){
        if (isset($_POST['id'])) {

            $id = $_POST['id'];
            $this->objOferta->eliminar("t_oferta_detalle", "ofe_det_id=$id");
        } else {
            echo "No llegaron datos para Eliminar";
        }
    }
}
