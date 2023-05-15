<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Kegiatan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active">Kegiatan</li>
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
                      <label class="form-label" for="hari_kegiatan">Hari Kegiatan</label>
                      <input type="text" class="form-control <?= validation_show_error('hari_kegiatan') ? 'is-invalid' : '' ?>" id="hari_kegiatan" name="hari_kegiatan" placeholder="Judul" value="<?= old('hari_kegiatan', $kegiatan['hari_kegiatan']) ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('hari_kegiatan') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="kegiatan">Kegiatan</label>
                      <textarea name="kegiatan" id="kegiatan" cols="30" rows="10" class="form-control summernote <?= validation_show_error('kegiatan') ? 'is-invalid' : '' ?>"><?= old('kegiatan', $kegiatan['kegiatan']) ?></textarea>
                      <div class="invalid-feedback">
                        <?= validation_show_error('kegiatan') ?>
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