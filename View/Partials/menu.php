<!-- Main Sidebar Container -->
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="admin.php" class="brand-link">
        <img src="admin/dist/img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">SIIT</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
                <li class="nav-header">PANEL PRINCIPAL</li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo getUrl("Foro", "Foro", "consultar") ?>">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            FOROS
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo getUrl("Oferta", "Oferta", "consultar") ?>">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            OFERTAS
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo getUrl("Noticia", "Noticia", "consultar") ?>">
                        <i class="nav-icon fas fa-border-none"></i>
                        <p>
                            NOTICIAS
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="<?php echo getUrl("Pqrsf", "Pqrsf", "consultar") ?>">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            PQRSF
                        </p>
                    </a>
                </li>
                <li class="nav-header">PANEL DE CONTROL</li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-list"></i>
                        <p>
                            ADMIN FOROS
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo getUrl("ForoTema", "ForoTema", "consultar") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>TEMA FOROS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo getUrl("ForoReaccion", "ForoReaccion", "consultar") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>REACCION FOROS</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-th"></i>
                        <p>
                            ADMIN OFERTAS
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item link">
                            <a class="nav-link" href="<?php echo getUrl("LineaTecnologica", "LineaTecnologica", "consultar") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>LINEA TECNOLOGICA</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo getUrl("ProgramaArea", "ProgramaArea", "consultar") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>AREA DE PROGRAMA</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo getUrl("ProgramaNivel", "ProgramaNivel", "consultar"); ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>NIVEL DE PROGRAMA</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo getUrl("Programa", "Programa", "consultar") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>PROGRAMA</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo getUrl("Competencias", "Competencias", "consultar") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>COMPETENCIAS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo getUrl("ResultadosAprendizaje", "ResultadosAprendizaje", "consultar") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>RESULTADOS DE APRENDIZAJE</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-border-none"></i>
                        <p>
                            ADMIN NOTICIAS
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo getUrl("NoticiaTipo", "NoticiaTipo", "consultar") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>TIPO DE NOTICIA</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-file-alt"></i>
                        <p>
                            ADMIN PQRSF
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo getUrl("PqrsfTipo", "PqrsfTipo", "consultar") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>TIPO DE PQRSF</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-cogs"></i>
                        <p>
                            ADMIN GENERAL
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo getUrl("Estado", "Estado", "consultar") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ESTADO</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo getUrl("Rol", "Rol", "consultar") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>ROL</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo getUrl("TipoDocumento", "TipoDocumento", "consultar") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>TIPO DE DOCUMENTO</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="<?php echo getUrl("Usuario", "Usuario", "consultar") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>USUARIOS</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="<?php echo getUrl("Configuracion", "Configuracion", "consultar") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>DATOS DEL SISTEMA</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link"  href="<?php echo getUrl("Departamento", "Departamento", "consultar") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>DEPARTAMENTO</p>
                            </a>
                        </li>
                        <li class="nav-item" >
                            <a class="nav-link" href="<?php echo getUrl("Ciudad", "Ciudad", "consultar") ?>">
                                <i class="far fa-circle nav-icon"></i>
                                <p>CIUDAD</p>
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>