<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Slideshow</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active">Slideshow</li>
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
                      <img alt="" src="<?= base_url() . 'img/slideshow/' . $slideshow['slideshow'] ?>" class="rounded img-responsive mt-2" width="214" height="128" id="img-slideshow-upload">
                      <div class="mt-2">
                        <label for="slideshow">
                          <span class="btn btn-primary"><i class="fas fa-upload"></i> Pilih Slideshow</span>
                        </label>
                        <input type="file" name="slideshow" id="slideshow" class="d-none <?= validation_show_error('slideshow') ? 'is-invalid' : '' ?>" onchange="document.getElementById('img-slideshow-upload').src = window.URL.createObjectURL(this.files[0])">
                        <div class=" invalid-feedback">
                          <?= validation_show_error('slideshow') ?>
                        </div>
                      </div>
                      <small>format berupa .jpg .png</small>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="judul">Judul</label>
                      <input type="text" class="form-control <?= validation_show_error('judul') ? 'is-invalid' : '' ?>" id="judul" name="judul" placeholder="Judul" value="<?= old('judul', $slideshow['judul'] ?? '') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('judul') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="caption">Caption</label>
                      <textarea name="caption" id="caption" cols="30" rows="2" placeholder="Caption" class="form-control  <?= validation_show_error('caption') ? 'is-invalid' : '' ?>"><?= old('caption', $slideshow['caption'] ?? '') ?></textarea>
                      <div class="invalid-feedback">
                        <?= validation_show_error('caption') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="align">Align</label>
                      <select name="align" id="align" class="form-control <?= validation_show_error('align') ? 'is-invalid' : '' ?>">
                        <option value="">Pilih Align</option>
                        <option value="start" <?= (old('align', $slideshow['align'] ?? '') == 'start' ? 'selected' : '') ?>>Start</option>
                        <option value="center" <?= (old('align', $slideshow['align'] ?? '') == 'center' ? 'selected' : '') ?>>Center</option>
                        <option value="end" <?= (old('align', $slideshow['align'] ?? '') == 'end' ? 'selected' : '') ?>>End</option>
                      </select>
                      <div class="invalid-feedback">
                        <?= validation_show_error('align') ?>
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