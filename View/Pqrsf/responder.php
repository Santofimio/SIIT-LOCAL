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
                            <li class="breadcrumb-item"><a class="cl-font" href="<?php echo getUrl("Pqrsf", "Pqrsf", "consultar"); ?>">Consultar</a></li>
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
                <h3 class="card-title">
                    PQRSF
                </h3>
            </div>
            <form action="<?php echo getUrl("Pqrsf","Pqrsf","responder");?>" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <label for="title">
                                Fecha de PQRSF:
                                <?php echo $pqr['pqr_fecha'];?>
                            </label>
                            <input type="hidden" name="pqr_id" value="<?php echo $pqr['pqr_id'];?>">
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">
                                    Estado del PQRSF
                                </label>
                                <input readonly id="estado" class="form-control" value="<?php echo $pqr['est_nombre'];?>">
                            </div>  
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">
                                    Email
                                </label>
                                <input readonly id="email" class="form-control" value="<?php echo $pqr['pqr_email'];?>">
                            </div>  
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">
                                    Tipo de Usuario
                                </label>
                                <input type="hidden" name="usu_id" value="<?php echo $pqr['usu_id'];?>">
                                <input readonly id="tipo_usuario" class="form-control" value="<?php echo $pqr['rol_nombre'];?>">
                            </div>
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">
                                    Nombres
                                </label>
                                <input readonly id="nombres" class="form-control" value="<?php echo $pqr['pqr_nombres'];?>">
                            </div>  
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">
                                    Apellidos
                                </label>
                                <input readonly id="apellidos" class="form-control" value="<?php echo $pqr['pqr_apellidos'];?>">
                            </div>  
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">
                                    Telefono de Contacto
                                </label>
                                <input readonly id="telefono" class="form-control" value="<?php echo $pqr['pqr_tel_contacto'];?>">
                            </div>  
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">
                                    Tipo de PQRSF
                                </label>
                                <input readonly id="pqrsf_tipo" class="form-control" value="<?php echo $pqr['pqr_tip_nombre'];?>">
                            </div>  
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">
                                    Descripción
                                </label>
                                <textarea readonly id="descripcion" class="form-control"><?php echo $pqr['pqr_descripcion'];?></textarea>
                            </div>  
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">
                                    Observación
                                </label>
                                <textarea id="observacion" class="form-control" name="observacion"><?php echo $pqr['pqr_observacion'];?></textarea>
                            </div>  
                        </div>
                    </div>
                    <div class="row mt-3">
                        <div class="col">
                            <div class="form-group">
                                <label for="title">
                                    Dar Respuesta
                                </label>
                                <textarea class="form-control" type="text" id="respuesta" name="respuesta" placeholder="Gracias por comunicarse con nosotros..."></textarea>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-center">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </form>
        </div>
    </section>
    <!-- Main content -->
  
</div>