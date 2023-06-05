<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
  <!-- Navbar -->
  <nav class="main-header navbar navbar-expand navbar-white navbar-light">
    <!-- Left navbar links -->
    <ul class="navbar-nav">
      <li class="nav-item">
        <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
      </li>

  <li class="nav-item">
        <a class="nav-link"  href="#" role="button">
          <i></i> Bienvenido(a): <?php echo $_SESSION['User']->NombreCompleto; ?>
        </a>
      </li>




    </ul>

    <!-- Right navbar links -->
    <ul class="navbar-nav ml-auto">
      


    




      <li class="nav-item">
        <a class="nav-link" data-widget="fullscreen" href="#" role="button">
          <i class="fas fa-expand-arrows-alt"></i> Pantalla Completa
        </a>
      </li>
      
      

      <li class="nav-item">
        <a class="nav-link" role="button" on onclick="solicitaCerrarSesion()">
          <i class="fas fa-sign-out-alt"></i> Cerrar sesión
        </a>

      </li>


    </ul>
  </nav>
  <!-- /.navbar -->
