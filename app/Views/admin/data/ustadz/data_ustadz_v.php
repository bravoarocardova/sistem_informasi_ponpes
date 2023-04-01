<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Ustadz</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active">Ustadz</li>
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
                <a href="<?= base_url() ?>admin/data/ustadz/tambah" class="btn btn-primary">
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
                    <th>KODE USTADZ</th>
                    <th>NAMA USTADZ</th>
                    <th>JK</th>
                    <th>ALAMAT LENGKAP</th>
                    <th>STATUS</th>
                    <th>NO TELP</th>
                    <th>TANGGAL LAHIR</th>
                    <th>TANGGAL DIBUAT</th>
                    <th>TANGGAL UPDATE</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($ustadz as $u) : ?>
                    <tr>
                      <td><?= $u['kd_ustadz'] ?></td>
                      <td><?= $u['nama_ustadz'] ?></td>
                      <td><?= $u['jk'] ?></td>
                      <td><?= $u['alamat'] ?></td>
                      <td><?= $u['status'] ?></td>
                      <td><?= $u['no_telp'] ?></td>
                      <td><?= $u['tgl_lahir'] ?></td>
                      <td><?= $u['created_at'] ?></td>
                      <td><?= $u['updated_at'] ?></td>
                      <td>
                        <a href="<?= base_url() ?>admin/data/ustadz/edit" class="btn btn-warning" title="edit">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <a href="<?= base_url() ?>admin/data/ustadz/hapus" class="btn btn-danger" title="hapus">
                          <i class="fas fa-trash"></i>
                        </a>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td>KODE USTADZ</td>
                    <th>NAMA USTADZ</th>
                    <th>JK</th>
                    <th>ALAMAT LENGKAP</th>
                    <th>STATUS</th>
                    <th>NO TELP</th>
                    <th>TANGGAL LAHIR</th>
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
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "columnDefs": [{
        "targets": [3, 4, 7, 8, ],
        "visible": false

      }]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $('#example2').DataTable({
      "paging": true,
      "lengthChange": false,
      "searching": false,
      "ordering": true,
      "info": true,
      "autoWidth": false,
      "responsive": true,
    });
  });
</script>



<?= $this->endSection() ?>