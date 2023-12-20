<?php
$admin_name = $_SESSION['admin_name'];
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=WEB?>admin" class="brand-link">
      <img src="<?=WEB?>dist/img/xan-logo.png" alt="Xan Logo" class="brand-image img-fluid elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Xan Library</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=WEB?>dist/img/user-160x160.jpg" class="img-circle elevation-3" alt="User Image">
        </div>
        <div class="info">
          <a href="<?=WEB?>admin/profile" class="d-block"><?php echo $admin_name ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
                    <li class="nav-item">
            <a href="<?=WEB?>admin/books_panel" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Books Panel
              </p>
            </a>
          </li>
          
                    <li class="nav-item">
            <a href="<?=WEB?>admin/issued_books" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                Issue Books
              </p>
            </a>
          </li>
          
                    <li class="nav-item">
            <a href="<?=WEB?>admin/user_panel" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                User Panel
              </p>
            </a>
          </li>
          
          <li class="nav-item">
            <a href="<?=WEB?>admin/logout" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Log out
              </p>
            </a>
          </li>
      <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
  </aside>