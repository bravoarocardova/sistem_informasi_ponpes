<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Kegiatan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active">Kegiatan</li>
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
                <a href="<?= base_url() ?>admin/kegiatan/tambah" class="btn btn-primary">
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
                    <th>HARI KEGIATAN</th>
                    <th>KEGIATAN</th>
                    <th>TANGGAL DIBUAT</th>
                    <th>TANGGAL UPDATE</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($kegiatan as $r) : ?>
                    <tr>
                      <td><?= $r['hari_kegiatan'] ?></td>
                      <td>
                        <pre><?= substr($r['kegiatan'], 0, 50) ?> <?php if (strlen($r['kegiatan']) > 50) echo  "...." ?></pre>
                      </td>
                      <td><?= $r['created_at'] ?></td>
                      <td><?= $r['updated_at'] ?></td>
                      <td>
                        <a href="<?= base_url() ?>admin/kegiatan/edit/<?= $r['id_kegiatan'] ?>" class="btn btn-warning" title="edit">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="<?= base_url() ?>admin/kegiatan/hapus/<?= $r['id_kegiatan'] ?>" method="post" class="d-inline">
                          <?= csrf_field() ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <button class="btn btn-danger" title="hapus" onclick="return confirm('hapus <?= $r['id_kegiatan'] ?> ? ')">
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
                    <h3>Data Kegiatan</h3>
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
        "targets": [],
        "visible": false

      }],
      order: [
        [1, 'ASC']
      ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>



<?= $this->endSection() ?>