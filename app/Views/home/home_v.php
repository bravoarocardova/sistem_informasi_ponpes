<?= $this->extend('home/layout/layout_v') ?>
<?= $this->section('content') ?>

<!-- Carousel -->
<div id="myCarousel" class="carousel slide " data-bs-ride="carousel">
  <div class="carousel-indicators">
    <?php foreach ($slideshow as $index => $v) : ?>
      <button type="button" data-bs-target="#myCarousel" data-bs-slide-to="<?= $index ?>" class="<?= ($index == 0) ? 'active' : '' ?>" aria-current="true" aria-label="Slide <?= $index ?>"></button>
    <?php endforeach ?>
  </div>
  <div class="carousel-inner">

    <?php foreach ($slideshow as $index => $v) : ?>
      <div class="carousel-item <?= ($index == 0) ? 'active' : '' ?>" data-bs-interval="4000">
        <img src="<?= base_url() . 'img/slideshow/' . $v['slideshow'] ?>" height="500px" class="img-carousel d-block w-100">

        <div class="container">
          <div class="carousel-caption <?= 'text-' . $v['align'] ?>">
            <h1 class="text-dark"><?= $v['judul'] ?></h1>
            <p class="text-dark"><?= $v['caption'] ?></p>
          </div>
        </div>
      </div>
    <?php endforeach ?>

  </div>
  <button class="carousel-control-prev" type="button" data-bs-target="#myCarousel" data-bs-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Previous</span>
  </button>
  <button class="carousel-control-next" type="button" data-bs-target="#myCarousel" data-bs-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="visually-hidden">Next</span>
  </button>
</div>
<!-- End Carousel -->

<!-- Sejarah -->
<div class="p-4">
  <div class="container">

    <div class="row mt-5">

      <div class="col-md-12 col-lg-8 mb-4">
        <div class="card ps-4 bg-light">
          <div class="row mt-n5">
            <div class="card w-auto">
              <div class="col-md-12 d-flex align-items-center p-3">
                <img src="<?= base_url() . 'img/icon/' . $profilApp['logo'] ?>" alt="" style="width:50px;height:50px">
                <div class="ms-4">
                  <h4 class="fw-bold ">Sejarah</h4>
                  <p class="text-dark">Sejarah <?= $profilApp['nama_pondok'] ?></p>
                </div>
              </div>
            </div>
          </div>

          <div class="row mt-4">
            <?= substr($profilApp['sejarah'], 0, 700) ?>
            <a href="<?= base_url() . 'sejarah' ?>" class="text-decoration-none"> <i class="fa fa-angle-double-right"></i> Lihat Selengkapnya</a>
          </div>

        </div>

      </div>

      <div class="col-md-12 col-lg-4 ">
        <div class="card">
          <div class="card-title p-2 ">
            <h3>Profil</h3>
          </div>
          <div class="card-body">
            <div class="row border-top p-3">
              <a href="<?= base_url() . 'sejarah' ?>" class="text-decoration-none link-dark">Sejarah</a>
            </div>
            <div class="row border-top p-3">
              <a href="<?= base_url() . 'visi-misi' ?>" class="text-decoration-none">Visi & Misi</a>
            </div>
            <div class="row border-top p-3">
              <a href="<?= base_url() . 'struktur-organisasi' ?>" class="text-decoration-none">Struktur Organisasi</a>
            </div>
            <div class="row border-top p-3">
              <a href="<?= base_url() . 'peraturan-pondok' ?>" class="text-decoration-none">Peraturan Pondok</a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- End Sejarah -->

