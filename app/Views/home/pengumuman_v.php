<?= $this->extend('home/layout/layout_v') ?>
<?= $this->section('content') ?>

<!-- Pengumuman -->
<div class="bg-white p-4">
  <div class="container">
    <div class="card p-3 bg-light">
      <div class="row text-center">
        <h4 class="fw-bold ">Pengumuman</h4>
        <p class="text-dark">Pengumuman Pondok kami</p>
      </div>
    </div>
    <div class="row mt-2">
      <?php foreach ($pengumuman as $r) : ?>
        <div class=" col-md-6 col-lg-4 ">
          <div class="card mb-2">
            <div class="">
              <img src="<?= base_url() . 'img/pengumuman/' . $r['gambar'] ?>" class="img-fluid card-img-top rounded" style="min-height:200px; max-height:200px; object-fit:fill">
              <h6 class="mx-4 my-2">
                <a href="<?= base_url() . 'pengumuman/' . $r['id_pengumuman'] ?>" class="text-decoration-none text-dark fw-bold">
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

</div>
<!-- End Pengumuman -->

<?= $this->endSection() ?>