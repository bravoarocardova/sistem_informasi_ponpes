<?= $this->extend('ustadz/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Kelas <?= $kelas['nama_kelas'] ?> ( <?= $kelas['tahun_ajaran'] ?> - <?= $kelas['semester'] ?> )</h1>
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
                    <th>NIS</th>
                    <th>NAMA SISWA</th>
                    <th>JK</th>
                    <th>NILAI</th>
                    <th>TANGGAL DIBUAT</th>
                    <th>TANGGAL UPDATE</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($kelas_siswa as $u) : ?>
                    <tr>
                      <td><?= $u['nis'] ?></td>
                      <td><?= $u['nama_santri'] ?></td>
                      <td><?= $u['jk'] ?></td>
                      <td>
                        <a href="<?= base_url() ?>ustadz/kelas/nilai/<?= $u['id_data_kelas'] ?>" class="btn btn-success"><i class="fas fa-eye"></i> Lihat Nilai</a>
                      </td>
                      <td><?= $u['created_at'] ?></td>
                      <td><?= $u['updated_at'] ?></td>

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
        [2, 'asc'],
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
                    <h3>Data Siswa</h3>
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
        "targets": [4, 5],
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