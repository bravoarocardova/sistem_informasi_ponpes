<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tambah Pengumuman</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active">Pengumuman</li>
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
                      <img alt="" src="" class="rounded img-responsive mt-2" width="128" height="128" id="img-profile-upload">
                      <div class="mt-2">
                        <label for="gambar">
                          <span class="btn btn-primary"><i class="fas fa-upload"></i> Pilih Gambar</span>
                        </label>
                        <input type="file" name="gambar" id="gambar" class="d-none <?= validation_show_error('gambar') ? 'is-invalid' : '' ?>" onchange="document.getElementById('img-profile-upload').src = window.URL.createObjectURL(this.files[0])">
                        <div class=" invalid-feedback">
                          <?= validation_show_error('gambar') ?>
                        </div>
                      </div>
                      <div class="invalid-feedback">
                        <?= validation_show_error('gambar')
                        ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="judul">Judul</label>
                      <input type="text" class="form-control <?= validation_show_error('judul') ? 'is-invalid' : '' ?>" id="judul" name="judul" placeholder="Judul" value="<?= old('judul') ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('judul')
                        ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="summernote">Isi</label>
                      <textarea name="isi" id="summernote" cols="30" rows="10" class="form-control <?= validation_show_error('isi') ? 'is-invalid' : '' ?>"><?= old('isi') ?></textarea>
                      <div class="invalid-feedback">
                        <?= validation_show_error('isi')
                        ?>
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
<script>
  $(function() {
    // Summernote
    $('#summernote').summernote({
      height: 100,
      toolbar: [
        // [groupName, [list of button]]
        ['style', ['bold', 'italic', 'underline', 'clear']],
        ['font', ['strikethrough', 'superscript', 'subscript']],
        ['fontsize', ['fontsize']],
        ['color', ['color']],
        ['para', ['ul', 'ol', 'paragraph']],
        ['height', ['height']]
      ],
    });
    $('#summernote').summernote('fontSize', 12);

  })
</script>

<?= $this->endSection() ?>