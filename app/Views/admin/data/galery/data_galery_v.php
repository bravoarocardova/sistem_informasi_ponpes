<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Galery</h1>
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
          <?= session()->get('msg') ?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <a href="<?= base_url() ?>admin/galery/tambah" class="btn btn-primary">
                  <i class="fas fa-plus-square"></i>
                  Tambah
                </a>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                  <tr>
                    <th>FILE</th>
                    <th>TIPE</th>
                    <th>CAPTION</th>
                    <th>TANGGAL DIBUAT</th>
                    <th>TANGGAL UPDATE</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($galery as $r) : ?>
                    <tr>
                      <td>
                        <img src="<?= base_url() . 'img/galery/' . $r['file'] ?>" class="img-" width="128">
                      </td>
                      <td><?= $r['tipe'] ?></td>
                      <td><?= $r['caption'] ?></td>
                      <td><?= $r['created_at'] ?></td>
                      <td><?= $r['updated_at'] ?></td>
                      <td>
                        <a href="<?= base_url() ?>admin/galery/edit/<?= $r['id_galery'] ?>" class="btn btn-warning" title="edit">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="<?= base_url() ?>admin/galery/hapus/<?= $r['id_galery'] ?>" method="post" class="d-inline">
                          <?= csrf_field() ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <button class="btn btn-danger" title="hapus" onclick="return confirm('hapus <?= $r['id_galery'] ?> ? ')">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>File</th>
                    <th>TIPE</th>
                    <th>CAPTION</th>
                    <th>TANGGAL DIBUAT</th>
                    <th>TANGGAL UPDATE</th>
                    <th>AKSI</th>
                  </tr>
                </tfoot>
              </table>
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
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["colvis"],
      "columnDefs": [{
        "targets": [4],
        "visible": false

      }]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>



<?= $this->endSection() ?>