<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tipo De Documento</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a class="cl-font" href="admin.php">Administración</a></li>
                            <li class="breadcrumb-item active">Consultar</li>
                        </ol>
                    </div><!-- /.col -->
                </div><!-- /.row -->
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->
    <h2 class="display-5 fw-bold text-center">Consultar Tipos De Documento</h2>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card-header">
                <div class="row">
                    <div class="col-3">
                        <a href="admin.php">
                            <button class="btn btn-primary" type="button">Volver</button>
                        </a>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="buscar" placeholder="Buscar.." onkeyup="filtar('TipoDocumento')">
                    </div>
                    <div class="col-3">
                        <a class="float-right" href="<?php echo getUrl("TipoDocumento", "TipoDocumento", "getCrear") ?>"><button class="btn btn-primary">CREAR</button></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Tipo Documento</th>
                            <th>Siglas</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        foreach ($TipoDoc as $tpd) {

                            echo "<td>" . $tpd['tip_doc_nombre'] . "</td>";
                            echo "<td>" . $tpd['tip_doc_sigla'] . "</td>";
                            echo "<td><a href='" . getUrl("TipoDocumento", "TipoDocumento", "getEditar", array("id" => $tpd['tip_doc_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button><a></td>";
                            echo "<td><button type='button' onclick='pasarPk(`TipoDocumento`," . $tpd['tip_doc_id'] . ",`" . $tpd['tip_doc_nombre'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
                            echo "</tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>

            <div id="mdl"></div>
        </div>
        <!--/. container-fluid -->
    </section>
    <!-- /.content -->


</div>