<?php
$uri = service('uri');

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="<?= base_url() . 'ustadz/' ?>" class="brand-link">
    <img src="<?= base_url() . 'img/icon/' . $profilApp['logo'] ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><?= $profilApp['nama_aplikasi'] ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">

      </div>
      <div class="info">
        <a href="<?= base_url() . 'ustadz/pengguna' ?>" class="d-block"><?= session()->get('ustadz')['nama'] ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= base_url() ?>ustadz/dashboard" class="nav-link <?= ($uri->getSegment(2) == 'dashboard') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>ustadz/keasramaan" class="nav-link <?= ($uri->getSegment(2) == 'keasramaan') ? 'active' : '' ?>">
            <i class="nav-icon fa fa-bookmark"></i>
            <p>
              Keasramaan
            </p>
          </a>
        </li>

        <li class="nav-header">Setting</li>
        <li class="nav-item">
          <a href="<?= base_url() ?>" class="nav-link " target="_blank">
            <i class="nav-icon fas fa-home"></i>
            <p>
              Homepage
            </p>
          </a>
        </li>

        <li class="nav-item">
          <a href="<?= base_url() ?>logout" class="nav-link  text-danger">
            <i class="nav-icon fas fa-sign-out-alt"></i>
            <p>
              Logout

            </p>
          </a>
        </li>
      </ul>
    </nav>
    <!-- /.sidebar-menu -->
  </div>
  <!-- /.sidebar -->
</aside>