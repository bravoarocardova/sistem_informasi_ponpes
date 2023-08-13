<?= $this->extend('ustadz/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Kegiatan Keasramaan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active">Kegiatan Keasramaan</li>
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
                      <label class="form-label" for="kegiatan_keasramaan">Kegiatan Keasramaan</label>
                      <input type="text" class="form-control <?= validation_show_error('kegiatan_keasramaan') ? 'is-invalid' : '' ?>" id="kegiatan_keasramaan" name="kegiatan_keasramaan" placeholder="Kegiatan Keasramaan" value="<?= old('kegiatan_keasramaan', $kegiatan_keasramaan['nama_kegiatan_keasramaan']) ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('kegiatan_keasramaan') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="ustadz">Ustadz</label>
                      <input type="text" class="form-control" value="<?= session('ustadz')['nama'] . " (" . session('ustadz')['kd_ustadz'] . ")" ?>" disabled>
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