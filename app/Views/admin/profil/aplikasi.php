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
                      <img alt="" src="<?= ($profil != null) ? base_url() . 'img/icon/' . $profil['logo'] : '' ?>" class="rounded img-responsive mt-2" width="128" height="128" id="img-logo-upload">
                      <div class="mt-2">
                        <label for="logo">
                          <span class="btn btn-primary"><i class="fas fa-upload"></i> Pilih Logo</span>
                        </label>
                        <input type="file" name="logo" id="logo" class="d-none <?= validation_show_error('logo') ? 'is-invalid' : '' ?>" onchange="document.getElementById('img-logo-upload').src = window.URL.createObjectURL(this.files[0])">
                        <div class=" invalid-feedback">
                          <?= validation_show_error('logo') ?>
                        </div>
                      </div>
                      <small>For best results, use an image at least 128px by 128px in .png format</small>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="nama_aplikasi">Nama Aplikasi</label>
                      <input type="text" class="form-control <?= validation_show_error('nama_aplikasi') ? 'is-invalid' : '' ?>" id="nama_aplikasi" name="nama_aplikasi" placeholder="Nama Aplikasi" value="<?= old('nama_aplikasi', $profil['nama_aplikasi'] ?? '') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('nama_aplikasi') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="nama_pondok">Nama Pondok</label>
                      <input type="text" class="form-control <?= validation_show_error('nama_pondok') ? 'is-invalid' : '' ?>" id="nama_pondok" name="nama_pondok" placeholder="Nama Pondok" value="<?= old('nama_pondok', $profil['nama_pondok'] ?? '') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('nama_pondok') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="alamat_pondok">Alamat Pondok</label>
                      <textarea name="alamat_pondok" id="alamat_pondok" cols="30" rows="2" placeholder="Alamat Pondok" class="form-control <?= validation_show_error('alamat_pondok') ? 'is-invalid' : '' ?>"><?= old('alamat_pondok', $profil['alamat_pondok'] ?? '') ?></textarea>
                      <div class="invalid-feedback">
                        <?= validation_show_error('alamat_pondok') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="telepon_pondok">Telepon Pondok</label>
                      <input type="text" class="form-control <?= validation_show_error('telepon_pondok') ? 'is-invalid' : '' ?>" id="telepon_pondok" name="telepon_pondok" placeholder="Telepon Pondok" value="<?= old('telepon_pondok', $profil['telepon_pondok'] ?? '') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('telepon_pondok') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="email_pondok">Email Pondok</label>
                      <input type="email" class="form-control <?= validation_show_error('email_pondok') ? 'is-invalid' : '' ?>" id="email_pondok" name="email_pondok" placeholder="Email Pondok" value="<?= old('email_pondok', $profil['email_pondok'] ?? '') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('email_pondok') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="lokasi_pondok">Lokasi Pondok</label>
                      <input type="text" class="form-control <?= validation_show_error('lokasi_pondok') ? 'is-invalid' : '' ?>" id="lokasi_pondok" name="lokasi_pondok" placeholder="Lokasi Pondok (latitude , longitude)" value="<?= old('lokasi_pondok', $profil['lokasi_pondok'] ?? '') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('lokasi_pondok') ?>
                      </div>
                      <small>(latitude , longitude)</small>
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