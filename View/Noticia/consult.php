<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Noticias</h1>
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
    <h2 class="display-5 fw-bold text-center">Consultar Noticias</h2>
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
                        <input type="text" class="form-control" id="buscar" placeholder="Buscar.." onkeyup="filtar('Noticia')">
                    </div>
                    <div class="col-3">
                        <a class="float-right" href="<?php echo getUrl("Noticia", "Noticia", "getCrear") ?>"><button class="btn btn-primary">CREAR</button></a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Noticia</th>
                            <th>Descripción</th>
                            <th>Fecha</th>
                            <th>Tipo de Noticia</th>
                            <th>Usuario</th>
                            <th>Estado</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        foreach ($noticia as $not) {

                            echo "<tr><td>" . $not['not_titulo'] . "</td>";
                            echo "<td>" . $not['not_descripcion'] . "</td>";
                            echo "<td>" . $not['not_fecha'] . "</td>";
                            echo "<td>" . $not['not_tip_nombre'] . "</td>";
                            echo "<td>" . $not['usu_nombres'] . "</td>";
                            echo "<td>" . $not['est_nombre'] . "</td>";

                            echo "<td><a href='" . getUrl("Noticia", "Noticia", "getEditar", array("id" => $not['not_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button></a></td>";
                            echo "<td><button type='button' onclick='pasarPk(`Noticia`," . $not['not_id'] . ",`" . $not['not_descripcion'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button></td></tr>";
    
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