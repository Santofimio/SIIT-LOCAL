<div class="container">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Noticia</h1>
                    </div><!-- /.col -->
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a class="cl-font" href="<?php echo getUrl("Noticia", "Noticia", "consultar"); ?>">Consultar</a></li>
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
                <h3 class="card-title">Registrar Noticia</h3>
            </div>
        <form action="<?php echo getUrl("Noticia", "Noticia", "crear"); ?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="titulo">Titulo de la noticia
                            </label>
                            <input type="text" class="form-control" name="not_tip_idtitulo" placeholder="Vacunación contra el covid">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="titulo">Descripción de la noticia</label>
                            <textarea name="descripcion" id="descripcion" placeholder="Descripción" class="form-control"></textarea>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col-6">
                        <div class="form-group">
                            <label for="titulo">Tipo de Noticia</label>
                            <select name="not_tip_id" id="" class="form-control">
                                <option value="">Seleccione...</option>
                                <?php
                                    foreach($noticia_tipo as $nt){
                                        echo "<option value='".$nt['not_tip_id']."'>".$nt['not_tip_nombre']."</option>";
                                    }
                                ?>
                            </select>    
                        </div>
                        
                    </div>
                    <div class="col-6">
                        <div class="form-group">
                            <label for="titulo">Estado de la noticia</label>
                            <select name="est_id" id="" class="form-control">
                                <option value="">Seleccione...</option>
                                <?php
                                    foreach ($estado as $est){
                                        echo "<option value='".$est['est_id']."'>".$est['est_nombre']."</option>";
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="imagen">Imagen De La Noticia</label>
                            <div class="custom-file mb-3">
                                <input type="file" class="custom-file-input" name="imagen" lang="es">
                                <label class="custom-file-label">Seleccione un archivo...</label>
                            </div>
                        </div>
                    </div>
                </div> 
            </div>
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary col-12">Registrar</button>
            </div>   
        </form>
        </div> 
    </section>
    <!-- Main content -->
</div>