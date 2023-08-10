<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Ustadz</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active">Ustadz</li>
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
              <h3 class="card-title">

              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>
                <input type="hidden" name="_method" value="PUT">
                <div class="row">
                  <div class="col-md-8">
                    <div class="mb-3">
                      <label class="form-label" for="kd_ustadz">Kode Ustadz</label>
                      <input type="text" class="form-control <?= validation_show_error('kd_ustadz') ? 'is-invalid' : '' ?>" id="kd_ustadz" name="kd_ustadz" placeholder="Kode Ustadz" value="<?= old('kd_ustadz', $ustadz['kd_ustadz']) ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('kd_ustadz')
                        ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="password">Password (kosongkan jika tidak ingin diubah)</label>
                      <input type="password" class="form-control <?= validation_show_error('password') ? 'is-invalid' : '' ?>" id="password" name="password" placeholder="Password" value="">
                      <div class="invalid-feedback">
                        <?= validation_show_error('password') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="nama_ustadz">Nama Ustadz</label>
                      <input type="text" class="form-control <?= validation_show_error('nama_ustadz') ? 'is-invalid' : '' ?>" id="nama_ustadz" name="nama_ustadz" placeholder="Nama Santri" value="<?= old('nama_ustadz', $ustadz['nama_ustadz']) ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('nama_ustadz')
                        ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <div class="row">
                        <div class="col-6">
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
                        <div class="col-6">
                          <label class="form-label" for="inputtgl_lahir">Tanggal lahir</label>
                          <input type="date" class="form-control <?= validation_show_error('tgl_lahir') ? 'is-invalid' : '' ?>" id="inputtgl_lahir" name="tgl_lahir" value="<?= old('tgl_lahir', $ustadz['tgl_lahir']) ?>">
                          <div class="invalid-feedback">
                            <?= validation_show_error('tgl_lahir')
                            ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="inputalamat">Alamat</label>
                      <textarea name="alamat" id="inputalamat" cols="30" rows="3" class="form-control <?= validation_show_error('alamat') ? 'is-invalid' : '' ?>" placeholder="Alamat"><?= old('alamat', $ustadz['alamat']) ?></textarea>
                      <div class="invalid-feedback">
                        <?= validation_show_error('alamat')
                        ?>
                      </div>
                    </div>
                    <div class=" mb-3">
                      <label class="form-label" for="inputno_telp">No Telp </label>
                      <input type="text" class="form-control <?= validation_show_error('no_telp') ? 'is-invalid' : '' ?>" id="inputno_telp" name="no_telp" placeholder="No Telp" value="<?= old('no_telp', $ustadz['no_telp']) ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('no_telp')
                        ?>
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