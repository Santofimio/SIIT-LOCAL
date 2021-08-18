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
                            <li class="breadcrumb-item active">Modificar</li>
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
                <h3 class="card-title">Modificar Programa</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?php echo getUrl("Programa", "Programa", "editar"); ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nombre">Nombre Del Programa</label>
                                <input type="text" class="form-control" id="nombre" name="nombre" value="<?php echo $pro['pro_nombre'] ?>">
                                <input type="hidden" class="form-control" id="id" name="id" value="<?php echo $pro['pro_id'] ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="sigla">Sigla</label>
                                <input type="text" class="form-control" id="sigla" name="sigla" value="<?php echo $pro['pro_sigla'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="descripcion">Descripción Del Programa</label>
                                <textarea class="form-control" rows="3" name="descripcion"><?php echo $pro['pro_observacion'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="titulo">Titulo a Obtener</label>
                                <input type="text" class="form-control" id="titulo" name="titulo" value="<?php echo $pro['pro_titulo'] ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="duracion">Duración Del Programa</label>
                                <input type="text" class="form-control" id="duracion" name="duracion" value="<?php echo $pro['pro_duracion'] ?>">
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
                                        if ($pa['pro_area_id'] === $pro['pro_area_id']) {
                                            echo "<option value='" . $pa['pro_area_id'] . "' selected >" . $pa['pro_area_nombre'] . "</option>";
                                        } else {
                                            echo "<option value='" . $pa['pro_area_id'] . "' >" . $pa['pro_area_nombre'] . "</option>";
                                        }
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
                                        if ($pn['pro_niv_id'] === $pro['pro_niv_id']) {

                                            echo "<option value='" . $pn['pro_niv_id'] . "' selected >" . $pn['pro_niv_nombre'] . "</option>";
                                        } else {
                                            echo "<option value='" . $pn['pro_niv_id'] . "' >" . $pn['pro_niv_nombre'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="codigo">Codigo de Programa</label>
                                <input type="text" class="form-control" id="codigo" name="codigo" value="<?php echo $pro['pro_codigo'] ?>">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        
                        
                        <div class="col">
                            <div class="form-group">
                                <label for="imagen">Imagen Del Programa</label>
                                <input type="hidden" name="imagen_old" value="<?php echo $pro['pro_imagen']; ?>">
                                <div class="custom-file mb-3" id="container_img">
                                    <div class="container text-center mt-3 mb-3" width="150px" height="150px">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="<?php echo $pro['pro_imagen'] ?>" alt="" width="150px" height="150px" class="m-auto">
                                            </div>
                                        </div>
                                        <div class="row mt-2">
                                            <div class="col-2">
                                                <button type='button' class='btn btn-sm btn-danger' onclick="cboImg()">Cambiar</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary col-12">Guardar</button>
                </div>
            </form>
        </div>
    </section>
</div>