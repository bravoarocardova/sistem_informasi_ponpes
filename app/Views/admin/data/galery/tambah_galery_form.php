<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Galery</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active">Galery</li>
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
                      <img alt="" src="" class="rounded img-responsive mt-2" width="128" height="128" id="img-file-upload">
                      <div class="mt-2">
                        <label for="file">
                          <span class="btn btn-primary"><i class="fas fa-upload"></i> Pilih File</span>
                        </label>
                        <input type="file" name="file" id="file" class="d-none <?= validation_show_error('file') ? 'is-invalid' : '' ?>" onchange="document.getElementById('img-file-upload').src = window.URL.createObjectURL(this.files[0])">
                        <div class=" invalid-feedback">
                          <?= validation_show_error('file') ?>
                        </div>
                      </div>
                      <small>format berupa .jpg .png</small>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="caption">Caption</label>
                      <textarea name="caption" id="caption" cols="30" rows="2" placeholder="Caption" class="form-control  <?= validation_show_error('caption') ? 'is-invalid' : '' ?>"><?= old('caption') ?></textarea>
                      <div class="invalid-feedback">
                        <?= validation_show_error('caption') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="tipe">Tipe</label>
                      <select name="tipe" id="tipe" class="form-control <?= validation_show_error('tipe') ? 'is-invalid' : '' ?>">
                        <option value="">Pilih tipe</option>
                        <option value="foto" <?= (old('tipe') == 'foto' ? 'selected' : '') ?>>Foto</option>
                        <option value="video" <?= (old('tipe') == 'video' ? 'selected' : '') ?>>Video</option>
                      </select>
                      <div class="invalid-feedback">
                        <?= validation_show_error('tipe') ?>
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