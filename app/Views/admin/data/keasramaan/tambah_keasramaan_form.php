<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Kegiatan Keasramaan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active">Kegiata Keasramaan</li>
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
                      <label class="form-label" for="kegiatan_keasramaan">Kegiatan Keasramaan</label>
                      <input type="text" class="form-control <?= validation_show_error('kegiatan_keasramaan') ? 'is-invalid' : '' ?>" id="kegiatan_keasramaan" name="kegiatan_keasramaan" placeholder="Kegiatan Keasramaan" value="<?= old('kegiatan_keasramaan') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('kegiatan_keasramaan') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="ustadz">Ustadz</label>
                      <select name="kd_ustadz" id="ustadz" class="form-control <?= validation_show_error('kd_ustadz') ? 'is-invalid' : '' ?>">
                        <option value="">Pilih Ustadz</option>
                        <?php foreach ($ustadz as $u) : ?>
                          <option value="<?= $u['kd_ustadz'] ?>" <?= (old('kd_ustadz') == $u['kd_ustadz'] ? 'selected' : '') ?>>(<?= $u['kd_ustadz'] ?> ) <?= $u['nama_ustadz'] ?></option>
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