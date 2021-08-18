<?php

include_once '../Model/Programa/ProgramaModel.php';

class ProgramaController
{

    private $objPrograma;

    public function __construct()
    {

        $this->objPrograma = new ProgramaModel();
    }

    public function getCrear()
    {
        $programa_nivel = $this->objPrograma->consultar("*", "t_programa_nivel");
        $programa_area = $this->objPrograma->consultar("*", "t_programa_area");
        include_once '../View/Programa/create.php';
    }

    public function crear()
    {


        if (isset($_POST)) {

            $nombre = $_POST['nombre'];
            $sigla = $_POST['sigla'];
            $descripcion = $_POST['descripcion'];
            $titulo = $_POST['titulo'];
            $duracion = $_POST['duracion'];
            $area = $_POST['area'];
            $nivel = $_POST['nivel'];
            $codigo = $_POST['codigo'];
            $id = $this->objPrograma->autoincrement("pro_id", "t_programa");


            if (isset($_FILES['imagen'])) {

                $ext = explode(".", $_FILES['imagen']['name']);
                $name_img = "programa-" . $id;
                $ruta_temp = $_FILES['imagen']['tmp_name'];
                $ruta_img = 'img/programa/' . $name_img . '.' . end($ext);

                if (move_uploaded_file($ruta_temp, $ruta_img)) {
                    $imagen = $ruta_img;
                }
            } else {
                $imagen = "No hay Imagen";
            }

            $this->objPrograma->insertar("t_programa", false, "$id,'$nombre','$sigla','$descripcion','$titulo','$duracion','$codigo','$imagen',$area,$nivel");
            redirect(getUrl("Programa", "Programa", "consultar"));
        } else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function consultar()
    {
        $programa = $this->objPrograma->consultar("p.pro_id,p.pro_nombre,pa.pro_area_nombre,pn.pro_niv_nombre", "t_programa p, t_programa_area pa, t_programa_nivel pn", "p.pro_area_id=pa.pro_area_id AND p.pro_niv_id=pn.pro_niv_id");
        include_once '../View/Programa/consult.php';
    }

    public function getEditar()
    {
        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            $programa_nivel = $this->objPrograma->consultar("*", "t_programa_nivel");
            $programa_area = $this->objPrograma->consultar("*", "t_programa_area");
            $programa = $this->objPrograma->consultar("*", "t_programa", "pro_id=$id");
            $pro = mysqli_fetch_assoc($programa);
            include_once '../View/Programa/update.php';
        } else {
            echo "No llegaron datos";
        }
    }

    public function editar()
    {
        if (isset($_POST)) {

            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $sigla = $_POST['sigla'];
            $descripcion = $_POST['descripcion'];
            $titulo = $_POST['titulo'];
            $duracion = $_POST['duracion'];
            $area = $_POST['area'];
            $nivel = $_POST['nivel'];
            $codigo = $_POST['codigo'];
            $imagen_old = $_POST['imagen_old'];
            $imagen = $imagen_old;


            if (isset($_FILES['imagen'])) {

                $ext = explode(".", $_FILES['imagen']['name']);
                $name_img = "programa-" . $id;
                $ruta_temp = $_FILES['imagen']['tmp_name'];
                $ruta_img = 'img/programa/' . $name_img . '.' . end($ext);

                if (move_uploaded_file($ruta_temp, $ruta_img)) {
                    $imagen = $ruta_img;
                }
            }

            $this->objPrograma->editar(
                "t_programa",
                "pro_id='$id'",
                array(
                    "pro_nombre" => "'$nombre '",
                    "pro_sigla" => "'$sigla'",
                    "pro_observacion" => "'$descripcion'",
                    "pro_titulo" => "'$titulo'",
                    "pro_duracion" => "'$duracion'",
                    "pro_codigo" => "'$codigo'",
                    "pro_imagen" => "'$imagen'",
                    "pro_area_id" => "'$area'",
                    "pro_niv_id" => "'$nivel'"
                )
            );

            redirect(getUrl("Programa", "Programa", "consultar"));
        } else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function eliminar()
    {
        if (isset($_GET)) {

            $id = $_GET['id'];

            $this->objPrograma->editar(
                "t_programa",
                "pro_id='$id'",
                array(
                    "est_id" => "'2'"
                )
            );

            redirect(getUrl("Programa", "Programa", "consultar"));
        } else {
            echo "No llegaron los datos para Registrar";
        }
    }

    public function filtrar()
    {
        if(isset($_POST)){

            $buscar = $_POST['buscar'];
            
            $programa = $this->objPrograma->consultar(
                "p.pro_id,p.pro_nombre,pa.pro_area_nombre,pn.pro_niv_nombre",
                "t_programa p, t_programa_area pa, t_programa_nivel pn",
                "p.pro_area_id=pa.pro_area_id AND p.pro_niv_id=pn.pro_niv_id AND (p.pro_nombre LIKE '%".$buscar."%' OR pa.pro_area_nombre LIKE '%".$buscar."%' OR pn.pro_niv_nombre LIKE '%".$buscar."%')");

            include_once '../View/Programa/filtro.php';
            $this->objPrograma->close();

        }else {
            echo "No llegaron datos para filtar";
        }
    }
}
