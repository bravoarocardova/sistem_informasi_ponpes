<?= $this->extend('ustadz/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profil Ustadz</h1>
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
              <h4><?= session()->get('ustadz')['kd_ustadz'] . " - " . session()->get('ustadz')['nama']; ?></h4>
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
                      <label class="form-label" for="kd_ustadz">Kode Ustadz</label>
                      <input type="text" class="form-control <?= validation_show_error('kd_ustadz') ? 'is-invalid' : '' ?>" id="kd_ustadz" value="<?= old('kd_ustadz', $ustadz['kd_ustadz'] ?? '') ?>" disabled>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="nama_ustadz">Nama Ustadz</label>
                      <input type="text" class="form-control <?= validation_show_error('nama_ustadz') ? 'is-invalid' : '' ?>" id="nama_ustadz" name="nama_ustadz" value="<?= old('nama_ustadz', $ustadz['nama_ustadz'] ?? '') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('nama_ustadz') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="inputjk">Jenis Kelamin</label>
                      <select name="jk" id="inputjk" class="form-control <?= validation_show_error('jk') ? 'is-invalid' : '' ?>">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="L" <?= (old('jk', $ustadz['jk']) == 'L' ? 'selected' : '') ?>>Laki-Laki</option>
                        <option value="P" <?= (old('jk', $ustadz['jk']) == 'P' ? 'selected' : '') ?>>Perempuan</option>
                      </select>
                      <div class="invalid-feedback">
                        <?= validation_show_error('jk') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="tgl_lahir">Tanggal Lahir</label>
                      <input type="date" class="form-control <?= validation_show_error('tgl_lahir') ? 'is-invalid' : '' ?>" id="tgl_lahir" name="tgl_lahir" value="<?= old('tgl_lahir', $ustadz['tgl_lahir'] ?? '') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('tgl_lahir') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="alamat">Alamat Lengkap</label>
                      <textarea name="alamat" id="alamat" cols="30" rows="2" class="form-control <?= validation_show_error('alamat') ? 'is-invalid' : '' ?>"><?= old('alamat', $ustadz['alamat'] ?? '') ?></textarea>
                      <div class="invalid-feedback">
                        <?= validation_show_error('alamat') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="no_telp">No Telp</label>
                      <input type="text" class="form-control <?= validation_show_error('no_telp') ? 'is-invalid' : '' ?>" id="no_telp" name="no_telp" value="<?= old('no_telp', $ustadz['no_telp'] ?? '') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('no_telp') ?>
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