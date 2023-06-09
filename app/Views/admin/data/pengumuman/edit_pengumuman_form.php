<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Edit Pengumuman</h1>
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
                <input type="hidden" name="_method" value="PUT">
                <div class="row">
                  <div class="col-md-8">
                    <div class="mb-3">
                      <img alt="" src="<?= base_url() ?>img/pengumuman/<?= $pengumuman['gambar'] ?>" class="rounded img-responsive mt-2" width="128" height="128" id="img-profile-upload">
                      <div class="mt-2">
                        <label for="gambar">
                          <span class="btn btn-primary"><i class="fas fa-upload"></i> Pilih Gambar</span>
                        </label>
                        <input type="file" name="gambar" id="gambar" class="d-none <?= validation_show_error('gambar') ? 'is-invalid' : '' ?>" onchange="document.getElementById('img-profile-upload').src = window.URL.createObjectURL(this.files[0])">
                        <div class=" invalid-feedback">
                          <?= validation_show_error('gambar') ?>
                        </div>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="judul">Judul</label>
                      <input type="text" class="form-control <?= validation_show_error('judul') ? 'is-invalid' : '' ?>" id="judul" name="judul" placeholder="Judul" value="<?= old('judul', $pengumuman['judul']) ?>">
                      <div class="invalid-feedback">
                        <?= validation_show_error('judul') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="isi">Isi</label>
                      <textarea name="isi" id="isi" cols="30" rows="10" class="form-control summernote <?= validation_show_error('isi') ? 'is-invalid' : '' ?>"><?= old('isi', $pengumuman['isi']) ?></textarea>
                      <div class="invalid-feedback">
                        <?= validation_show_error('isi') ?>
                      </div>
                    </div>
                    <div class="mb-3">
                      <label for="" class="form-label">Kategori</label>
                      <div class="form-check ">
                        <input type="radio" class="form-check-input <?= validation_show_error('kategori') ? 'is-invalid' : '' ?>" id="kategori2" name="kategori" value="berita" oninvalid="this.setCustomValidity('Pilih Salah Satu')" <?= (old('kategori', $pengumuman['kategori']) == 'berita' ? 'checked' : '') ?> checked>
                        <label class="form-check-label" for="kategori2">Berita</label>
                      </div>
                      <div class="form-check mb-3">
                        <input type="radio" class="form-check-input <?= validation_show_error('kategori') ? 'is-invalid' : '' ?>" id="kategori3" name="kategori" value="kelulusan" oninvalid="this.setCustomValidity('Pilih Salah Satu')" <?= (old('kategori', $pengumuman['kategori']) == 'kelulusan' ? 'checked' : '') ?>>
                        <label class="form-check-label" for="kategori3">Kelulusan</label>
                        <div class="invalid-feedback">
                          <?= validation_show_error('kategori') ?>
                        </div>
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