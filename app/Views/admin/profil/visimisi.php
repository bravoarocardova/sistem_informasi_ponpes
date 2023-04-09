<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profil Visi dan Misi</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Profil</a></li>
            <li class="breadcrumb-item active">Visi dan Misi</li>
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
              <?= session()->get('msg') ?>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <form action="" method="POST" enctype="multipart/form-data">
                <?= csrf_field() ?>

                <div class="row">
                  <div class="col-md-8">

                    <div class="mb-3">
                      <label class="form-label" for="visi">Visi</label>
                      <textarea name="visi" id="visi" cols="30" rows="2" placeholder="visi Pondok" class="form-control summernote <?= validation_show_error('visi') ? 'is-invalid' : '' ?>"><?= old('visi', $profilApp['visi'] ?? '') ?></textarea>
                      <div class="invalid-feedback">
                        <?= validation_show_error('visi') ?>
                      </div>
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="misi">Misi</label>
                      <textarea name="misi" id="misi" cols="30" rows="2" placeholder="misi Pondok" class="form-control summernote <?= validation_show_error('misi') ? 'is-invalid' : '' ?>"><?= old('misi', $profilApp['misi'] ?? '') ?></textarea>
                      <div class="invalid-feedback">
                        <?= validation_show_error('misi') ?>
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