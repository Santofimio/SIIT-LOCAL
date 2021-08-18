<div class="container">
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Tipo PQRSF</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a class="cl-font" href="<?php echo getUrl("PqrsfTipo", "PqrsfTipo", "consultar") ?>">Consultar</a></li>
                            <li class="breadcrumb-item active">Registrar</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <section class="content">
        <div class="card card-warning">
            <div class="card-header">
                <h3 class="card-title">Modificar Tipo PQRSF</h3>
            </div>
            <form action="<?php echo getUrl("PqrsfTipo", "PqrsfTipo", "editar"); ?>" method="POST">
                <div class="card-body">
                    <div class="form-group">
                        <label for="nombre">Nombre Del Tipo De PQRSF</label>
                        <input type="hidden" name="id" value="<?php echo $tp['pqr_tip_id']; ?>">
                        <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre..." value="<?php echo $tp['pqr_tip_nombre']; ?>">
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary col-3">Guardar</button>
                </div>
            </form>
        </div>
    </section>
</div>