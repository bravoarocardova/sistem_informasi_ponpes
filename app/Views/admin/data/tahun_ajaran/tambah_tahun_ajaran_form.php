<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Tahun Ajaran</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active">Tahun Ajaran</li>
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
                      <label class="form-label" for="tahun_ajaran">Nama Tahun Ajaran</label>
                      <input type="text" class="form-control <?= validation_show_error('tahun_ajaran') ? 'is-invalid' : '' ?>" id="tahun_ajaran" name="tahun_ajaran" placeholder="Tahun Ajaran" value="<?= old('tahun_ajaran') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('tahun_ajaran')
                        ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="semester">Semester</label>
                      <select name="semester" id="semester" class="form-control <?= validation_show_error('semester') ? 'is-invalid' : '' ?>">
                        <option value="">Pilih Semester</option>
                        <option value="Ganjil" <?= (old('semester') ==  'Ganjil' ? 'selected' : '') ?>>Ganjil</option>
                        <option value="Genap" <?= (old('semester') ==  'Genap' ? 'selected' : '') ?>>Genap</option>
                      </select>
                      <div class="invalid-feedback">
                        <?= validation_show_error('semester') ?>
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