<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Datos Del Sistema</h1>
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
    <h2 class="display-5 fw-bold text-center">Consultar Datos Del Sistema</h2>
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
                        <input type="text" class="form-control" id="buscar" placeholder="Buscar.." onkeyup="filtar('Ciudad')">
                    </div>
                    <div class="col-3">
                        <a class="float-right" href="<?php echo getUrl("Configuracion", "Configuracion", "getCrear") ?>"><button class="btn btn-primary">CREAR</button></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Descripción</th>
                            <th>Correo</th>
                            <th>Dirección</th>
                            <th>Telefono</th>
                            <th>Visión</th>
                            <th>Misión</th>
                            <th>Latitud</th>
                            <th>Longitud</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        foreach ($confi as $conf) {

                            echo "<td>" . $conf['usu_id'] . "</td>";
                            echo "<td>" . $conf['conf_descripcion'] . "</td>";
                            echo "<td>" . $conf['conf_correo'] . "</td>";
                            echo "<td>" . $conf['conf_direccion'] . "</td>";
                            echo "<td>" . $conf['conf_telefono'] . "</td>";
                            echo "<td>" . $conf['conf_vision'] . "</td>";
                            echo "<td>" . $conf['conf_mision'] . "</td>";
                            echo "<td>" . $conf['conf_latitud'] . "</td>";
                            echo "<td>" . $conf['conf_longitud'] . "</td>";
                            echo "<td><a href='" . getUrl("Configuracion", "Configuracion", "getEditar", array("id" => $conf['conf_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button><a></td>";
                            echo "<td><button type='button' onclick='pasarPk(`Configuracion`," . $conf['conf_id'] . ",`" . $conf['conf_descripcion'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
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