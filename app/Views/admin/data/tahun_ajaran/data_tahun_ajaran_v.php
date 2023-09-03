<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Tahun Ajaran</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active">Tahun Ajaran</li>
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
              <div class="row">
                <div class="col-lg-9">
                  <h3 class="card-title">
                    <a href="<?= base_url() ?>admin/data/tahun_ajaran/tambah" class="btn btn-primary">
                      <i class="fas fa-plus-square"></i>
                      Tambah
                    </a>
                  </h3>
                </div>
                <div class="col-lg-3">


                </div>
              </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                  <tr>
                    <th>NAMA TAHUN AJARAN</th>
                    <th>SEMESTER</th>
                    <th>TANGGAL DIBUAT</th>
                    <th>TANGGAL UPDATE</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($tahun_ajaran as $u) : ?>
                    <tr>
                      <td><?= $u['tahun_ajaran'] ?></td>
                      <td><?= $u['semester'] ?></td>
                      <td><?= $u['created_at'] ?></td>
                      <td><?= $u['updated_at'] ?></td>
                      <td>
                        <a href="<?= base_url() ?>admin/data/tahun_ajaran/edit/<?= $u['id_tahun_ajaran'] ?>" class="btn btn-warning" title="edit">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="<?= base_url() ?>admin/data/tahun_ajaran/hapus/<?= $u['id_tahun_ajaran'] ?>" method="post" class="d-inline">
                          <?= csrf_field() ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <button class="btn btn-danger" title="hapus" onclick="return confirm('hapus <?= $u['id_tahun_ajaran'] ?> ? ')">
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

<script>
  $(function() {
    $("#example1").DataTable({
      // "pageLength": 21,
      order: [
        [0, 'desc'],
      ],
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
                    <h3>Data Tahun Ajaran</h3>
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
        "targets": [2, 3],
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