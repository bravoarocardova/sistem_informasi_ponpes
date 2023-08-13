<?= $this->extend('ustadz/layout/layout_v') ?>
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
              <h3 class="">
                <?= $kegiatan_keasramaan['nama_kegiatan_keasramaan'] ?>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="row">
                  <div class="col-md-8">
                    <div class="mb-3">
                      <label class="form-label" for="santri">Santri</label>
                      <select name="nis" id="santri" class="form-control <?= validation_show_error('nis') ? 'is-invalid' : '' ?>">
                        <option value="">Pilih Santri</option>
                        <?php foreach ($santri as $u) : ?>
                          <option value="<?= $u['nis'] ?>" <?= (old('nis') == $u['nis'] ? 'selected' : '') ?>>(<?= $u['nis'] ?> ) <?= $u['nama_santri'] ?></option>
                        <?php endforeach ?>
                      </select>
                      <div class="invalid-feedback">
                        <?= validation_show_error('nis') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="nilai">Nilai</label>
                      <input type="text" class="form-control <?= validation_show_error('nilai') ? 'is-invalid' : '' ?>" id="nilai" name="nilai" placeholder="Nilai" value="<?= old('nilai') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('nilai') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="keterangan">Keterangan</label>
                      <input type="text" class="form-control <?= validation_show_error('keterangan') ? 'is-invalid' : '' ?>" id="keterangan" name="keterangan" placeholder="Keterangan" value="<?= old('keterangan') ?>">
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