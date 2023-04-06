<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profil Peraturan Pondok</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Profil</a></li>
            <li class="breadcrumb-item active">Peraturan Pondok</li>
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
                      <label class="form-label" for="peraturan_pondok">Peraturan Pondok</label>
                      <textarea name="peraturan_pondok" id="peraturan_pondok" cols="30" rows="2" placeholder="peraturan_pondok Pondok" class="form-control summernote <?= validation_show_error('peraturan_pondok') ? 'is-invalid' : '' ?>"><?= old('peraturan_pondok', $profil['peraturan_pondok'] ?? '') ?></textarea>
                      <div class="invalid-feedback">
                        <?= validation_show_error('peraturan_pondok') ?>
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