<div class="container">
    <section class="content-header">
        <div class="container-fluid">
            <div class="card-header">
                <div class="row mb-2">
                    <div class="col-sm-6">
                        <h1>Usuario</h1>
                    </div>
                    <div class="col-sm-6">
                        <ol class="breadcrumb float-sm-right">
                            <li class="breadcrumb-item"><a class="cl-font" href="<?php echo getUrl("Usuario", "Usuario", "consultar") ?>">Consultar</a></li>
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
                <h3 class="card-title">Modificar Usuario</h3>
            </div>
            <form action="<?php echo getUrl("Usuario", "Usuario", "editar"); ?>" method="POST">
                <div class="card-body">
                    <div class="row">
                        <div class="col">
                            <div class="form-group">
                                <label for="nombre">Nombre Usuario</label>
                                <input type="hidden" name="id" value="<?php echo $usu['usu_id'] ?>">
                                <input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre..." value="<?php echo $usu['usu_nombres'] ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="apellido">Apellido Usuario</label>
                                <input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido..." value="<?php echo $usu['usu_apellidos'] ?>">
                            </div>
                        </div>
                        <div class="col">
                            <div class="form-group">
                                <label for="correo">Correo Usuario</label>
                                <input type="text" class="form-control" id="correo" name="correo" placeholder="Correo..." value="<?php echo $usu['usu_correo'] ?>">
                            </div>
                        </div>
                        <div class="col">
                                <div class="form-group">
                                    <label for="numero">Número documento Usuario</label>
                                    <input type="text" class="form-control" id="numero" name="numero" placeholder="Número..." value="<?php echo $usu['usu_num_doc'] ?>">
                                </div>
                            </div>
                    </div>
                    <div class="card-body">
                        <div class="row">
                           
                            <div class="col">
                                <div class="form-group">
                                    <label for="tipo">Tipo documento</label>
                                    <select name="tipo" class="form-control">
                                        <option>Seleccione...</option>
                                        <?php
                                        foreach ($tipo as $tip) {
                                            echo "<option value='" . $tip['tip_doc_id'] . "' >" . $tip['tip_doc_nombre'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>

                            <div class="col">
                                <div class="form-group">
                                    <label for="rol">Rol</label>
                                    <select name="rol" class="form-control">
                                        <option>Seleccione...</option>
                                        <?php
                                        foreach ($rol as $roles) {
                                            echo "<option value='" . $roles['rol_id'] . "' >" . $roles['rol_nombre'] . "</option>";
                                        }
                                        ?>
                                    </select>
                                </div>
                            </div>
                            <div class="col">
                            <div class="form-group">
                                <label for="estado">Estado</label>
                                <select name="estado" class="form-control">
                                    <option>Seleccione...</option>
                                    <?php
                                    foreach ($estado as $est) {
                                        echo "<option value='" . $est['est_id'] . "' >" . $est['est_nombre'] . "</option>";
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