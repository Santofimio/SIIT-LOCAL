<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>PQRSF</h1>
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
    <h2 class="display-5 fw-bold text-center">Consultar PQRSF</h2>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card-header">
                <div class="row">
                    <div class="col-3">
                        <a href="admin.php">
                            <button type="button" class="btn btn-primary">
                                Volver
                            </button>
                        </a>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="buscar" placeholder="Buscar..." onkeyup="filtar('Pqrsf')">
                    </div>
                    <!-- <div class="col-3">
                        <a href="<?php echo getUrl("Pqrsf","Pqrsf","getCrear");?>" class="float-right"><button class="btn btn-primary">Crear</button></a>
                    </div> -->
                </div>
            </div>
            <div class="table-responsive">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr>
                            <th>Tipo de Pqrsf</th>
                            <th>Fecha</th>
                            <th>Email</th>
                            <th>Apellidos</th>
                            <th>Tipo de usuario</th>
                            <th>Estado</th>
                            <th>Visualizar/Responder</th>
                        </tr>
                    </thead>
                    <tbody id="tbody">
                        <?php
                            foreach($pqrsf as $pq){
                                echo "<td>".$pq['pqr_tip_nombre']."</td>";
                                echo "<td>".$pq['pqr_fecha']."</td>";
                                echo "<td>".$pq['pqr_email']."</td>";
                                echo "<td>".$pq['pqr_apellidos']."</td>";
                                echo "<td>".$pq['rol_nombre']."</td>";
                                echo "<td>".$pq['est_nombre']."</td>";
                                echo "<td><a href='".getUrl("Pqrsf","Pqrsf","getResponder", array("id"=>$pq['pqr_id']))."'><button type='button' class='btn btn-primary'>Visualizar/Responder</button></a></td>";
                            }
                        ?>
                    </tbody>
                </table>
            </div>
            <div id="mdl"></div>
        </div>
    </section>
    <!-- /.content -->
</div>