<?php
include_once '../Model/Ciudad/CiudadModel.php';


class CiudadController
{

    private $objCiudad;

    public function __construct()
    {

        $this->objCiudad = new CiudadModel();
    }

    public function getCrear()
    {

        $departamento = $this->objCiudad->consultar("*", "t_depto");
        include_once '../View/Ciudad/create.php';
    }

    public function crear()
    {

        if (isset($_POST)) {

            $nombre = $_POST['nombre'];
            $depto = $_POST['depto'];
            $id = $this->objCiudad->autoincrement("ciu_id", "t_ciudad");
            $this->objCiudad->insertar("t_ciudad", false, "$id,'$nombre',$depto");
            redirect(getUrl("Ciudad", "Ciudad", "consultar"));
        } else {
            echo "No llegaron los datos para Registrar";
        }
    }

    function consultar()
    {

        $ciudad = $this->objCiudad->consultar("c.ciu_id, c.ciu_nombre, d.dep_nombre", "t_ciudad c, t_depto d", "c.dep_id=d.dep_id");
        include_once '../View/Ciudad/consult.php';
    }

    function getEditar()
    {

        if (isset($_GET)) {

            $id = $_GET['id'];
            $ciudad = $this->objCiudad->consultar("*", "t_ciudad", "ciu_id=$id");
            $ciu = mysqli_fetch_assoc($ciudad);
            $departamento = $this->objCiudad->consultar("*", "t_depto");
            $this->objCiudad->close();
            include_once '../View/Ciudad/update.php';
        } else {
            echo "No llego el dato para Editar";
        }
    }

    function editar()
    {
        if (isset($_POST)) {

            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $depto = $_POST['depto'];

            $this->objCiudad->editar(
                "t_ciudad",
                "ciu_id='$id'",
                array(
                    "ciu_nombre" => "'$nombre'",
                    "dep_id" => "'$depto'"
                )
            );

            $this->objCiudad->close();
            redirect(getUrl("Ciudad", "Ciudad", "consultar"));
        } else {
            echo "No llegaron datos para Editar";
        }
    }

    function eliminar()
    {
        if (isset($_GET)) {

            $id = $_GET['id'];
            $this->objCiudad->eliminar("t_ciudad", "ciu_id=$id");
            $this->objCiudad->close();
            redirect(getUrl("Ciudad", "Ciudad", "consultar"));
        } else {
            echo "No llegaron datos para Eliminar";
        }
    }

    public function filtrar()
    {

        if (isset($_POST)) {

            $buscar = $_POST['buscar'];

            $ciudad = $this->objCiudad->consultar("c.ciu_id, c.ciu_nombre, d.dep_nombre", "t_ciudad c , t_depto d", "c.dep_id=d.dep_id AND (c.ciu_nombre LIKE '%" . $buscar . "%' OR d.dep_nombre LIKE '%" . $buscar . "%')");
            include_once '../View/Ciudad/filtro.php';
            $this->objCiudad->close();
        } else {
            echo "No llegaron datos para filtar";
        }
    }
}
