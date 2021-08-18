<!-- Preloader -->
<div class="preloader flex-column justify-content-center align-items-center">
  <img class="animation__wobble" src="admin/dist/img/AdminLTELogo.png" alt="AdminLTELogo" height="60" width="60">
</div>

<!-- Navbar -->
<nav class="main-header navbar navbar-expand navbar-dark">
  <!-- Left navbar links -->
  <ul class="navbar-nav">
    <li class="nav-item">
      <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
    </li>
    
  </ul>

  <!-- Right navbar links -->
  <ul class="navbar-nav ml-auto">
    <li class="nav-item dropdown">
      <a class="nav-link" data-toggle="dropdown" href="#">
        <i class="image">
          <img src="admin/dist/img/user2-160x160.jpg" class="img-circle" alt="User Image" width="33px" height="33px">
        </i>
        <span class="info"><?php echo $_SESSION['nombre']." ".$_SESSION['apellido']?></span>
      </a>
      <div class="dropdown-menu dropdown-menu-mb dropdown-menu-right">
        <a href="#" class="dropdown-item dropdown-footer">Perfil</a>
        <div class="dropdown-divider"></div>
        <a href="<?php echo getUrl("Access","Access","cerrarSesion",false,"fecth")?>" class="dropdown-item dropdown-footer">Cerrar Sesión</a>
      </div>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-widget="fullscreen" href="#" role="button">
        <i class="fas fa-expand-arrows-alt"></i>
      </a>
    </li </ul>
</nav>
<!-- /.navbar -->