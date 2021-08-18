<?php

include_once '../Model/Configuracion/ConfiguracionModel.php';

class ConfiguracionController
{

    private $objConfiguracion;

    public function __construct()
    {

        $this->objConfiguracion = new ConfiguracionModel();
    }

    public function getCrear()
    {
        $usuario = $this->objConfiguracion->consultar("*", "t_usuario");
        include_once '../View/Configuracion/create.php';
    }

    public function crear()
    {
        if (isset($_POST)) {


            $usuario = $_POST['usuario'];
            $descripcion = $_POST['descripcion'];
            $correo = $_POST['correo'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $vision =  $_POST['vision'];
            $mision = $_POST['mision'];
            $latitud = $_POST['latitud'];
            $longitud = $_POST['longitud'];


            $id = $this->objConfiguracion->autoincrement("conf_id", "t_configuracion");
            $this->objConfiguracion->insertar("t_configuracion", false, "$id,'$usuario','$descripcion','$correo','$direccion','$telefono','$vision','$mision','$latitud','$longitud'");
            redirect(getUrl("Configuracion", "Configuracion", "consultar"));
        } else {
            echo "No se ha realizado un registro";
        }
    }

    public function consultar()
    {
        $confi = $this->objConfiguracion->consultar("c.conf_id, u.usu_id, c.conf_descripcion, c.conf_correo, c.conf_telefono, c.conf_vision, c.	conf_mision, c.conf_latitud, c.	conf_longitud", "t_configuracion c, t_usuario u", "c.usu_id=u.usu_id");
        include_once '../View/Configuracion/consult.php';
    }

    public function getEditar()
    {
        if (isset($_GET)) {

            $id = $_GET['id'];

            $confi = $this->objConfiguracion->consultar("*", "t_configuracion", "conf_id=$id");
            $configuracion = mysqli_fetch_assoc($confi);
            $usuario = $this->objConfiguracion->consultar("*", "t_usuario");

            $this->objConfiguracion->close();

            include_once '../View/Usuario/update.php';
        } else {
            echo "No llego el dato para Editar";
        }

        include_once '../View/Configuracion/update.php';
    }

    public function editar()
    {
        if (isset($_POST)) {

            $id = $_POST['id'];
            $usuario = $_POST['usuario'];
            $descripcion = $_POST['descripcion'];
            $correo = $_POST['correo'];
            $direccion = $_POST['direccion'];
            $telefono = $_POST['telefono'];
            $vision =  $_POST['vision'];
            $mision = $_POST['mision'];
            $latitud = $_POST['latitud'];
            $longitud = $_POST['longitud'];

            $this->objConfiguracion->editar(
                "t_configuracion",
                "conf_id='$id'",
                array(
                    "usu_id" => "'$usuario'",
                    "conf_descripcion" => "'$descripcion'",
                    "conf_correo" => "'$correo'",
                    "conf_direccion" => "'$direccion'",
                    "conf_telefono" => "'$telefono'",
                    "conf_vision" => "'$vision'",
                    "conf_mision" => "'$mision'",
                    "conf_latitud" => "'$latitud'",
                    "conf_longitud" => "'$longitud'"
                )
            );

            $this->objConfiguracion->close();
            redirect(getUrl("Configuracion", "Configuracion", "consultar"));
        } else {
            echo "No llegaron datos para Editar";
        }
    }

    public function eliminar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $this->objConfiguracion->eliminar("t_configuracion","conf_id=$id");
            $this->objConfiguracion->close();
            redirect(getUrl("Configuracion","Configuracion","consultar"));
            
        }else {
                echo "No llegaron datos para Eliminar";
        }
    }

    public function filtrar()
    {
        
    }
}
