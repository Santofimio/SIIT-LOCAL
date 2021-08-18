<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Programa</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a class="cl-font" href="<?php echo getUrl("Programa", "Programa", "consultar") ?>">Consultar</a></li>
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
                <h3 class="card-title">Registrar Programa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?php echo getUrl("Programa", "Programa", "crear"); ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nombre">Nombre Del Programa</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre...">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="sigla">Sigla</label>
                                <input type="text" class="form-control" id="sigla" name="sigla" placeholder="Sigla...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="descripcion">Descripción Del Programa</label>
                                <textarea class="form-control" rows="3" placeholder="Descripción ..." name="descripcion"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="titulo">Titulo a Obtener</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" placeholder="Titulo...">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="duracion">Duración Del Programa</label>
                                <input type="text" class="form-control" id="duracion" name="duracion" placeholder="Duración...">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="area">Area De Programa</label>
                                <select name="area" class="form-control">
                                    <option>Seleccione...</option>
                                    <?php
                                    foreach ($programa_area as $pa) {
                                        echo "<option value='" . $pa['pro_area_id'] . "' >" . $pa['pro_area_nombre'] . "</option>";
                                    }
                                    ?>
                                </select>
                                
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="nivel">Nivel Del Programa</label>
                                <select name="nivel" class="form-control">
                                    <option>Seleccione...</option>
                                    <?php
                                    foreach ($programa_nivel as $pn) {
                                        echo "<option value='" . $pn['pro_niv_id'] . "' >" . $pn['pro_niv_nombre'] . "</option>";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="imagen">Imagen Del Programa</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" name="imagen">
                                    <label class="custom-file-label">Seleccioone un archivo...</label>
                                </div>
                            </div>

                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="codigo">Codigo de Programa</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" placeholder="Codigo...">
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