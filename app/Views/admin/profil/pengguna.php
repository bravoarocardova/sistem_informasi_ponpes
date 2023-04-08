<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profil Pengguna</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Profil</a></li>
            <li class="breadcrumb-item active">Pengguna</li>
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
          <?= session()->get('msg') ?>
          <div class="card">
            <div class="card-header">
              <h4>Profil</h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="edit" value="profil">
                <div class="row">
                  <div class="col-md-3">
                    <div class="mb-3">
                      <img alt="" src="<?= ($admin != null) ? base_url() . 'img/profil/' . $admin['foto'] : '' ?>" class="rounded img-responsive mt-2" width="128" height="128" id="img-foto-upload">
                      <div class="mt-2">
                        <label for="foto">
                          <span class="btn btn-primary"><i class="fas fa-upload"></i> Pilih Foto</span>
                        </label>
                        <input type="file" name="foto" id="foto" class="d-none <?= validation_show_error('foto') ? 'is-invalid' : '' ?>" onchange="document.getElementById('img-foto-upload').src = window.URL.createObjectURL(this.files[0])">
                        <div class=" invalid-feedback">
                          <?= validation_show_error('foto') ?>
                        </div>
                      </div>
                      <small>For best results, use an image in .jpg .png format</small>
                    </div>
                  </div>
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="username">Username</label>
                      <input type="text" class="form-control <?= validation_show_error('username') ? 'is-invalid' : '' ?>" id="username" name="username" value="<?= old('username', $admin['username'] ?? '') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('username') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="nama">Nama</label>
                      <input type="text" class="form-control <?= validation_show_error('nama') ? 'is-invalid' : '' ?>" id="nama" name="nama" value="<?= old('nama', $admin['nama'] ?? '') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('nama') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="email">Email</label>
                      <textarea name="email" id="email" cols="30" rows="2" class="form-control <?= validation_show_error('email') ? 'is-invalid' : '' ?>"><?= old('email', $admin['email'] ?? '') ?></textarea>
                      <div class="invalid-feedback">
                        <?= validation_show_error('email') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="no_telp">No Telp</label>
                      <input type="text" class="form-control <?= validation_show_error('no_telp') ? 'is-invalid' : '' ?>" id="no_telp" name="no_telp" value="<?= old('no_telp', $admin['no_telp'] ?? '') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('no_telp') ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="text-center">
                  <a href="javascript:history.back()" class="btn btn-danger">Cancel</a>
                  <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
              </form>

            </div>
            <!-- /.card-body -->
          </div>

          <div class="card">
            <div class="card-header">
              <h4>Update Password</h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="edit" value="password">
                <div class="row">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="old_password">Password Lama</label>
                      <input type="text" class="form-control <?= validation_show_error('old_password') ? 'is-invalid' : '' ?>" id="old_password" name="old_password" placeholder="Password Lama">
                      <div class="invalid-feedback">
                        <?= validation_show_error('old_password') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="new_password">Password Baru</label>
                      <input type="text" class="form-control <?= validation_show_error('new_password') ? 'is-invalid' : '' ?>" id="new_password" name="new_password" placeholder="Password Baru">
                      <div class="invalid-feedback">
                        <?= validation_show_error('new_password') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="password_verify">Konfirmasi Password Baru</label>
                      <input type="text" class="form-control <?= validation_show_error('password_verify') ? 'is-invalid' : '' ?>" id="password_verify" name="password_verify" placeholder="Konfirmasi Password Baru">
                      <div class="invalid-feedback">
                        <?= validation_show_error('password_verify') ?>
                      </div>
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