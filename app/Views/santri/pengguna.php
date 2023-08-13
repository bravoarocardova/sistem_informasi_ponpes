<?= $this->extend('santri/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profil Santri</h1>
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
              <h4><?= session()->get('santri')['nis'] . " - " . session()->get('santri')['nama']; ?></h4>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <input type="hidden" name="edit" value="profil">
                <div class="row mb-3">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="nis">NIS</label>
                      <input type="text" class="form-control <?= validation_show_error('nis') ? 'is-invalid' : '' ?>" id="nis" value="<?= old('nis', $santri['nis'] ?? '') ?>" disabled>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="nama_santri">Nama Santri</label>
                      <input type="text" class="form-control <?= validation_show_error('nama_santri') ? 'is-invalid' : '' ?>" id="nama_santri" name="nama_santri" value="<?= old('nama_santri', $santri['nama_santri'] ?? '') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('nama_santri') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="inputjk">Jenis Kelamin</label>
                      <select name="jk" id="inputjk" class="form-control <?= validation_show_error('jk') ? 'is-invalid' : '' ?>">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L" <?= (old('jk', $santri['jk']) == 'L' ? 'selected' : '') ?>>Laki-Laki</option>
                        <option value="P" <?= (old('jk', $santri['jk']) == 'P' ? 'selected' : '') ?>>Perempuan</option>
                      </select>
                      <div class="invalid-feedback">
                        <?= validation_show_error('jk') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="tempat_lahir">Tempat Lahir</label>
                      <input type="text" class="form-control <?= validation_show_error('tempat_lahir') ? 'is-invalid' : '' ?>" id="tempat_lahir" name="tempat_lahir" value="<?= old('tempat_lahir', $santri['tempat_lahir'] ?? '') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('tempat_lahir') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                      <input type="date" class="form-control <?= validation_show_error('tgl_lahir') ? 'is-invalid' : '' ?>" id="tgl_lahir" name="tgl_lahir" value="<?= old('tgl_lahir', $santri['tgl_lahir'] ?? '') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('tgl_lahir') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="alamat_lengkap">Alamat Lengkap</label>
                      <textarea name="alamat_lengkap" id="alamat_lengkap" cols="30" rows="2" class="form-control <?= validation_show_error('alamat_lengkap') ? 'is-invalid' : '' ?>"><?= old('alamat_lengkap', $santri['alamat_lengkap'] ?? '') ?></textarea>
                      <div class="invalid-feedback">
                        <?= validation_show_error('alamat_lengkap') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="wali">Wali</label>
                      <input type="text" class="form-control <?= validation_show_error('wali') ? 'is-invalid' : '' ?>" id="wali" name="wali" value="<?= old('wali', $santri['wali'] ?? '') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('wali') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="no_telp_wali">No Telp Wali</label>
                      <input type="text" class="form-control <?= validation_show_error('no_telp_wali') ? 'is-invalid' : '' ?>" id="no_telp_wali" name="no_telp_wali" value="<?= old('no_telp_wali', $santri['no_telp_wali'] ?? '') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('no_telp_wali') ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="">
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
                <div class="row mb-3">
                  <div class="col-md-6">
                    <div class="mb-3">
                      <label class="form-label" for="old_password">Password Lama</label>
                      <input type="password" class="form-control <?= validation_show_error('old_password') ? 'is-invalid' : '' ?>" id="old_password" name="old_password" placeholder="Password Lama">
                      <div class="invalid-feedback">
                        <?= validation_show_error('old_password') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="new_password">Password Baru</label>
                      <input type="password" class="form-control <?= validation_show_error('new_password') ? 'is-invalid' : '' ?>" id="new_password" name="new_password" placeholder="Password Baru">
                      <div class="invalid-feedback">
                        <?= validation_show_error('new_password') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="password_verify">Konfirmasi Password Baru</label>
                      <input type="password" class="form-control <?= validation_show_error('password_verify') ? 'is-invalid' : '' ?>" id="password_verify" name="password_verify" placeholder="Konfirmasi Password Baru">
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