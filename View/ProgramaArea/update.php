<div class="container">
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Areas De Programa</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a class="cl-font" href="<?php echo getUrl("ProgramaArea", "ProgramaArea", "consultar") ?>">Consultar</a></li>
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
                <h3 class="card-title">Modificar Areas De Programa</h3>
            </div>
            <form action="<?php echo getUrl("ProgramaArea", "ProgramaArea", "editar"); ?>" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nombre">Nombre Del Area</label>
                                <input type="hidden" name="id" value="<?php echo $pa['pro_area_id'] ?>">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre..." value="<?php echo $pa['pro_area_nombre'] ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="lin_tec">Linea Tecnologica</label>
                                <select name="lin_tec" class="form-control">
                                    <option>Seleccione...</option>
                                    <?php
                                    foreach ($linea_tecnologica as $lt) {
                                        if ($lt['lin_tec_id'] === $pa['lin_tec_id']) {
                                            echo "<option value='" . $lt['lin_tec_id'] . "' selected>" . $lt['lin_tec_nombre'] . "</option>";
                                        } else {
                                            echo "<option value='" . $lt['lin_tec_id'] . "' >" . $lt['lin_tec_nombre'] . "</option>";
                                        }
                                    }
                                    ?>
                                </select>

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