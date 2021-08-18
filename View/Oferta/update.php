<div class="container">
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Ofertas</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a class="cl-font" href="<?php echo getUrl("Oferta", "Oferta", "consultar") ?>">Consultar</a></li>
                            <li class="breadcrumb-item active">Modificar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Modificar Oferta</h3>
            </div>
            <!-- /.card-header -->
            <!-- form start -->
            <form action="<?php echo getUrl("Oferta", "Oferta", "editar"); ?>" method="POST" enctype="multipart/form-data">
                <div class="card-body">

                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="descripcion">Descripción De La Oferta</label>
                                <input type="hidden" name="id" value="<?php echo $ofe['ofe_id'] ?>">
                                <textarea class="form-control" rows="3" name="descripcion"><?php echo $ofe['ofe_descripcion'] ?></textarea>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="titulo">Fecha Inicial</label>
                                <div class="input-group date" id="oferta_fecha_ini" data-target-input="nearest">
                                    <input type="text" class="form-control datetimepicker-input" data-target="#oferta_fecha_ini" name="fecha_ini" value="<?php echo $ofe['ofe_fecha_ini'] ?>">
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
                                    <input type="text" class="form-control datetimepicker-input" data-target="#oferta_fecha_fin" name="fecha_fin" value="<?php echo $ofe['ofe_fecha_fin'] ?>">
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
                                <input type="hidden" name="imagen_old" value="<?php echo $ofe['ofe_imagen'] ?>">
                                <div class="custom-file mb-3" id="container_img">
                                    <div class="container text-center mt-3 mb-3">
                                        <div class="row">
                                            <div class="col-2">
                                                <img src="<?php echo $ofe['ofe_imagen'] ?>" alt="" width="150px" height="150px" class="m-auto">
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
                    <div class=" row mt-3">
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
                        <?php
                        foreach ($oferta_detalle as $ofe_det) {
                            echo "<div class='row'>
                                    <div class='col-6'>
                                        <div class='form-group'>
                                        <input type='text' class='form-control' value='" . $ofe_det['pro_nombre'] . "'>
                                        </div>
                                    </div>
                                    <div class='col-5'>
                                        <div class='form-group'>
                                            <input type='text' class='form-control' value='" . $ofe_det['ofe_det_cupos'] . "'>
                                        </div>
                                    </div>
                                    <div class='col-1'>
                                        <button type='button' class='btn btn-danger float-end' onclick='nodeDelete(this,`container_det`," . $ofe_det['ofe_det_id'] . ")'>-</button>
                                    </div>
                                </div>";
                        }
                        ?>
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
                                    <input type="text" class="form-control" name="cupos[]">

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
                        <button type="submit" class="btn btn-primary col-12">Guardar</button>
                    </div>
            </form>
        </div>
    </section>
    <!-- Main content -->
</div>
<script>
  
  
  //Oferta imagen
  $(function() {
    bsCustomFileInput.init();
  });
</script>