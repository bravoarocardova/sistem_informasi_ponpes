<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Nilai Keasramaan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active">Nilai Keasramaan</li>
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
                <h2><?= $kegiatan_keasramaan['nama_kegiatan_keasramaan'] ?></h2>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <a href="<?= base_url() ?>admin/keasramaan/" class="btn btn-danger">
                <i class="fas fa-arrow-left"></i>
                Kembali
              </a>
              <a href="<?= base_url() ?>admin/keasramaan/detail/<?= $kegiatan_keasramaan['id_kegiatan_keasramaan'] ?>/tambah" class="btn btn-primary">
                <i class="fas fa-plus-square"></i>
                Tambah
              </a>
              <hr>
              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                  <tr>
                    <th>SANTRI</th>
                    <th>NILAI</th>
                    <th>KETERANGAN</th>
                    <th>TANGGAL DIBUAT</th>
                    <th>TANGGAL UPDATE</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($nilai_keasramaan as $r) : ?>
                    <tr>
                      <td><?= $r['nama_santri'] ?></td>
                      <td><?= $r['nilai'] ?></td>
                      <td><?= $r['keterangan'] ?></td>
                      <td><?= $r['created_at'] ?></td>
                      <td><?= $r['updated_at'] ?></td>
                      <td>
                        <a href="<?= base_url() ?>admin/keasramaan/detail/<?= $r['id_kegiatan_keasramaan'] ?>/edit/<?= $r['id_nilai_keasramaan'] ?>" class="btn btn-warning" title="edit">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
                        <form action="<?= base_url() ?>admin/keasramaan/detail/<?= $r['id_kegiatan_keasramaan'] ?>/hapus/<?= $r['id_nilai_keasramaan'] ?>" method="post" class="d-inline">
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
                    <th>SANTRI</th>
                    <th>NILAI</th>
                    <th>KETERANGAN</th>
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
      "buttons": ["copy", "csv", "excel", "pdf",
        {
          extend: 'print',
          customize: function(win) {
            // $(win.document.body)
            //   .css('font-size', '30pt')
            //   .prepend(
            //     '<?= $kegiatan_keasramaan['nama_kegiatan_keasramaan'] ?>'
            //   );
            $(win.document.body)
              .css('font-size', '10pt')
              .prepend(
                '<div><h3><?= $kegiatan_keasramaan['nama_kegiatan_keasramaan'] ?></h3></div><img src="" style="position:absolute; top:0; left:0;" />'
              );

            $(win.document.body).find('table')
              .addClass('compact')
              .css('font-size', 'inherit');

          },
          exportOptions: {
            columns: ":visible"
          }
        },
        "colvis"
      ],
      "columnDefs": [{
        "targets": [4],
        "visible": false

      }],
      order: [
        [1, 'ASC']
      ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>



<?= $this->endSection() ?>