<!-- Pengumuman -->
<div class="bg-light p-4">
  <div class="container">
    <div class="card p-3">
      <div class="row text-center">
        <h4 class="fw-bold ">Pengumuman</h4>
        <p class="text-dark">Pengumuman Pondok kami</p>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-md-12 col-lg-7">
        <div class="row">
          <?php foreach ($pengumuman as $r) : ?>
            <div class=" col-md-6 col-lg-6 ">
              <div class="card mb-2">
                <div class="">
                  <img src="<?= base_url() . 'img/pengumuman/' . $r['gambar'] ?>" class="img-fluid card-img-top rounded" style="min-height:200px; max-height:200px; object-fit:fill">
                  <h6 class="mx-4 my-2">
                    <a href="<?= base_url() . 'pengumuman/' . $r['id_pengumuman'] ?>" class="text-decoration-none text-">
                      <?= $r['judul'] ?>
                    </a>
                  </h6>
                  <div class="row text-start p-2 ms-auto">
                    <div class="col-12">
                      <i class="fa fa-calendar-check-o"></i>
                      <?= $r['created_at'] ?>
                    </div>
                    <div class="col-12">
                      <i class="fa fa-user"></i>
                      by : <?= $r['penulis'] ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          <?php endforeach ?>
        </div>
      </div>
      <div class="col-md-12 col-lg-5">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Pengumuman Lainnya</h5>
            <?php foreach ($pengumuman_aside as $r) : ?>
              <div class="row mb-2 border-top p-2">
                <div class="col-4">
                  <img src="<?= base_url() . 'img/pengumuman/' . $r['gambar'] ?>" class="img-fluid card-img-top rounded" style="min-height:4.5rem; max-height:4.5rem; object-fit:fill">
                </div>
                <div class="col-8">
                  <div class="row">
                    <div class="col-12">
                      <h6 class="">
                        <a href="<?= base_url() . 'pengumuman/' . $r['id_pengumuman'] ?>" class="text-decoration-none text-">
                          <?= $r['judul'] ?>
                        </a>
                      </h6>
                    </div>
                    <div class="col-12">
                      <?= $r['created_at'] ?>
                    </div>
                    <div class="col-12">
                      <i class="fa fa-user"></i>
                      by : <?= $r['penulis'] ?>
                    </div>
                  </div>
                </div>
              </div>
            <?php endforeach ?>
          </div>
        </div>
      </div>
    </div>
  </div>

</div>
<!-- End Pengumuman -->

<!-- galeri -->
<div class="container">
  <div class="p-4" id="galeri">
    <div class="card p-3 bg-light">
      <div class="row text-center">
        <h4 class="fw-bold ">Galeri</h4>
        <p class="text-dark">Galeri Pondok kami</p>
      </div>
    </div>
    <div class="row mt-2">
      <?php foreach ($galery as $r) : ?>
        <div class="col-12  col-md-6 col-lg-4 ">
          <div class="card mb-2">
            <div class="text-center">
              <img src="<?= base_url() . 'img/galery/' . $r['file'] ?>" class="img-fluid card-img-top rounded" style="min-height:200px; max-height:200px; object-fit:fill">
              <h6 class="p-2"><?= $r['caption'] ?></h6>
            </div>
          </div>
        </div>
      <?php endforeach ?>
    </div>
  </div>
</div>
<!-- end galeri -->

<div class="bg-light">
  <div class="container p-4">
    <div class="row">
      <div class="col-md-10 offset-md-1">
        <div class="card p-3">
          <div class="row text-center">
            <h4 class="fw-bold ">Lokasi</h4>
            <p class="text-dark">Lokasi Pondok kami</p>
          </div>
        </div>
        <div class="row mt-4">
          <div class="col-md-8">
            <iframe src="<?= $profilApp['lokasi_pondok'] ?>" width="100%" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
          </div>
          <div class="col-md-4">
            <div class="row">
              <h5 class="fw-bolder ">Alamat</h5>
              <p class="">
                <?= $profilApp['alamat_pondok'] ?>
              </p>
            </div>
            <div class="row">
              <h5 class="fw-bolder ">Kontak</h5>
              <p class="">
                <i class="fa fa-phone"></i>
                <?= $profilApp['telepon_pondok'] ?>
              </p>
              <p class="">
                <i class="fa fa-envelope"></i>
                <?= $profilApp['email_pondok'] ?>
              </p>
            </div>
          </div>
        </div>

      </div>
    </div>
  </div>

</div>

<?= $this->endSection() ?>