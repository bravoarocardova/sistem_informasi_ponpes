<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Santri</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active">Santri</li>
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
                <a href="<?= base_url() ?>admin/data/santri/tambah" class="btn btn-primary">
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
                    <th>NIS</th>
                    <th>NAMA SANTRI</th>
                    <th>JK</th>
                    <th>TGL MASUK</th>
                    <th>ALAMAT LENGKAP</th>
                    <th>STATUS</th>
                    <th>WALI</th>
                    <th>NO TELP WALI</th>
                    <th>TEMPAT LAHIR</th>
                    <th>TANGGAL LAHIR</th>
                    <th>TANGGAL DIBUAT</th>
                    <th>TANGGAL UPDATE</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($santri as $s) : ?>
                    <tr>
                      <td><?= $s['nis'] ?></td>
                      <td><?= $s['nama_santri'] ?></td>
                      <td><?= $s['jk'] ?></td>
                      <td><?= $s['tgl_masuk'] ?></td>
                      <td><?= $s['alamat_lengkap'] ?></td>
                      <td><?= $s['status'] ?></td>
                      <td><?= $s['wali'] ?></td>
                      <td><?= $s['no_telp_wali'] ?></td>
                      <td><?= $s['tempat_lahir'] ?></td>
                      <td><?= $s['tgl_lahir'] ?></td>
                      <td><?= $s['created_at'] ?></td>
                      <td><?= $s['updated_at'] ?></td>
                      <td>
                        <a href="<?= base_url() ?>admin/data/santri/edit/<?= $s['nis'] ?>" class="btn btn-warning" title="edit">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="<?= base_url() ?>admin/data/santri/hapus/<?= $s['nis'] ?>" method="post" class="d-inline">
                          <?= csrf_field() ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <button class="btn btn-danger" title="hapus" onclick="return confirm('hapus <?= $s['nis'] ?> ? ')">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <td>NIS</td>
                    <th>NAMA SANTRI</th>
                    <th>JK</th>
                    <th>TGL MASUK</th>
                    <th>ALAMAT LENGKAP</th>
                    <th>STATUS</th>
                    <td>WALI</td>
                    <th>NO TELP WALI</th>
                    <th>TEMPAT LAHIR</th>
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
        "targets": [4, 5, 8, 9, 10, 11],
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