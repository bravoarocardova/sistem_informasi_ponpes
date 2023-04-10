<?= $this->extend('home/layout/layout_v') ?>
<?= $this->section('content') ?>

<!-- Pengumuman -->
<div class="p-4">
  <div class="container">
    <div class="card p-3 bg-light">
      <div class="row text-center">
        <h4 class="fw-bold ">Pengumuman</h4>
        <p class="text-dark">Pengumuman Pondok kami</p>
      </div>
    </div>
    <div class="row mt-2">
      <div class="col-md-12 col-lg-8">
        <div class="card">
          <img src="<?= base_url() . 'img/pengumuman/' . $pengumuman['gambar'] ?>" class="rounded w-100">

          <h4 class="mt-4 ms-2">
            <?= $pengumuman['judul'] ?>
          </h4>
          <div class="row text-start p-2 ">
            <div class="col-12">
              <?= $pengumuman['created_at'] ?>
            </div>
            <div class="col-12">
              by : <?= $pengumuman['penulis'] ?>
            </div>
          </div>
          <div class="row mt-4 ms-1">
            <div class="col-12">
              <?= $pengumuman['isi'] ?>
            </div>
          </div>
        </div>

      </div>
      <div class="col-md-12 col-lg-4">
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

<?= $this->endSection() ?>