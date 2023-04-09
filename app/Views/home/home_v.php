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

<!-- Pengumuman -->
<div class="bg-light p-4">
  <div class="container">
    <div class="row text-center">
      <h4 class="fw-bold ">Pengumuman</h4>
      <p class="text-dark">Pengumuman Pondok kami</p>
    </div>
    <div class="row">
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
  <div class="p-4 mt-n7" id="galeri">
    <div class="row text-center">
      <h4 class="fw-bold ">Galeri</h4>
      <p class="text-dark">Galeri Pondok kami</p>
    </div>
    <div class="row">
      <?php foreach ($galery as $r) : ?>
        <div class="col-12  col-md-6 col-lg-4 ">
          <div class="card mb-2">
            <div class="text-center">
              <img src="<?= base_url() . 'img/galery/' . $r['file'] ?>" class="img-fluid card-img-top rounded" style="min-height:200px; max-height:200px; object-fit:fill">
              <h6><?= $r['caption'] ?></h6>
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
      <div class="col-md-8 offset-md-2">
        <div class="row text-center">
          <h4 class="fw-bold ">Lokasi</h4>
          <p class="text-dark">Lokasi Pondok kami</p>
        </div>
        <iframe src="<?= $profilApp['lokasi_pondok'] ?>" width="100%" height="400" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
      </div>
    </div>
  </div>

</div>

<?= $this->endSection() ?>