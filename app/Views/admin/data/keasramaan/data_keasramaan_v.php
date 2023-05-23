<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Kegiatan Keasramaan</h1>
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
          <?= session()->get('msg') ?>
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">
                <a href="<?= base_url() ?>admin/keasramaan/tambah" class="btn btn-primary">
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
                    <th>KEGIATAN KEASRAMAAN</th>
                    <th>KODE USTADZ</th>
                    <th>TANGGAL DIBUAT</th>
                    <th>TANGGAL UPDATE</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($kegiatan_keasramaan as $r) : ?>
                    <tr>
                      <td><?= $r['nama_kegiatan_keasramaan'] ?></td>
                      <td><?= $r['kd_ustadz'] ?></td>
                      <td><?= $r['created_at'] ?></td>
                      <td><?= $r['updated_at'] ?></td>
                      <td>
                        <a href="<?= base_url() ?>admin/keasramaan/detail/<?= $r['id_kegiatan_keasramaan'] ?>" class="btn btn-success" title="lihat detail">
                          <i class="fas fa-eye"></i>
                        </a>
                        <a href="<?= base_url() ?>admin/keasramaan/edit/<?= $r['id_kegiatan_keasramaan'] ?>" class="btn btn-warning" title="edit">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="<?= base_url() ?>admin/keasramaan/hapus/<?= $r['id_kegiatan_keasramaan'] ?>" method="post" class="d-inline">
                          <?= csrf_field() ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <button class="btn btn-danger" title="hapus" onclick="return confirm('hapus <?= $r['id_kegiatan_keasramaan'] ?> ? ')">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>KEGIATAN KEASRAMAAN</th>
                    <th>KODE USTADZ</th>
                    <th>TANGGAL DIBUAT</th>
                    <th>TANGGAL UPDATE</th>
                    <th>AKSI</th>
                  </tr>
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
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "columnDefs": [{
        "targets": [3],
        "visible": false

      }],
      order: [
        [1, 'ASC']
      ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>



<?= $this->endSection() ?>