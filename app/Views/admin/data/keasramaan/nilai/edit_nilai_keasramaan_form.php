<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Nilai Keasramaan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active">Nilai Keasramaan</li>
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
                      <label class="form-label" for="santri">Santri</label>
                      <input type="text" class="form-control <?= validation_show_error('santri') ? 'is-invalid' : '' ?>" id="santri" name="santri" placeholder="Santri" value="<?= old('santri', $nilai_keasramaan['nama_santri']) ?>" disabled>
                      <div class="invalid-feedback">
                        <?= validation_show_error('santri') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="nilai">Nilai</label>
                      <input type="text" class="form-control <?= validation_show_error('nilai') ? 'is-invalid' : '' ?>" id="nilai" name="nilai" placeholder="Nilai" value="<?= old('nilai', $nilai_keasramaan['nilai']) ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('nilai') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="keterangan">Kereangan</label>
                      <input type="text" class="form-control <?= validation_show_error('keterangan') ? 'is-invalid' : '' ?>" id="keterangan" name="keterangan" placeholder="Keterangan" value="<?= old('keterangan', $nilai_keasramaan['keterangan']) ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('keterangan') ?>
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