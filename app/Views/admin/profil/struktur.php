<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profil Aplikasi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Profil</a></li>
            <li class="breadcrumb-item active">Aplikasi</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->

  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <!-- Main row -->
      <div class="row">
        <div class="col-12">
          <div class="card">
            <div class="card-header">
              <?= session()->get('msg') ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="row">
                  <div class="col-md-8">
                    <div class="mb-3">
                      <img alt="" src="<?= ($profilApp != null) ? base_url() . 'img/struktur/' . $profilApp['struktur_pondok'] : '' ?>" class="rounded img-responsive mt-2" width="512" height="512" id="img-struktur_pondok-upload">
                      <div class="mt-2">
                        <label for="struktur_pondok">
                          <span class="btn btn-primary"><i class="fas fa-upload"></i> Pilih Struktur</span>
                        </label>
                        <input type="file" name="struktur_pondok" id="struktur_pondok" class="d-none <?= validation_show_error('struktur_pondok') ? 'is-invalid' : '' ?>" onchange="document.getElementById('img-struktur_pondok-upload').src = window.URL.createObjectURL(this.files[0])">
                        <div class=" invalid-feedback">
                          <?= validation_show_error('struktur_pondok') ?>
                        </div>
                      </div>
                      <small>For best results, use an image at least 128px by 128px in .png format</small>
                    </div>
                  </div>
                </div>
                <a href="javascript:history.back()" class="btn btn-danger">Cancel</a>
                <button type="submit" class="btn btn-primary">Simpan</button>
              </form>

            </div>
            <!-- /.card-body -->
          </div>
        </div>
      </div>
      <!-- /.row (main row) -->
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
</div>

<?= $this->endSection() ?>