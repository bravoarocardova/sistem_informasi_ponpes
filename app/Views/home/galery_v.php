<?= $this->extend('home/layout/layout_v') ?>
<?= $this->section('content') ?>

<!-- galeri -->
<div class="container">
  <div class="p-4 mt-n7" id="galeri">
    <div class="row text-center">
      <h4 class="fw-bold ">Galeri</h4>
      <p class="text-dark">Galeri Pondok kami</p>
    </div>
    <div class="row">
      <?php foreach ($galery as $r) : ?>
        <div class="col-6 col-md-6 col-lg-4">
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


<?= $this->endSection() ?>