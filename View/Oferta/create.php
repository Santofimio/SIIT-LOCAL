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
                            <li class="breadcrumb-item"><a class="cl-font" href="<?php echo getUrl("Oferta", "Oferta", "consultar") ?>">Consultar</a></li>
                            <li class="breadcrumb-item active">Registrar</li>
                        </ol>
                    </div><!-- /.col -->
                </div>
            </div><!-- /.row -->
        </div><!-- /.container-fluid -->
    </section>
    <!-- /.content-header -->
    <section class="content">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Registrar Oferta</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?php echo getUrl("Oferta", "Oferta", "crear"); ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="descripcion">Descripción De La Oferta</label>
                                <textarea class="form-control" rows="3" placeholder="Descripción ..." name="descripcion"></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="titulo">Fecha Inicial</label>
                                <div class="input-group date" id="oferta_fecha_ini" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#oferta_fecha_ini" name="fecha_ini">
                                    <div class="input-group-append" data-target="#oferta_fecha_ini" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="">Fecha Fin</label>
                                <div class="input-group date" id="oferta_fecha_fin" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#oferta_fecha_fin" name="fecha_fin">
                                    <div class="input-group-append" data-target="#oferta_fecha_fin" data-toggle="datetimepicker">
                                        <div class="input-group-text"><i class="fa fa-calendar"></i></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="imagen">Imagen De La Oferta</label>
                                <div class="custom-file mb-3">
                                    <input type="file" class="custom-file-input" name="imagen" lang="es">
                                    <label class="custom-file-label">Seleccioone un archivo...</label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <h4>Detalle Oferta</h4>
                        </div>
                    </div>
                    <div id="container_det">
                        <table class="table">
                            <thead>
                                <tr>
                                    <td width="50%">Programa</td>
                                    <td width="45%">Cupos</td>
                                    <td><button type="button" class="btn btn-success float-end" onclick="replica('rep','container_det')">+</button></td>
                                </tr>
                            </thead>
                        </table>
                        <div class="row">
                            <div class="col-6">
                                <div class="form-group">
                                    <select class="form-control" name="programa[]">
                                        <option>Seleccioné...</option>
                                        <?php
                                        foreach ($programa as $pro) {
                                            echo "<option value='" . $pro['pro_id'] . "' >" . $pro['pro_nombre'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <!-- <label for="cupos">Cupos</label> -->
                                    <input type="text" class="form-control" name="cupos[]" required>

                                </div>
                            </div>
                            <div class="col-1">

                            </div>
                        </div>
                        <div class="row" style="display: none;" id="rep">
                            <div class="col-6">
                                <div class="form-group">
                                    <select class="form-control" name="programa[]">
                                        <option>Seleccione...</option>
                                        <?php
                                        foreach ($programa as $pro) {
                                            echo "<option value='" . $pro['pro_id'] . "' >" . $pro['pro_nombre'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col-5">
                                <div class="form-group">
                                    <!-- <label for="cupos">Cupos</label> -->
                                    <input type="text" class="form-control" name="cupos[]">

                                </div>
                            </div>
                            <div class="col-1">
                                <button type="button" class="btn btn-danger float-end" onclick="nodeDelete(this,'container_det')">-</button>
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
    <!-- Main content -->
</div>