<?php $uri = service('uri') ?>
<header class="">
  <nav class="navbar bg-light" id="navbarscrl">
    <div class="d-flex flex-wrap justify-content-center py-1 container">
      <a href="<?= base_url() ?>" class="d-flex align-items-center mb-3 mb-md-0 me-md-auto text-dark text-decoration-none">
        <img src="<?= base_url() . 'img/icon/' . $profilApp['logo'] ?>" alt="" style="width:50px">
        <span class="fs-4 ms-2"><?= $profilApp['nama_pondok'] ?></span>
      </a>

      <ul class="nav ">
        <li class="nav-item"><a href="<?= base_url() ?>" class="nav-link <?= ($uri->getSegment(1) == '') ? 'link-secondary' : 'link-dark' ?>" aria-current="page">Home</a></li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= ($uri->getSegment(1) == 'profil') ? 'link-secondary' : 'link-dark' ?>" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Profil</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown04">
            <li><a class="dropdown-item" href="<?= base_url() . 'sejarah' ?>">Sejarah</a></li>
            <li><a class="dropdown-item" href="<?= base_url() . 'visi-misi' ?>">Visi & Misi</a></li>
            <li><a class="dropdown-item" href="<?= base_url() . 'struktur-organisasi' ?>">Struktur Organisasi</a></li>
            <li><a class="dropdown-item" href="<?= base_url() . 'peraturan-pondok' ?>">Peraturan Pondok</a></li>
          </ul>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle <?= ($uri->getSegment(1) == 'pengumuman') ? 'link-secondary' : 'link-dark' ?>" href="#" id="dropdown04" data-bs-toggle="dropdown" aria-expanded="false">Pengumuman</a>
          <ul class="dropdown-menu" aria-labelledby="dropdown04">
            <li><a class="dropdown-item" href="<?= base_url() . 'pengumuman' ?>">Semua</a></li>
            <li><a class="dropdown-item" href="<?= base_url() . 'pengumuman/berita' ?>">Berita</a></li>
            <li><a class="dropdown-item" href="<?= base_url() . 'pengumuman/kelulusan' ?>">Kelulusan</a></li>
          </ul>
        </li>
        <li class="nav-item"><a href="<?= base_url() . 'pendaftaran' ?>" class="nav-link <?= ($uri->getSegment(1) == 'pendaftaran') ? 'link-secondary' : 'link-dark' ?>">Pendaftaran</a></li>
        <li class="nav-item"><a href="<?= base_url() . 'kegiatan' ?>" class="nav-link <?= ($uri->getSegment(1) == 'kegiatan') ? 'link-secondary' : 'link-dark' ?>">Kegiatan</a></li>
        <li class="nav-item"><a href="<?= base_url() . 'galery' ?>" class="nav-link <?= ($uri->getSegment(1) == 'galery') ? 'link-secondary' : 'link-dark' ?>">Galeri</a></li>
        <li class="nav-item"><a href="<?= base_url() . 'login' ?>" class="nav-link link-dark "><i class="fa fa-sign-in-alt"></i> Login</a></li>
      </ul>
    </div>
  </nav>
</header>