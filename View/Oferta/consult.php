<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ofertas</h1>
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
    <h2 class="display-5 fw-bold text-center">Consultar Ofertas</h2>
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
                        <input type="text" class="form-control" id="buscar" placeholder="Buscar.." onkeyup="filtar('Oferta')">
                    </div>
                    <div class="col-3">
                        <a class="float-right" href="<?php echo getUrl("Oferta", "Oferta", "getCrear") ?>"><button class="btn btn-primary">CREAR</button></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Oferta</th>
                            <th>Fecha Inicial</th>
                            <th>Fecha Final</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        foreach ($oferta as $ofe) {

                            echo "<td>" . $ofe['ofe_descripcion'] . "</td>";
                            echo "<td>" . $ofe['ofe_fecha_ini'] . "</td>";
                            echo "<td>" . $ofe['ofe_fecha_fin'] . "</td>";
                            echo "<td><a href='" . getUrl("Oferta", "Oferta", "getEditar", array("id" => $ofe['ofe_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button></a></td>";
                            echo "<td><button type='button' onclick='pasarPk(`Oferta`," . $ofe['ofe_id'] . ",`" . $ofe['ofe_descripcion'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button></td>";
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