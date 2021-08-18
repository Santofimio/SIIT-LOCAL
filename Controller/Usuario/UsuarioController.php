<?php

include_once '../Model/Usuario/UsuarioModel.php';

class UsuarioController
{

    private $objUsuario;

    public function __construct()
    {

        $this->objUsuario = new UsuarioModel();
    }

    public function getCrear()
    {
        $tipo = $this->objUsuario->consultar("*", "t_tipo_documento");
        $rol = $this->objUsuario->consultar("*", "t_rol");
        $estado = $this->objUsuario->consultar("*", "t_estado");
        include_once '../View/Usuario/create.php';
    }

    public function crear()
    {
        if (isset($_POST)) {

            if(isset($_POST['pass'])){
                $rol = 3;
                $pass = md5($_POST['pass']);
            }else{
                $rol = $_POST['rol'];
                $pass = md5("siit.pass");
            }
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $numero = $_POST['numero'];
            $tipo = $_POST['tipo'];
            $estado = $_POST['estado'];


            $id = $this->objUsuario->autoincrement("usu_id", "t_usuario");
            $this->objUsuario->insertar("t_usuario", false, "$id,'$nombre','$apellido','$correo','$pass','$numero',$tipo,$rol,$estado");
            redirect(getUrl("Usuario", "Usuario", "consultar"));
        } else {
            echo "No se ha realizado un registro";
        }
    }

    public function consultar()
    {

        $usuario = $this->objUsuario->consultar("u.usu_id, u.usu_nombres,u.usu_apellidos,u.usu_correo, u.usu_num_doc,t.tip_doc_id,t.tip_doc_nombre, r.rol_id,r.rol_nombre, e.est_id,e.est_nombre", "t_usuario u, t_tipo_documento t, t_rol r, t_estado e", "u.tip_doc_id=t.tip_doc_id AND u.rol_id=r.rol_id AND u.est_id=e.est_id");
        $this->objUsuario->close();
        include_once '../View/Usuario/consult.php';
    }

    public function getEditar()
    {
        if (isset($_GET)) {

            $id = $_GET['id'];

            $usuario = $this->objUsuario->consultar("*", "t_usuario", "usu_id=$id");
            $usu = mysqli_fetch_assoc($usuario);
            $tipo = $this->objUsuario->consultar("*", "t_tipo_documento");
            $rol = $this->objUsuario->consultar("*", "t_rol");
            $estado = $this->objUsuario->consultar("*", "t_estado");
            $this->objUsuario->close();

            include_once '../View/Usuario/update.php';
        } else {
            echo "No llego el dato para Editar";
        }

        include_once '../View/Usuario/update.php';
    }

    public function editar()
    {
        if (isset($_POST)) {

            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $apellido = $_POST['apellido'];
            $correo = $_POST['correo'];
            $numero = $_POST['numero'];
            $tipo = $_POST['tipo'];
            $rol = $_POST['rol'];
            $estado = $_POST['estado'];


            $this->objUsuario->editar(
                "t_usuario",
                "usu_id='$id'",
                array(
                    "usu_nombres" => "'$nombre'",
                    "usu_apellidos" => "'$apellido'",
                    "usu_correo" => "'$correo'",
                    "usu_num_doc" => "'$numero'",
                    "tip_doc_id" => "'$tipo'",
                    "rol_id" => "'$rol'",
                    "est_id" => "'$estado'"
                )
            );

            $this->objUsuario->close();
            redirect(getUrl("Usuario", "Usuario", "consultar"));
        } else {
            echo "No llegaron datos para Editar";
        }
    }

    public function eliminar()
    {
        if (isset($_GET)) {

            $id = $_GET['id'];
            $this->objUsuario->eliminar("t_usuario", "usu_id=$id");
            $this->objUsuario->close();
            redirect(getUrl("Usuario", "Usuario", "consultar"));
        } else {
            echo "No llegaron datos para Eliminar";
        }
    }

    public function filtrar()
    {
        if (isset($_POST)) {

            $buscar = $_POST['buscar'];

            $usuario = $this->objUsuario->consultar(" u.usu_id, u.usu_nombres, u.usu_apellidos,u.usu_correo,u.usu_num_doc,t.tip_doc_id,t.tip_doc_nombre, r.rol_id,r.rol_nombre, e.est_id, e.est_nombre", "t_usuario u, t_tipo_documento t, t_rol r, t_estado e", "u.tip_doc_id=t.tip_doc_id AND u.rol_id=r.rol_id AND u.est_id=e.est_id AND (u.usu_nombres LIKE '%" . $buscar . "%' OR u.usu_apellidos LIKE '%" . $buscar . "%' OR u.usu_correo LIKE '%" . $buscar . "%' OR u.usu_num_doc LIKE '%" . $buscar . "%' OR r.rol_nombre LIKE '%" . $buscar . "%'  OR e.est_nombre LIKE '%" . $buscar . "%')");

            include_once '../View/Usuario/filtro.php';
            $this->objUsuario->close();
        } else {
            echo "No llegaron datos para filtar";
        }
    }
}
