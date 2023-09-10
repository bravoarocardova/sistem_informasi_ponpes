<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Kelas</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active">Kelas</li>
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

                <div class="row">
                  <div class="col-md-8">
                    <div class="mb-3">
                      <label class="form-label" for="nama_kelas">Nama kelas</label>
                      <input type="text" class="form-control <?= validation_show_error('nama_kelas') ? 'is-invalid' : '' ?>" id="nama_kelas" name="nama_kelas" placeholder="Nama kelas" value="<?= old('nama_kelas') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('nama_kelas')
                        ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="wali_kelas">Wali kelas</label>
                      <select name="wali_kelas" id="wali_kelas" class="form-control <?= validation_show_error('wali_kelas') ? 'is-invalid' : '' ?>">
                        <option value="">Pilih Wali Kelas</option>
                        <?php foreach ($wali_kelas as $t) : ?>
                          <option value="<?= $t['kd_ustadz'] ?>" <?= (old('wali_kelas') ==  $t['kd_ustadz'] ? 'selected' : '') ?>><?= $t['nama_ustadz'] . ' - ' . $t['kd_ustadz'] ?></option>
                        <?php endforeach ?>
                      </select>
                      <div class="invalid-feedback">
                        <?= validation_show_error('wali_kelas')
                        ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="id_tahun_ajaran">Tahun Ajaran</label>
                      <select name="id_tahun_ajaran" id="id_tahun_ajaran" class="form-control <?= validation_show_error('id_tahun_ajaran') ? 'is-invalid' : '' ?>">
                        <option value="">Pilih Tahun Ajaran</option>
                        <?php foreach ($tahun_ajaran as $t) : ?>
                          <option value="<?= $t['id_tahun_ajaran'] ?>" <?= (old('id_tahun_ajaran') ==  $t['id_tahun_ajaran'] ? 'selected' : '') ?>><?= $t['tahun_ajaran'] . ' - ' . $t['semester'] ?></option>
                        <?php endforeach ?>
                      </select>
                      <div class="invalid-feedback">
                        <?= validation_show_error('id_tahun_ajaran') ?>
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