<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tipo De PQRSF</h1>
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
    <h2 class="display-5 fw-bold text-center">Consultar PQRSF Tipo</h2>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="card-header">
                <div class="row">
                    <div class="col-3">
                        <a href="admin.php">
                            <button class="btn btn-primary" type="button">
                                Volver
                            </button>
                        </a>
                    </div>
                    <div class="col-6">
                        <input type="text" class="form-control" id="buscar" placeholder="Buscar..." onkeyup="filtar('PqrsfTipo')">
                    </div>
                    <div class="col-3">
                        <a href="<?php echo getUrl('PqrsfTipo','PqrsfTipo', 'getCrear');?>" class="float-right"><button class="btn btn-primary">Crear</button></a>
                    </div>
                </div>
            </div>
            <div class="table-responsive">
              <table class="table table-bordered text-center">
                <thead>
                  <tr>
                    <th>Tipo de pqrsf</th>
                    <th>Modificar</th>
                    <th>Eliminar</th>
                  </tr>
                </thead>
                <tbody id="tbody">
                  <?php
                    foreach($tipo_pqrsf as $tp){
                      echo "<td>".$tp['pqr_tip_nombre']."</td>";
                      echo "<td><a href='".getUrl('PqrsfTipo','PqrsfTipo','getEditar', array("id"=>$tp['pqr_tip_id']))."'><button type='button' class='btn btn-warning'>Modificar</button></td>";
                      echo "<td><button type='button' onclick='pasarPk(`PqrsfTipo`," . $tp['pqr_tip_id'] . ",`" . $tp['pqr_tip_nombre'] . "`)' class='btn btn-danger' data-target='#exampleModal' data-toggle='modal'>Eliminar</button></td>";
                      echo "</tr>";
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