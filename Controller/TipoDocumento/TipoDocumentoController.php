<?php

include_once '../Model/TipoDocumento/TipoDocumentoModel.php';

class TipoDocumentoController {

    private $objTipoDocumento;

	public function __construct()
	{

		$this->objTipoDocumento = New TipoDocumentoModel();

	}

    public function getCrear()
    {
        include_once '../View/TipoDocumento/create.php';
    }

    public function crear()
    {
        if(isset($_POST)){

            $nombre = $_POST['nombre'];
            $sigla= $_POST['sigla'];
            $id = $this->objTipoDocumento->autoincrement("tip_doc_id","t_tipo_documento");
            $this->objTipoDocumento->insertar("t_tipo_documento",false,"$id,'$nombre', '$sigla'");
            $this->objTipoDocumento->close();
            redirect(getUrl("TipoDocumento","TipoDocumento","consultar"));

        }else {
            echo "No se ha realizado un registro";
        }
    }

    public function consultar()
    {
        $TipoDoc = $this->objTipoDocumento->consultar("*","t_tipo_documento");
        $this->objTipoDocumento->close();
        include_once '../View/TipoDocumento/consult.php';
    }

    public function getEditar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $TipoDoc = $this->objTipoDocumento->consultar("*","t_tipo_documento","tip_doc_id=$id");
            $tpd=mysqli_fetch_assoc($TipoDoc);
            $this->objTipoDocumento->close();

            include_once '../View/TipoDocumento/update.php';
        }
    }

    public function editar()
    {
        if(isset($_POST)){
            
            $id = $_POST['id'];
            $nombre = $_POST['nombre'];
            $sigla= $_POST['sigla'];
            $this->objTipoDocumento->editar(
                "t_tipo_documento",
                "tip_doc_id='$id'",
                array(
                "tip_doc_nombre"=>"'$nombre'",
                "tip_doc_sigla"=>"'$sigla'"));

            $this->objTipoDocumento->close();
            redirect(getUrl("TipoDocumento","TipoDocumento","consultar"));
    
        }else {
                echo "No llegaron datos para Editar";
        }
    }

    public function eliminar()
    {
        if(isset($_GET)){

            $id = $_GET['id'];
            $this->objTipoDocumento->eliminar("t_tipo_documento","tip_doc_id=$id");
            $this->objTipoDocumento->close();
            redirect(getUrl("TipoDocumento","TipoDocumento","consultar"));
            
        }else {
            echo "No llegaron datos para Eliminar";
        }
    }

    public function filtrar()
    {
        if(isset($_POST)){

            
            $buscar = $_POST['buscar'];
            
            $TipoDoc = $this->objTipoDocumento->consultar("*","t_tipo_documento","tip_doc_nombre LIKE '%$buscar%' OR tip_doc_sigla LIKE '%$buscar%'");
            include_once '../View/TipoDocumento/filtro.php';
            $this->objTipoDocumento->close();

        }else {
            echo "No llegaron datos para filtar";
        }
    }

    public function select()
    {
        $tipoDocumento = $this->objTipoDocumento->consultar("*","t_tipo_documento");
        $this->objTipoDocumento->close();
        // echo "<option class='bg' >Seleccione</option>";
        foreach ($tipoDocumento as $t) {
            echo "<option class='bg' value='".$t['tip_doc_id']."'>".$t['tip_doc_nombre']."</option>";
        }
    }
}
?>