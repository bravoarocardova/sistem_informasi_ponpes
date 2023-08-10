<?= $this->extend('santri/layout/layout_v') ?>
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
              <h2 class="">
                <?= session()->get('santri')['nis'] . " - " . session()->get('santri')['nama']; ?>
              </h2>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                  <tr>
                    <th>TANGGAL SETORAN</th>
                    <th>KEGIATAN KEASRAMAAN</th>
                    <th>NAMA USTADZ</th>
                    <th>NIS</th>
                    <th>SANTRI</th>
                    <th>NILAI</th>
                    <th>KETERANGAN</th>
                    <th>TANGGAL UPDATE</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($kegiatan_keasramaan as $r) : ?>
                    <tr>
                      <td><?= $r['created_at'] ?></td>
                      <td><?= $r['nama_kegiatan_keasramaan'] ?></td>
                      <td><?= $r['nama_ustadz'] ?></td>
                      <td><?= $r['nis'] ?></td>
                      <td><?= $r['nama_santri'] ?></td>
                      <td class="text-bold"><?= $r['nilai'] ?></td>
                      <td><?= $r['keterangan'] ?></td>
                      <td><?= $r['updated_at'] ?></td>
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
                    <h3>Data Kegiatan Keasramaan</h3>
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
                        <?php if (session()->get('santri')['jk'] == 'L') : ?>
                          <p>Khoirunnas</p>
                        <?php else : ?>
                          <p>Sri Wulandari, S.Pd</p>
                        <?php endif ?>
                          <p>Wakil Kesiswaan</p>
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
        "targets": [3, 4, 7],
        "visible": false

      }],
      order: [
        [1, 'ASC']
      ],
    }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');

  });
</script>



<?= $this->endSection() ?>