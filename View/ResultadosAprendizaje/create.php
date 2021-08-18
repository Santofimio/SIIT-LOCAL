<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Resultados De Aprendizaje</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a class="cl-font" href="<?php echo getUrl("ResultadosAprendizaje", "ResultadosAprendizaje", "consultar") ?>">Consultar</a></li>
                            <li class="breadcrumb-item active">Registrar</li>
                        </ol>
                    </div><!-- /.col -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->

    <!-- Main content -->
    <section class="content">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Registrar Resultado De Aprendizaje</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?php echo getUrl("ResultadosAprendizaje", "ResultadosAprendizaje", "crear"); ?>" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nombre">Descripción Del Resultado De Aprendizaje</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre...">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="com">Competencia</label>
                                <select name="com" class="form-control">
                                    <option>Seleccione...</option>
                                    <?php
                                    foreach ($competencias as $com) {
                                        echo "<option value='" . $com['com_id'] . "' >" . $com['com_descripcion'] . "</option>";
                                    }
                                    ?>
                                </select>

                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->

                <div class="card-footer">
                    <button type="submit" class="btn btn-primary col-12">Registrar</button>
                </div>
            </form>
        </div>
    </section>
</div>