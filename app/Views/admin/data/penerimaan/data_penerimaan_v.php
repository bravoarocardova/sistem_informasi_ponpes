<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Penerimaan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active">Penerimaan</li>
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
                <!-- <a href="<?= base_url() ?>admin/penerimaan/tambah" class="btn btn-primary">
                  <i class="fas fa-plus-square"></i>
                  Tambah
                </a> -->
              </h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              <table id="example1" class="table table-bordered table-striped ">
                <thead>
                  <tr>
                    <th>TERIMA</th>
                    <th>ID PENDAFTARAN</th>
                    <th>NAMA</th>
                    <th>PHOTO</th>
                    <th>JK</th>
                    <th>NO TELP</th>
                    <th>EMAIL</th>
                    <th>TEMPAT LAHIR</th>
                    <th>TANGGAL LAHIR</th>
                    <th>ALAMAT LENGKAP</th>
                    <th>ASAL SEKOLAH</th>
                    <th>PENANGGUNG JAWAB</th>
                    <th>LULUS TAHUN</th>
                    <th>STATUS</th>
                    <th>TANGGAL DIBUAT</th>
                    <th>TANGGAL UPDATE</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pendaftaran as $r) : ?>
                    <tr>
                      <td>
                        <?php if ($r['status'] != 'Lulus') : ?>
                          <form action="<?= base_url() ?>admin/penerimaan/terima/<?= $r['id_pendaftaran'] ?>" method="post" class="d-inline">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="PUT">
                            <button type="submit" class="btn btn-success" title="Terima">
                              <i class="fas fa-check"></i>
                            </button>
                          </form>
                        <?php else : ?>
                          <span class="text-success">Lulus</span>
                        <?php endif ?>
                      </td>
                      <td><?= $r['id_pendaftaran'] ?></td>
                      <td><?= $r['nama'] ?></td>
                      <td>
                        <img src="<?= base_url() . 'img/pendaftaran/' . $r['photo'] ?>" class="" width="128">
                      </td>
                      <td class="text-center"><?= $r['jk'] ?></td>
                      <td><?= $r['no_telp'] ?></td>
                      <td><?= $r['email'] ?></td>
                      <td><?= $r['tempat_lahir'] ?></td>
                      <td><?= $r['tgl_lahir'] ?></td>
                      <td><?= $r['alamat'] ?></td>
                      <td><?= $r['asal_sekolah'] ?></td>
                      <td><?= $r['nama_admin'] ?></td>
                      <td class="text-center"><?= $r['lulus_tahun'] ?></td>
                      <td><?= $r['status'] ?></td>
                      <td><?= $r['created_at'] ?></td>
                      <td><?= $r['updated_at'] ?></td>
                      <td>
                        <!-- <a href="<?= base_url() ?>admin/penerimaan/edit/<?= $r['id_pendaftaran'] ?>" class="btn btn-warning" title="edit">
                          <i class="fas fa-pencil-alt"></i>
                        </a> -->
                        <form action="<?= base_url() ?>admin/penerimaan/hapus/<?= $r['id_pendaftaran'] ?>" method="post" class="d-inline">
                          <?= csrf_field() ?>
                          <input type="hidden" name="_method" value="DELETE">
                          <button class="btn btn-danger" title="hapus" onclick="return confirm('hapus <?= $r['id_pendaftaran'] ?> ? ')">
                            <i class="fas fa-trash"></i>
                          </button>
                        </form>
                      </td>
                    </tr>
                  <?php endforeach ?>
                </tbody>
                <tfoot>
                  <tr>
                    <th>TERIMA</th>
                    <th>ID PENDAFTARAN</th>
                    <th>NAMA</th>
                    <th>PHOTO</th>
                    <th>JK</th>
                    <th>NO TELP</th>
                    <th>EMAIL</th>
                    <th>TEMPAT LAHIR</th>
                    <th>TANGGAL LAHIR</th>
                    <th>ALAMAT LENGKAP</th>
                    <th>ASAL SEKOLAH</th>
                    <th>PENANGGUNG JAWAB</th>
                    <th>LULUS TAHUN</th>
                    <th>STATUS</th>
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
        "targets": [3, 6, 7, 8, 9, 11, 12, 13, 15],
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