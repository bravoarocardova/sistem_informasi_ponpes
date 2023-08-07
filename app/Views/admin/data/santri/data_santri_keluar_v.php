<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Santri Keluar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active">Santri Keluar</li>
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
                <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-default">
                  <i class="fas fa-plus-square"></i>
                  Tambah
                </button>
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
                  <?php foreach ($santri_keluar as $s) : ?>
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
                        <form action="<?= base_url() ?>admin/data/santri_keluar/kembalikan/<?= $s['nis'] ?>" method="post" class="d-inline">
                          <?= csrf_field() ?>
                          <input type="hidden" name="_method" value="PUT">
                          <button type="submit" class="btn btn-success" title="Kembalikan">
                            <i class="fas fa-undo"></i>
                          </button>
                        </form>
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

<div class="modal fade" id="modal-default">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Tambah Santri Keluar</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <table id="example2" class="table table-bordered table-striped ">
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
                  <form action="<?= base_url() ?>admin/data/santri_keluar/tambah/<?= $s['nis'] ?>" method="post" class="d-inline">
                    <?= csrf_field() ?>
                    <input type="hidden" name="_method" value="PUT">
                    <button type="submit" class="btn btn-success" title="Pilih">
                      <i class="fas fa-check"></i>
                    </button>
                  </form>
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", {
        extend: 'print',
        exportOptions: {
          columns: ':visible'
        },
        customize: function(win) {

          $(win.document.body)
            .css('font-size', '10pt')
            .prepend(
              `
                <div class="row mt-4 mt-4 mt-4 mb-4">
                  <div class="col-4">
                    <img class="w-25" src="<?= base_url() ?>/img/icon/<?= $profilApp['logo']; ?>" />
                  </div>
                  <div class="col-8">
                    <h2><?= $profilApp['nama_pondok'] ?></h2>
                    <h3>Data Santri Keluar</h3>
                  </div>
                </div>
                <hr>
                `
            );

          $(win.document.body)
            .find('h1').hide();

          $(win.document.body)
            // .find('')
            .css('font-size', '10pt')
            .append(
              `
                <div class="row mt-4 mt-4 mt-4">
                  <div class="col-12">
                    <div class="d-flex justify-content-end">
                      <div>
                        <p>Pamenang, <?= date('d-m-Y') ?> <br></p>
                        </br></br>
                        
                          <p></p>
                          <p>Admin</p>
                      </div>
                    </div>
                  </div>
                </div>
                `
            );

          $(win.document.body).find('table')
            .addClass('compact')
            .css('font-size', 'inherit');
        }
      }, "colvis"],
      "columnDefs": [{
        "targets": [4, 5, 8, 9, 10, 11],
        "visible": false

      }]
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    $("#example2").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["colvis"],
      "columnDefs": [{
        "targets": [4, 5, 8, 9, 10, 11],
        "visible": false

      }]
    }).buttons().container().appendTo('#example2_wrapper .col-md-6:eq(0)');

  });
</script>



<?= $this->endSection() ?>