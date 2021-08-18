<div class="container">
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Noticia</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a class="cl-font" href="<?php echo getUrl("Noticia", "Noticia", "consultar"); ?>">Consultar</a></li>
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
                <h3>Modificar Noticia</h3>
            </div>
        </div>
        <?php
            foreach($noticia as $not){
                # code...
        ?>
        <form action="<?php echo getUrl("Noticia", "Noticia", "editar");?>" method="POST" enctype="multipart/form-data">
            <div class="card-body">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="titulo">Titulo de la noticia
                            </label>
                            <input type="hidden" name="id" value="<?php echo $not['not_id'];?>">
                            <input type="text" class="form-control" name="not_titulo" placeholder="Vacunación contra el covid" value="<?php echo $not['not_titulo'];?>">
                        </div>
                    </div>
                </div>
                <div class="row mt-3">
                    <div class="col">
                        <div class="form-group">
                            <label for="titulo">Descripción de la noticia</label>
                            <textarea name="descripcion" id="descripcion" placeholder="Descripción" class="form-control"><?php echo $not['not_descripcion'];?></textarea>
                        </div>
                    </div>
                </div>
                <div class="row d-flex justify-content-around mt-3">
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="titulo">Tipo de Noticia</label>
                            <select name="not_tip_id" id="" class="form-control">
                                <option value="">Seleccione...</option>
                                <?php
                                    foreach($noticia_tipo as $nt){
                                        if($nt['not_tip_id']==$not['not_tip_id']){
                                            echo "<option value='".$nt['not_tip_id']."' selected>".$nt['not_tip_nombre']."</option>";
                                        }else{
                                            echo "<option value='".$nt['not_tip_id']."'>".$nt['not_tip_nombre']."</option>";
                                        }
                                        
                                    }
                                ?>
                            </select>    
                        </div>
                        
                    </div>
                    <div class="col-md-4">
                        <div class="form-group">
                            <label for="titulo">Estado de la noticia</label>
                            <select name="est_id" id="" class="form-control">
                                <option value="">Seleccione...</option>
                                <?php
                                    foreach ($estado as $est){
                                        if($est['est_id']==$not['est_id']){
                                            echo "<option value='".$est['est_id']."' selected>".$est['est_nombre']."</option>";
                                        }else{
                                            echo "<option value='".$est['est_id']."'>".$est['est_nombre']."</option>";
                                        }
                                        
                                    }
                                ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="row mt-3 ml-2">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label for="imagen">Imagen De La Noticia</label>
                            <input type="hidden" name="imagen_old" value="<?php echo $not['not_imagen'] ?>">
                            <div class="custom-file mb-3" id="container_img">
                                <div class="container text-center mt-3 mb-3">
                                    <div class="row">
                                        <div class="col-2">
                                            <img src="<?php echo $not['not_imagen'] ?>" alt="" width="150px" height="150px" class="m-auto">
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
            <div class="card-footer text-center">
                <button type="submit" class="btn btn-primary col-3">Guardar</button>
            </div>    
            
        </form>
        <?php
            }
        ?>
    </section>

</div>

