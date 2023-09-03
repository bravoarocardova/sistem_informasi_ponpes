<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Mapel Kelas <?= $kelas['nama_kelas'] ?> ( <?= $kelas['tahun_ajaran'] ?> - <?= $kelas['semester'] ?> )</h1>
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
                <input type="hidden" name="_method" value="PUT">
                <div class="row">
                  <div class="col-md-8">

                    <div class="mb-3">
                      <label class="form-label" for="kd_mapel">Mata Pelajaran</label>
                      <select name="kd_mapel" id="kd_mapel" class="form-control <?= validation_show_error('kd_mapel') ? 'is-invalid' : '' ?>">
                        <option value="">Pilih Mata Pelajaran</option>
                        <?php foreach ($mapel as $t) : ?>
                          <option value="<?= $t['kd_mapel'] ?>" <?= (old('kd_mapel', $mengajar['kd_mapel']) ==  $t['kd_mapel'] ? 'selected' : '') ?>><?= $t['nama_mapel'] ?> ( <?= $t['kd_mapel'] ?> )</option>
                        <?php endforeach ?>
                      </select>
                      <div class="invalid-feedback">
                        <?= validation_show_error('kd_mapel') ?>
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="kd_ustadz">Pengajar</label>
                      <select name="kd_ustadz" id="kd_ustadz" class="form-control <?= validation_show_error('kd_ustadz') ? 'is-invalid' : '' ?>">
                        <option value="">Pilih Pengajar</option>
                        <?php foreach ($ustadz as $t) : ?>
                          <option value="<?= $t['kd_ustadz'] ?>" <?= (old('kd_ustadz', $mengajar['kd_ustadz']) ==  $t['kd_ustadz'] ? 'selected' : '') ?>><?= $t['nama_ustadz'] ?> ( <?= $t['kd_ustadz'] ?> )</option>
                        <?php endforeach ?>
                      </select>
                      <div class="invalid-feedback">
                        <?= validation_show_error('kd_ustadz') ?>
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