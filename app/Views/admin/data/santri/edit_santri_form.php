<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>

<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Santri</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active">Santri</li>
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
                      <label class="form-label" for="inputnis">NIS</label>
                      <input type="text" class="form-control <?= validation_show_error('nis') ? 'is-invalid' : '' ?>" id="inputnis" name="nis" placeholder="NIS" value="<?= old('nis', $santri['nis']) ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('nis')
                        ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="inputnama_santri">Nama Santri</label>
                      <input type="text" class="form-control <?= validation_show_error('nama_santri') ? 'is-invalid' : '' ?>" id="inputnama_santri" name="nama_santri" placeholder="Nama Santri" value="<?= old('nama_santri', $santri['nama_santri']) ?>">
                      <div class=" invalid-feedback">
                        <?= validation_show_error('nama_santri') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <div class="row">
                        <div class="col-6">
                          <label class="form-label" for="inputtempatlahir">Tempat Lahir</label>
                          <input type="text" class="form-control <?= validation_show_error('tempat_lahir') ? 'is-invalid' : '' ?>" id="inputtempatlahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= old('tempat_lahir', $santri['tempat_lahir']) ?>">
                          <div class=" invalid-feedback">
                            <?= validation_show_error('tempat_lahir') ?>
                          </div>
                        </div>
                        <div class="col-6">
                          <label class="form-label" for="inputtgl_lahir">Tanggal lahir</label>
                          <input type="date" class="form-control <?= validation_show_error('tgl_lahir') ? 'is-invalid' : '' ?>" id="inputtgl_lahir" name="tgl_lahir" value="<?= old('tgl_lahir', $santri['tgl_lahir']) ?>">
                          <div class=" invalid-feedback">
                            <?= validation_show_error('tgl_lahir') ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="mb-3">
                      <div class="row">
                        <div class="col-6">
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
                        <div class="col-6">
                          <label class="form-label" for="inputtgl_masuk">Tanggal Masuk</label>
                          <input type="date" class="form-control <?= validation_show_error('tgl_masuk') ? 'is-invalid' : '' ?>" id="inputtgl_masuk" name="tgl_masuk" value="<?= old('tgl_masuk', $santri['tgl_masuk']) ?>">
                          <div class=" invalid-feedback">
                            <?= validation_show_error('tgl_masuk') ?>
                          </div>
                        </div>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="inputalamat_lengkap">Alamat Lengkap</label>
                      <textarea name="alamat_lengkap" id="inputalamat_lengkap" cols="30" rows="3" class="form-control <?= validation_show_error('alamat_lengkap') ? 'is-invalid' : '' ?>" placeholder="Alamat Lengkap"><?= old('alamat_lengkap', $santri['alamat_lengkap']) ?></textarea>
                      <div class="invalid-feedback">
                        <?= validation_show_error('alamat_lengkap') ?>
                      </div>
                    </div>
                    <div class=" mb-3">
                      <label class="form-label" for="inputWali">Wali</label>
                      <input type="text" class="form-control <?= validation_show_error('wali') ? 'is-invalid' : '' ?>" id="inputWali" name="wali" placeholder="Wali" value="<?= old('wali', $santri['wali']) ?>">
                      <div class=" invalid-feedback">
                        <?= validation_show_error('wali') ?>
                      </div>
                    </div>
                    <div class=" mb-3">
                      <label class="form-label" for="inputno_telp_wali">No Telp Wali</label>
                      <input type="text" class="form-control <?= validation_show_error('no_telp_wali') ? 'is-invalid' : '' ?>" id="inputno_telp_wali" name="no_telp_wali" placeholder="No Telp Wali" value="<?= old('no_telp_wali', $santri['no_telp_wali']) ?>">
                      <div class=" invalid-feedback">
                        <?= validation_show_error('no_telp_wali') ?>
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