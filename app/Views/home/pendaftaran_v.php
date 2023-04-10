<?= $this->extend('home/layout/layout_v') ?>
<?= $this->section('content') ?>

<!-- Sejarah -->
<div class="p-4">
  <div class="container">

    <!-- Main row -->
    <div class="row mt-5">
      <div class="col-8">
        <div class="card">
          <div class="card-header bg-white">
            <div class="row mt-n5">
              <div class="card w-auto ">
                <div class="col-md-12 d-flex align-items-center p-3">
                  <img src="<?= base_url() . 'img/icon/' . $profilApp['logo'] ?>" alt="" style="width:50px;height:50px">
                  <div class="ms-4">
                    <h4 class="fw-bold ">Pendaftaran Santri Baru</h4>
                    <p class="text-dark"><?= $profilApp['nama_pondok'] ?></p>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <!-- /.card-header -->
          <div class="card-body">
            <form action="" method="POST" enctype="multipart/form-data">
              <?= csrf_field() ?>

              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <label class="form-label" for="inputnis">NIS</label>
                    <input type="text" class="form-control <?= validation_show_error('nis') ? 'is-invalid' : '' ?>" id="inputnis" name="nis" placeholder="NIS" value="<?= old('nis') ?>">
                    <div class="invalid-feedback">
                      <?= validation_show_error('nis')
                      ?>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="inputnama_santri">Nama Santri</label>
                    <input type="text" class="form-control <?= validation_show_error('nama_santri') ? 'is-invalid' : '' ?>" id="inputnama_santri" name="nama_santri" placeholder="Nama Santri" value="<?= old('nama_santri') ?>">
                    <div class="invalid-feedback">
                      <?= validation_show_error('nama_santri')
                      ?>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <div class="col-6">
                        <label class="form-label" for="inputtempatlahir">Tempat Lahir</label>
                        <input type="text" class="form-control <?= validation_show_error('tempat_lahir') ? 'is-invalid' : '' ?>" id="inputtempatlahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= old('tempat_lahir') ?>">
                        <div class="invalid-feedback">
                          <?= validation_show_error('tempat_lahir') ?>
                        </div>
                      </div>
                      <div class="col-6">
                        <label class="form-label" for="inputtgl_lahir">Tanggal lahir</label>
                        <input type="date" class="form-control <?= validation_show_error('tgl_lahir') ? 'is-invalid' : '' ?>" id="inputtgl_lahir" name="tgl_lahir" value="<?= old('tgl_lahir') ?>">
                        <div class="invalid-feedback">
                          <?= validation_show_error('tgl_lahir')
                          ?>
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
                          <option value="L" <?= (old('jk') == 'L' ? 'selected' : '') ?>>Laki-Laki</option>
                          <option value="P" <?= (old('jk') == 'P' ? 'selected' : '') ?>>Perempuan</option>
                        </select>
                        <div class="invalid-feedback">
                          <?= validation_show_error('jk') ?>
                        </div>
                      </div>
                      <div class="col-6">
                        <label class="form-label" for="inputtgl_masuk">Tanggal Masuk</label>
                        <input type="date" class="form-control <?= validation_show_error('tgl_masuk') ? 'is-invalid' : '' ?>" id="inputtgl_masuk" name="tgl_masuk" value="<?= old('tgl_masuk') ?>">
                        <div class="invalid-feedback">
                          <?= validation_show_error('tgl_masuk')
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="inputalamat_lengkap">Alamat Lengkap</label>
                    <textarea name="alamat_lengkap" id="inputalamat_lengkap" cols="30" rows="3" class="form-control <?= validation_show_error('alamat_lengkap') ? 'is-invalid' : '' ?>" placeholder="Alamat Lengkap"><?= old('alamat_lengkap') ?></textarea>
                    <div class="invalid-feedback">
                      <?= validation_show_error('alamat_lengkap')
                      ?>
                    </div>
                  </div>
                  <div class=" mb-3">
                    <label class="form-label" for="inputWali">Wali</label>
                    <input type="text" class="form-control <?= validation_show_error('wali') ? 'is-invalid' : '' ?>" id="inputWali" name="wali" placeholder="Wali" value="<?= old('wali') ?>">
                    <div class="invalid-feedback">
                      <?= validation_show_error('wali') ?>
                    </div>
                  </div>
                  <div class=" mb-3">
                    <label class="form-label" for="inputno_telp_wali">No Telp Wali</label>
                    <input type="text" class="form-control <?= validation_show_error('no_telp_wali') ? 'is-invalid' : '' ?>" id="inputno_telp_wali" name="no_telp_wali" placeholder="No Telp Wali" value="<?= old('no_telp_wali') ?>">
                    <div class="invalid-feedback">
                      <?= validation_show_error('no_telp_wali')
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
  </div>

</div>
<!-- End Sejarah -->

<?= $this->endSection() ?>