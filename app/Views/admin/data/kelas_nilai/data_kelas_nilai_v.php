<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Nilai <?= $siswa['nama_santri'] ?> - <?= $kelas['nama_kelas'] ?> ( <?= $kelas['tahun_ajaran'] ?> - <?= $kelas['semester'] ?> )</h1>
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
              <div class="row">
                <div class="col-lg-9">
                  <h3 class="card-title">
                    <table>
                      <tr>
                        <td>Nis</td>
                        <td>:</td>
                        <td><?= $siswa['nis'] ?></td>
                      </tr>
                      <tr>
                        <td>Nama</td>
                        <td>:</td>
                        <td><?= $siswa['nama_santri'] ?></td>
                      </tr>
                      <tr>
                        <td>Kelas</td>
                        <td>:</td>
                        <td><?= $kelas['nama_kelas'] ?> </td>
                      </tr>
                      <tr>
                        <td>Semester</td>
                        <td>:</td>
                        <td><?= $kelas['semester'] ?> </td>
                      </tr>
                      <tr>
                        <td>Tahun Ajaran</td>
                        <td>:</td>
                        <td><?= $kelas['tahun_ajaran'] ?> </td>
                      </tr>
                    </table>
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
                    <th>MAPEL</th>
                    <th>NILAI</th>
                    <th>TANGGAL DIBUAT</th>
                    <th>TANGGAL UPDATE</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($nilai as $u) : ?>
                    <tr>
                      <td><?= $u['nama_mapel'] ?></td>
                      <td><?= $u['nilai'] ?></td>
                      <td><?= $u['dibuat'] ?></td>
                      <td><?= $u['diedit'] ?></td>

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
        [0, 'asc'],
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
                    <h3>Data Nilai</h3>
                  </div>
                </div>
                <hr>
                <div>
                  <table>
                    <tr>
                      <td>Nis</td>
                      <td>:</td>
                      <td><?= $siswa['nis'] ?></td>
                    </tr>
                    <tr>
                      <td>Nama</td>
                      <td>:</td>
                      <td><?= $siswa['nama_santri'] ?></td>
                    </tr>
                    <tr>
                      <td>Kelas</td>
                      <td>:</td>
                      <td><?= $kelas['nama_kelas'] ?> </td>
                    </tr>
                    <tr>
                      <td>Semester</td>
                      <td>:</td>
                      <td><?= $kelas['semester'] ?> </td>
                    </tr>
                    <tr>
                      <td>Tahun Ajaran</td>
                      <td>:</td>
                      <td><?= $kelas['tahun_ajaran'] ?> </td>
                    </tr>
                  </table>
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
                        
                          <p>Wali Kelas</p>
                          <p><?= $kelas['wali_kelas'] ?></p>
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