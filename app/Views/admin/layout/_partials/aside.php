<?php
$uri = service('uri');

?>

<aside class="main-sidebar sidebar-dark-primary elevation-4">
  <!-- Brand Logo -->
  <a href="index3.html" class="brand-link">
    <img src="<?= base_url() . 'img/icon/' . $profilApp['logo'] ?>" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
    <span class="brand-text font-weight-light"><?= $profilApp['nama_aplikasi'] ?></span>
  </a>

  <!-- Sidebar -->
  <div class="sidebar">
    <!-- Sidebar user panel (optional) -->
    <div class="user-panel mt-3 pb-3 mb-3 d-flex">
      <div class="image">
        <img src="<?= base_url() . 'img/profil/' . session()->get('admin')['foto'] ?>" class="img-circle elevation-2" style="width:40px;height:40px;object-fit:cover" alt="User Image">
      </div>
      <div class="info">
        <a href="<?= base_url() . 'admin/pengguna' ?>" class="d-block"><?= session()->get('admin')['nama'] ?></a>
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
            </p>
          </a>
        </li>
        <li class="nav-item <?= ($uri->getSegment(2) == 'data') ? 'menu-open' : '' ?>">
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
          <a href="<?= base_url() ?>admin/penerimaan" class="nav-link <?= ($uri->getSegment(2) == 'penerimaan') ? 'active' : '' ?>">
            <i class="nav-icon fa fa-user-plus"></i>
            <p>
              Penerimaan
              <span class="badge badge-danger right" id="badge-penerimaan"><?= jumlah_pendaftar() ?></span>
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>admin/pengumuman" class="nav-link <?= ($uri->getSegment(2) == 'pengumuman') ? 'active' : '' ?>">
            <i class="nav-icon fa fa-bullhorn"></i>
            <p>
              Pengumuman
            </p>
          </a>
        </li>
        <li class="nav-header">Profil</li>
        <li class="nav-item">
          <a href="<?= base_url() ?>admin/galery" class="nav-link <?= ($uri->getSegment(2) == 'galery') ? 'active' : '' ?>">
            <i class="nav-icon fa fa-camera"></i>
            <p>
              Galery
            </p>
          </a>
        </li>
        <li class="nav-item">
          <a href="<?= base_url() ?>admin/slideshow" class="nav-link <?= ($uri->getSegment(2) == 'slideshow') ? 'active' : '' ?>">
            <i class="nav-icon fa fa-columns"></i>
            <p>
              Slideshow
            </p>
          </a>
        </li>
        <li class="nav-item <?= ($uri->getSegment(2) == 'profil') ? 'menu-open' : '' ?>">
          <a href="#" class="nav-link <?= ($uri->getSegment(2) == 'profil') ? 'active' : '' ?>">
            <i class="nav-icon fa fa-id-card"></i>
            <p>
              Profil
              <i class="right fas fa-angle-left"></i>
            </p>
          </a>
          <ul class="nav nav-treeview">
            <li class="nav-item">
              <a href="<?= base_url() ?>admin/profil/aplikasi" class="nav-link <?= ($uri->getSegment(3) == 'aplikasi') ? 'active text-primary' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Aplikasi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>admin/profil/sejarah" class="nav-link <?= ($uri->getSegment(3) == 'sejarah') ? 'active text-primary' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Sejarah</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>admin/profil/visi_misi" class="nav-link <?= ($uri->getSegment(3) == 'visi_misi') ? 'active text-primary' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Visi & Misi</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>admin/profil/struktur" class="nav-link <?= ($uri->getSegment(3) == 'struktur') ? 'active text-primary' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Struktur</p>
              </a>
            </li>
            <li class="nav-item">
              <a href="<?= base_url() ?>admin/profil/peraturan_pondok" class="nav-link <?= ($uri->getSegment(3) == 'peraturan_pondok') ? 'active text-primary' : '' ?>">
                <i class="far fa-circle nav-icon"></i>
                <p>Peraturan Pondok</p>
              </a>
            </li>
          </ul>
        </li>
        <li class="nav-header">Setting</li>

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