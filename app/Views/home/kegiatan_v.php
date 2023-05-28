<?= $this->extend('home/layout/layout_v') ?>
<?= $this->section('content') ?>

<!-- Kegiatan -->
<div class="p-4">
  <div class="container">

    <div class="row">
      <div class="col">
        <h3>Daftar Kegiatan <?= $profilApp['nama_pondok'] ?></h3>
      </div>
    </div>
    <div class="row mt-4">
      <div class="col-md-12 col-lg-8 mb-4">

        <!-- <?php foreach ($kegiatan as $r) : ?>
          <div class="card ps-4 bg-light mb-4">
            <div class="row mt">
              <div class="col-md-4">
                <div class="card w-auto ">
                  <div class="col-md-12 d-flex align-items-center p-3">
                    <div class="ms-4">
                      <h4 class="fw-bold "><?= $r['hari_kegiatan'] ?></h4>
                      <p class="text-dark">Kegiatan Hari <?= $r['hari_kegiatan'] ?></p>
                    </div>
                  </div>
                </div>
              </div>
              <div class="col-md-8">
                <div class="row mt-4 me-2 mb-2">
                  <?= $r['kegiatan'] ?>
                </div>
              </div>
            </div>
          </div>
        <?php endforeach ?> -->

        <table id="example1" class="table table-bordered table-striped ">
          <thead>
            <tr>
              <th>HARI KEGIATAN</th>
              <th>KEGIATAN</th>
              <th>TANGGAL UPDATE</th>
            </tr>
          </thead>
          <tbody>
            <?php foreach ($kegiatan as $r) : ?>
              <tr>
                <td><?= $r['hari_kegiatan'] ?></td>
                <td><?= $r['kegiatan'] ?></td>
                <td><?= $r['created_at'] ?></td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>

      </div>

      <div class="col-md-12 col-lg-4 ">
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
                        <a href="<?= base_url() . 'pengumuman/' . $r['id_pengumuman'] ?>" class="text-decoration-none text-dark fw-bold">
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
<!-- End Kegiatan -->


<?= $this->endSection() ?>