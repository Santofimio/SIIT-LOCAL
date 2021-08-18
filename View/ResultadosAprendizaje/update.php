<div class="container">
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Resultado De Aprendizaje</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a class="cl-font" href="<?php echo getUrl("ResultadosAprendizaje", "ResultadosAprendizaje", "consultar") ?>">Consultar</a></li>
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
                <h3 class="card-title">Modificar Resultado De Aprendizaje</h3>
            </div>
            <form action="<?php echo getUrl("ResultadosAprendizaje", "ResultadosAprendizaje", "editar"); ?>" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nombre">Descripción Resultado De Aprendizaje</label>
                                <input type="hidden" name="id" value="<?php echo $ra['res_apr_id'] ?>">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre..." value="<?php echo $ra['res_apr_descripcion'] ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="lin_tec">Competenncia</label>
                                <select name="lin_tec" class="form-control">
                                    <option>Seleccione...</option>
                                    <?php
                                    foreach ($competencias as $com) {
                                        if ($com['com_id'] === $ra['com_id']) {
                                            echo "<option value='" . $com['com_id'] . "' selected>" . $com['com_descripcion'] . "</option>";
                                        } else {
                                            echo "<option value='" . $com['com_id'] . "' >" . $com['com_descripcion'] . "</option>";
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