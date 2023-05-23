<?= $this->extend('home/layout/layout_v') ?>
<?= $this->section('content') ?>

<!-- Sejarah -->
<div class="p-4">
  <div class="container">
    <?php //echo validation_list_errors() 
    ?>
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
          <div class="card-body bg-light">
            <form action="" method="POST" enctype="multipart/form-data">
              <?= csrf_field() ?>

              <div class="row">
                <div class="col-md-12">
                  <div class="mb-3">
                    <img alt="" src="" class="rounded img-responsive mt-2" width="128" height="168" id="img-photo-upload">
                    <div class="mt-2">
                      <label for="photo">
                        <span class="btn btn-primary"><i class="fas fa-upload"></i> Pilih Photo</span>
                      </label>
                      <input type="file" name="photo" id="photo" class="d-none <?= validation_show_error('photo') ? 'is-invalid' : '' ?>" onchange="document.getElementById('img-photo-upload').src = window.URL.createObjectURL(this.files[0])">
                      <div class=" invalid-feedback">
                        <?= validation_show_error('photo') ?>
                      </div>
                    </div>
                    <small>For best results, use an image max 4mb in .jpg .png format</small>
                  </div>

                  <div class="mb-3">
                    <label class="form-label" for="inputnama">Nama Calon Santri</label>
                    <input type="text" class="form-control <?= validation_show_error('nama') ? 'is-invalid' : '' ?>" id="inputnama" name="nama" placeholder="Nama Calon Santri" value="<?= old('nama') ?>">
                    <div class="invalid-feedback">
                      <?= validation_show_error('nama')
                      ?>
                    </div>
                  </div>

                  <div class="mb-3">
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
                        <label class="form-label" for="inputasal_sekolah">Asal Sekolah</label>
                        <input type="text" class="form-control <?= validation_show_error('asal_sekolah') ? 'is-invalid' : '' ?>" id="inputasal_sekolah" placeholder="Asal Sekolah" name="asal_sekolah" value="<?= old('asal_sekolah') ?>">
                        <div class="invalid-feedback">
                          <?= validation_show_error('asal_sekolah')
                          ?>
                        </div>
                      </div>
                      <div class="col-6">
                        <label class="form-label" for="inputlulus_tahun">Lulus Tahun</label>
                        <input type="year" maxlength="4" class="form-control <?= validation_show_error('lulus_tahun') ? 'is-invalid' : '' ?>" id="inputlulus_tahun" placeholder="Tahun Lulus" name="lulus_tahun" value="<?= old('lulus_tahun') ?>">
                        <div class="invalid-feedback">
                          <?= validation_show_error('lulus_tahun')
                          ?>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="inputalamat">Alamat Lengkap</label>
                    <textarea name="alamat" id="inputalamat" cols="30" rows="3" class="form-control <?= validation_show_error('alamat') ? 'is-invalid' : '' ?>" placeholder="Alamat Lengkap"><?= old('alamat') ?></textarea>
                    <div class="invalid-feedback">
                      <?= validation_show_error('alamat')
                      ?>
                    </div>
                  </div>
                  <div class=" mb-3">
                    <label class="form-label" for="inputno_telp">No Telp</label>
                    <input type="text" class="form-control <?= validation_show_error('no_telp') ? 'is-invalid' : '' ?>" id="inputno_telp" name="no_telp" placeholder="No Telp" value="<?= old('no_telp') ?>">
                    <div class="invalid-feedback">
                      <?= validation_show_error('no_telp')
                      ?>
                    </div>
                  </div>
                  <div class=" mb-3">
                    <label class="form-label" for="inputemail">Email</label>
                    <input type="text" class="form-control <?= validation_show_error('email') ? 'is-invalid' : '' ?>" id="inputemail" name="email" placeholder="Email" value="<?= old('email') ?>">
                    <div class="invalid-feedback">
                      <?= validation_show_error('email') ?>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="" class="form-label">Jenjang Sekolah didaftar</label>
                    <div class="form-control <?= validation_show_error('jenjang_sekolah') ? 'is-invalid' : '' ?>">
                      <div class="form-check">
                        <input type="radio" class="form-check-input <?= validation_show_error('jenjang_sekolah') ? 'is-invalid' : '' ?>" id="jenjang_sekolah2" name="jenjang_sekolah" value="MA" oninvalid="this.setCustomValidity('Pilih Salah Satu')" <?= (old('jenjang_sekolah') == 'MA' ? 'checked' : '') ?>>
                        <label class="form-check-label" for="jenjang_sekolah2">MA</label>
                      </div>
                      <div class="form-check mb-3">
                        <input type="radio" class="form-check-input <?= validation_show_error('jenjang_sekolah') ? 'is-invalid' : '' ?>" id="jenjang_sekolah3" name="jenjang_sekolah" value="MTS" oninvalid="this.setCustomValidity('Pilih Salah Satu')" <?= (old('jenjang_sekolah') == 'MTS' ? 'checked' : '') ?>>
                        <label class="form-check-label" for="jenjang_sekolah3">MTS</label>
                      </div>
                    </div>
                    <div class="invalid-feedback">
                      <?= validation_show_error('jenjang_sekolah') ?>
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
      <div class="col-4">
        <div class="card">
          <div class="card-header">
            <h3 class="card-title">Pencarian</h3>
          </div>
          <div class="card-body">
            <form action="<?= base_url() . 'pendaftaran' ?>" method="get">
              <div class="mb-3">
                <input type="text" class="form-control" id="key" name="key" placeholder="Cari">
              </div>
              <button type="submit" class="btn btn-primary">
                <i class="fa fa-magnify"></i>
                Cari
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
    <!-- /.row (main row) -->
  </div>

</div>
<!-- End Sejarah -->

<?= $this->endSection() ?>