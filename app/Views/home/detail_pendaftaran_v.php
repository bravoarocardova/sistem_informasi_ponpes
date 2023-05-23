<?= $this->extend('home/layout/layout_v') ?>
<?= $this->section('content') ?>
<!-- Sejarah -->
<div class="p-4">
  <div class="container">
    <!-- Main row -->
    <div class="row mt-5">
      <div class="col-8">
        <?= session()->get('msg') ?>
        <div class="card" id="printDiv">
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

            <div class="row">
              <div class="col-md-12">
                <div class="row">
                  <div class="col-6">
                    <div class="mb-3">
                      <img alt="" src="<?= base_url() . 'img/pendaftaran/' . $santri_daftar['photo'] ?>" class="rounded img-responsive mt-2" width="128" height="168" id="img-photo-upload">
                    </div>
                  </div>
                  <div class="col-6">
                    <div class="mb-3">
                      <label class="form-label" for="inputid_pendaftaran">No Pendaftaran</label>
                      <input disabled type="text" class="form-control <?= validation_show_error('id_pendaftaran') ? 'is-invalid' : '' ?>" id="inputid_pendaftaran" name="id_pendaftaran" placeholder="id_pendaftaran Calon Santri" value="<?= old('id_pendaftaran', $santri_daftar['id_pendaftaran']) ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('id_pendaftaran') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <?php if ($santri_daftar['status'] == '') : ?>
                        <h3 class="text-">

                        </h3>
                      <?php elseif ($santri_daftar['status'] == 'Lulus') : ?>
                        <h3 class="text-success">
                          Selamat Anda Lulus!
                        </h3>
                      <?php else : ?>
                        <h3 class="text-danger">
                          Anda Belum Lulus
                        </h3>
                      <?php endif ?>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="inputnama">Nama Calon Santri</label>
                  <input disabled type="text" class="form-control <?= validation_show_error('nama') ? 'is-invalid' : '' ?>" id="inputnama" name="nama" placeholder="Nama Calon Santri" value="<?= old('nama', $santri_daftar['nama']) ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('nama')
                    ?>
                  </div>
                </div>

                <div class="mb-3">
                  <label class="form-label" for="inputjk">Jenis Kelamin</label>
                  <select disabled name="jk" id="inputjk" class="form-control <?= validation_show_error('jk') ? 'is-invalid' : '' ?>">
                    <option value="">Pilih Jenis Kelamin</option>
                    <option value="L" <?= (old('jk', $santri_daftar['jk']) == 'L' ? 'selected' : '') ?>>Laki-Laki</option>
                    <option value="P" <?= (old('jk', $santri_daftar['jk']) == 'P' ? 'selected' : '') ?>>Perempuan</option>
                  </select>
                  <div class="invalid-feedback">
                    <?= validation_show_error('jk') ?>
                  </div>
                </div>
                <div class="mb-3">
                  <div class="row">
                    <div class="col-6">
                      <label class="form-label" for="inputtempatlahir">Tempat Lahir</label>
                      <input disabled type="text" class="form-control <?= validation_show_error('tempat_lahir') ? 'is-invalid' : '' ?>" id="inputtempatlahir" name="tempat_lahir" placeholder="Tempat Lahir" value="<?= old('tempat_lahir', $santri_daftar['tempat_lahir']) ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('tempat_lahir') ?>
                      </div>
                    </div>
                    <div class="col-6">
                      <label class="form-label" for="inputtgl_lahir">Tanggal lahir</label>
                      <input disabled type="date" class="form-control <?= validation_show_error('tgl_lahir') ? 'is-invalid' : '' ?>" id="inputtgl_lahir" name="tgl_lahir" value="<?= old('tgl_lahir', $santri_daftar['tgl_lahir']) ?>">
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
                      <input disabled type="text" class="form-control <?= validation_show_error('asal_sekolah') ? 'is-invalid' : '' ?>" id="inputasal_sekolah" placeholder="Asal Sekolah" name="asal_sekolah" value="<?= old('asal_sekolah', $santri_daftar['asal_sekolah']) ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('asal_sekolah')
                        ?>
                      </div>
                    </div>
                    <div class="col-6">
                      <label class="form-label" for="inputlulus_tahun">Lulus Tahun</label>
                      <input disabled type="year" maxlength="4" class="form-control <?= validation_show_error('lulus_tahun') ? 'is-invalid' : '' ?>" id="inputlulus_tahun" placeholder="Tahun Lulus" name="lulus_tahun" value="<?= old('lulus_tahun', $santri_daftar['lulus_tahun']) ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('lulus_tahun')
                        ?>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="mb-3">
                  <label class="form-label" for="inputalamat">Alamat Lengkap</label>
                  <textarea disabled name="alamat" id="inputalamat" cols="30" rows="3" class="form-control <?= validation_show_error('alamat') ? 'is-invalid' : '' ?>" placeholder="Alamat Lengkap"><?= old('alamat', $santri_daftar['alamat']) ?></textarea>
                  <div class="invalid-feedback">
                    <?= validation_show_error('alamat')
                    ?>
                  </div>
                </div>
                <div class=" mb-3">
                  <label class="form-label" for="inputno_telp">No Telp</label>
                  <input disabled type="text" class="form-control <?= validation_show_error('no_telp') ? 'is-invalid' : '' ?>" id="inputno_telp" name="no_telp" placeholder="No Telp" value="<?= old('no_telp', $santri_daftar['no_telp']) ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('no_telp')
                    ?>
                  </div>
                </div>
                <div class=" mb-3">
                  <label class="form-label" for="inputemail">Email</label>
                  <input disabled type="text" class="form-control <?= validation_show_error('email') ? 'is-invalid' : '' ?>" id="inputemail" name="email" placeholder="Email" value="<?= old('email', $santri_daftar['email']) ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('email') ?>
                  </div>
                </div>

                <div class=" mb-3">
                  <label class="form-label" for="inputjenjang_sekolah">Jenjang Sekolah didaftar</label>
                  <input disabled type="text" class="form-control <?= validation_show_error('jenjang_sekolah') ? 'is-invalid' : '' ?>" id="inputjenjang_sekolah" name="jenjang_sekolah" placeholder="Email" value="<?= old('jenjang_sekolah', $santri_daftar['jenjang_sekolah']) ?>">
                  <div class="invalid-feedback">
                    <?= validation_show_error('jenjang_sekolah') ?>
                  </div>
                </div>
              </div>

            </div>
            <!-- <a href="javascript:history.back()" class="btn btn-danger">Cancel</a> -->
            <button class="btn btn-primary d-print-none" onclick="printDiv('printDiv')">
              <i class="fa fa-print"></i>
              Cetak
            </button>

          </div>
          <!-- /.card-body -->
        </div>
      </div>
    </div>
    <!-- /.row (main row) -->
  </div>

</div>
<!-- End Sejarah -->

<script>
  function printDiv(divName) {
    var printContents = document.getElementById(divName).innerHTML;
    var originalContents = document.body.innerHTML;

    document.body.innerHTML = printContents;

    window.print();

    document.body.innerHTML = originalContents;
  }
</script>

<?= $this->endSection() ?>