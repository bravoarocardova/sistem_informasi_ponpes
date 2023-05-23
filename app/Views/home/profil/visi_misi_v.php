<?= $this->extend('home/layout/layout_v') ?>
<?= $this->section('content') ?>

<!-- Sejarah -->
<div class="p-4">
  <div class="container">

    <div class="row mt-5">

      <div class="col-md-12 col-lg-8 mb-4">
        <div class="row mb-5">
          <div class="col-12">
            <div class="card ps-4 bg-light">
              <div class="row mt-n5">
                <div class="card w-auto bg- ">
                  <div class="col-md-12 d-flex align-items-center p-3">
                    <img src="<?= base_url() . 'img/icon/' . $profilApp['logo'] ?>" alt="" style="width:50px;height:50px">
                    <div class="ms-4">
                      <h4 class="fw-bold ">Visi</h4>
                      <p class="text-dark">Visi <?= $profilApp['nama_pondok'] ?></p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mt-4 me-2 mb-2">
                <?= $profilApp['visi'] ?>
              </div>

            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12 mt-3">
            <div class="card ps-4 bg-light">
              <div class="row mt-n5">
                <div class="card w-auto ">
                  <div class="col-md-12 d-flex align-items-center p-3 ">
                    <img src="<?= base_url() . 'img/icon/' . $profilApp['logo'] ?>" alt="" style="width:50px;height:50px">
                    <div class="ms-4">
                      <h4 class="fw-bold ">Misi</h4>
                      <p class="text-dark">Misi <?= $profilApp['nama_pondok'] ?></p>
                    </div>
                  </div>
                </div>
              </div>

              <div class="row mt-4 me-2 mb-2">
                <?= $profilApp['misi'] ?>
              </div>

            </div>
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
              <a href="<?= base_url() . 'sejarah' ?>" class="text-decoration-none">Sejarah</a>
            </div>
            <div class="row border-top p-3">
              <a href="<?= base_url() . 'visi-misi' ?>" class="text-decoration-none link-dark">Visi & Misi</a>
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

<?= $this->endSection() ?>