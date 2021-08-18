<?php
include_once '../Model/Access/AccessModel.php';
@session_start();
class AccessController
{

    private $objAccess;

    public function __construct()
    {
        $this->objAccess = new AccessModel();
    }

    public function iniciarSesion()
    {
        if (isset($_POST)) {

            $tip_doc = $_POST['tip_doc'];
            $num_doc = $_POST['num_doc'];
            $pass = md5($_POST['pass']);


            $usu = $this->objAccess->consultar("usu_id, usu_nombres, usu_apellidos ,rol_id", "t_usuario", "usu_num_doc=$num_doc AND usu_pass='$pass' AND tip_doc_id=$tip_doc");

            if (mysqli_num_rows($usu) > 0) {
                foreach ($usu as $u) {

                    $_SESSION['id'] = $u['usu_id'];
                    $_SESSION['nombre'] = $u['usu_nombres'];
                    $_SESSION['apellido'] = $u['usu_apellidos'];
                    $_SESSION['rol_id'] = $u['rol_id'];
                    $_SESSION['auth'] = 'ok';
                    $rol = $this->objAccess->consultar("*", "t_rol", "rol_id=" . $u['rol_id']);
                }
                $r = mysqli_fetch_assoc($rol);
                $_SESSION['rol'] = $r['rol_nombre'];

                if ($pass === "e671b4dae999c7974d3286162ea11bf0") {
                    $this->cambioPass();
                } else {

                    $this->objAccess->close();
                    redirect('admin.php');
                }
            } else {
                redirect('login.php');
            }
        } else {
            echo "No llegaron los datos ";
        }
    }

    public function cambioPass()
    {

        if (isset($_POST['id'])) {

            $id = $_POST['id'];
            $pass = md5($_POST['pass']);

            $this->objAccess->editar(
                "t_usuario",
                "usu_id='$id'",
                array(
                    "usu_pass" => "'$pass'"
                )
            );
            session_destroy();
            redirect("login.php");
        } else {
            include_once '../View/Access/pass.php';
        }
    }
    public function cerrarSesion()
    {

        session_destroy();
        redirect("login.php");
    }
}
