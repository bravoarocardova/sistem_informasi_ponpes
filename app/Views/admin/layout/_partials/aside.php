<?php
$uri = service('uri');
?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?= base_url() ?>img/AdminLTELogo.png" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light">Ponpes</span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() . 'img/profil/' . session()->get('admin')['foto'] ?>" class="img-circle elevation-2" alt="User Image">
      </div>
      <div class="info">
        <a href="#" class="d-block"><?= session()->get('admin')['nama'] ?></a>
      </div>
    </div>
    <!-- Sidebar Menu -->
    <nav class="mt-2">
      <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
        <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
        <li class="nav-item">
          <a href="<?= base_url() ?>admin/dashboard" class="nav-link <?= ($uri->getSegment(2) == 'dashboard') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-tachometer-alt"></i>
            <p>
              Dashboard
              <span class="badge badge-info right">2</span>
            </p>
          </a>
        </li>
        <li class="nav-item menu-open">
          <a href="#" class="nav-link <?= ($uri->getSegment(2) == 'data') ? 'active' : '' ?>">
            <i class="nav-icon fas fa-book"></i>
            <p>
              Data
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url() ?>admin/data/santri" class="nav-link <?= ($uri->getSegment(3) == 'santri') ? 'active text-primary' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Santri</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>admin/data/ustadz" class="nav-link <?= ($uri->getSegment(3) == 'ustadz') ? 'active text-primary' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Data Ustadz</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>admin/pengumuman" class="nav-link <?= ($uri->getSegment(2) == 'pengumuman') ? 'active' : '' ?>">
            <i class="nav-icon fa fa-bullhorn"></i>
            <p>
              Pengumuman
            </p>
          </a>
        </li>
        <li class="nav-header">Setting</li>
        <li class="nav-item">
          <a href="<?= base_url() ?>admin/profil" class="nav-link <?= ($uri->getSegment(2) == 'profil') ? 'active' : '' ?>">
            <i class="nav-icon fa fa-id-card"></i>
            <p>
              Profil
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>admin/logout" class="nav-link  text-danger">
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