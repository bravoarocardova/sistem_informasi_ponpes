<?= $this->extend('ustadz/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Kelas Pengajar</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active">Kelas</li>
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
              <h3 class="">
                <table>
                  <tr>
                    <td>Kode Pengajar</td>
                    <td>:</td>
                    <td><?= session()->get('ustadz')['kd_ustadz'] ?></td>
                  </tr>
                  <tr>
                    <td>Nama</td>
                    <td>:</td>
                    <td><?= session()->get('ustadz')['nama'] ?></td>
                  </tr>
                </table>
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                  <tr>
                    <th>TAHUN AJARAN</th>
                    <th>KELAS</th>
                    <th>SEMESTER</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($mengajar as $r) : ?>
                    <tr>
                      <td><?= $r['nama_kelas'] ?></td>
                      <td><?= $r['semester'] ?></td>
                      <td><?= $r['tahun_ajaran'] ?></td>
                      <td>
                        <a href="<?= base_url() ?>ustadz/nilai/<?= $r['id_kelas'] ?>" class="btn btn-success"><i class="fas fa-eye"></i> Lihat</a>
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
      "pageLength": 21,
      order: [
        [0, 'desc'],
        [1, 'desc'],
        [2, 'desc'],
      ],
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf",
        {
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
                    <h3>Data Mengajar</h3>
                  </div>
                </div>
                <hr>
                <div class="row">
                  <div class="col-12 text-center">
                    <h4>Daftar Data Mengajar</h4>
                  </div>
                </div>
                
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

                          <p><?= session('ustadz')['nama'] ?></p>
                          <p></p>
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
        }, "colvis"
      ],
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