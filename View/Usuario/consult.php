<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Usuario</h1>
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
    <h2 class="display-5 fw-bold text-center">Consultar Usuarios</h2>
    <!-- Main content -->
    
    <!-- /.content -->
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
                        <input type="text" class="form-control" id="buscar" placeholder="Buscar.." onkeyup="filtar('Usuario')">
                    </div>
                    <div class="col-3">
                        <a class="float-right" href="<?php echo getUrl("Usuario", "Usuario", "getCrear") ?>"><button class="btn btn-primary">CREAR</button></a>
                    </div>
                </div>
            </div>
            <div class="card-body">
                <table class="table table-bordered">
                    <thead>
                        <tr>
                            <th>Nombre</th>
                            <th>Apellido</th>
                            <th>Correo</th>
                            <th>Número doc</th>
                            <th>Tipo documento</th>
                            <th>Rol</th>
                            <th>Estado</th>
                            <th>Modificar</th>
                            <th>Eliminar</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                        foreach ($usuario as $usu) {

                            echo "<td>" . $usu['usu_nombres'] . "</td>";
                            echo "<td>" . $usu['usu_apellidos'] . "</td>";
                            echo "<td>" . $usu['usu_correo'] . "</td>";
                            echo "<td>" . $usu['usu_num_doc'] . "</td>";
                            echo "<td>" . $usu['tip_doc_nombre'] . "</td>";
                            echo "<td>" . $usu['rol_nombre'] . "</td>";
                            echo "<td>" . $usu['est_nombre'] . "</td>";
                            echo "<td><a href='" . getUrl("Usuario", "Usuario", "getEditar", array("id" => $usu['usu_id'])) . "'><button type='button' class='btn btn-warning'>Modificar</button><a></td>";
                            echo "<td><button type='button' onclick='pasarPk(`Usuario`," . $usu['usu_id'] . ",`" . $usu['usu_nombres'] . "`)' class='btn btn-danger' data-toggle='modal' data-target='#exampleModal'>Eliminar</button><a></td>";
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