<?php
$user_name = $_SESSION['user_name'];
$avatar = $_SESSION['avatar'];
$userID = $_SESSION['ID'];
?>
<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="<?=WEB?>user" class="brand-link">
      <img src="<?=WEB?>dist/img/xan-logo.png" alt="Xan Logo" class="brand-image img-fluid elevation-3"
           style="opacity: .8">
      <span class="brand-text font-weight-light">Xan Library</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
      <!-- Sidebar user panel (optional) -->
      <div class="user-panel mt-3 pb-3 mb-3 d-flex">
        <div class="image">
          <img src="<?=WEB?>dist/img/<?=$avatar?>.gif" alt="User Image">
        </div>
        <div class="info">
          <a href="<?=WEB?>user/profile" class="d-block"><?php echo $user_name ?></a>
        </div>
      </div>

      <!-- Sidebar Menu -->
      <nav class="mt-2">
        <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
          <!-- Add icons to the links using the .nav-icon class
               with font-awesome or any other icon font library -->
          
                    <li class="nav-item">
            <a href="<?=WEB?>user/books" class="nav-link">
              <i class="nav-icon fas fa-book"></i>
              <p>
                Books
              </p>
            </a>
          </li>
          
                    <li class="nav-item">
            <a href="<?=WEB?>user/issued_books" class="nav-link">
              <i class="nav-icon fas fa-table"></i>
              <p>
                My Issued
              </p>
            </a>
          </li>
<?php
/*
                    <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon fas fa-edit"></i>
              <p>
                Selection
              </p>
            </a>
          </li>
          
                    <li class="nav-item">
            <a href="pages/calendar.html" class="nav-link">
              <i class="nav-icon far fa-calendar-alt"></i>
              <p>
                Selection
              </p>
            </a>
          </li>
*/
?>
          <li class="nav-item">
            <a href="<?=WEB?>user/logout" class="nav-link">
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