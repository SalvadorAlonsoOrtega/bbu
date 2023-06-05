<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>

<!-- Main Sidebar Container -->
  <aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <center><a href="<?php echo site_url().'/Principal'?>" class="brand-link" class="text-center">
    
    
      <br><span  class="h5 text-center"><center>Menú</center></span>
    </a></center>

    <!-- Sidebar -->
    <div class="sidebar">

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->

              <li class="nav-item menu-open">

                <a href="#" target="_self" class="nav-link">
                    <i class="nav-icon fas fa-book-open"></i>
                    <!-- <i class="fas fa-table nav-icon"></i> -->
                    <i class="right fas fa-angle-left"></i>

                      <p>Catálogos</p>
                </a>
    
                  
                  <ul class="nav nav-treeview">
                    <li class="nav-item">
                      <a href="<?php echo site_url().'/Personal/verPersonal'?>" class="nav-link">
                        <i class="fas fa-users"></i>
                        <p> Personal</p>
                      </a>
                    </li>
                  </ul>
                  
              </li>  


        </ul>     <!-- UL PRINCIPAL -->
      </nav>      <!-- NAV PRINCIPAL -->
      <!-- /.sidebar-menu -->
    

    </div>
    <!-- /.sidebar -->
  </aside>