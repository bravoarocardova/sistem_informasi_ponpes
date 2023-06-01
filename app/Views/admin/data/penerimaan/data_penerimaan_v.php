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
              <div class="row">
                <div class="col-lg-3">
                  <h3 class="card-title">
                    <!-- <a href="<?= base_url() ?>admin/data/santri/tambah" class="btn btn-primary">
                      <i class="fas fa-plus-square"></i>
                      Tambah
                    </a> -->
                  </h3>
                </div>
                <div class="col-lg-8 d-flex justify-content-end">
                  <form action="" method="post" class="d-flex align-items-center">
                    <div class="mb-3">
                      <label class="form-label" for="filter_status"></label>
                      <select name="filter_status" id="filter_status" class="form-control">
                        <option value="ALL" <?= ($filter_status == 'ALL') ? 'selected' : '' ?>>ALL</option>
                        <option value="Belum Ditentukan" <?= ($filter_status == 'Belum Ditentukan') ? 'selected' : '' ?>>Belum Ditentukan</option>
                        <option value="Lulus" <?= ($filter_status == 'Lulus') ? 'selected' : '' ?>>Lulus</option>
                        <option value="Tidak Lulus" <?= ($filter_status == 'Tidak Lulus') ? 'selected' : '' ?>>Tidak Lulus</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="filter_jenjang"></label>
                      <select name="filter_jenjang" id="filter_jenjang" class="form-control">
                        <option value="ALL" <?= ($filter_jenjang == 'ALL') ? 'selected' : ''  ?>>ALL</option>
                        <option value="MA" <?= ($filter_jenjang == 'MA') ? 'selected' : '' ?>>MA</option>
                        <option value="MTS" <?= ($filter_jenjang == 'MTS') ? 'selected' : '' ?>>MTS</option>
                      </select>
                    </div>

                    <div class="mb-3">
                      <label class="form-label" for="filter_tahun"></label>
                      <select name="filter_tahun" id="filter_tahun" class="form-control">
                        <option value="ALL" <?= ($filter_tahun == 'ALL') ? 'selected' : ''  ?>>ALL</option>
                        <?php foreach ($list_tahun as $t) : ?>
                          <option value="<?= $t['tahun'] ?>" <?= ($filter_tahun == $t['tahun']) ? 'selected' : '' ?>><?= $t['tahun']  ?></option>
                        <?php endforeach ?>
                      </select>
                    </div>
                    <div class="mb-n1">
                      <button type="submit" class="btn btn-info">
                        <i class="fa fa-search"></i>

                      </button>
                    </div>
                  </form>

                </div>
              </div>
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
                        <?php if (!in_array($r['status'], ['Lulus', 'Tidak Lulus'])) : ?>
                          <form action="<?= base_url() ?>admin/penerimaan/terima/<?= $r['id_pendaftaran'] ?>" method="post" class="d-inline">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="PUT">
                            <button type="submit" class="btn btn-success" title="Terima">
                              <i class="fas fa-check"></i>
                            </button>
                          </form>
                          <form action="<?= base_url() ?>admin/penerimaan/tolak/<?= $r['id_pendaftaran'] ?>" method="post" class="d-inline">
                            <?= csrf_field() ?>
                            <input type="hidden" name="_method" value="PUT">
                            <button type="submit" class="btn btn-danger" title="Tolak">
                              <i class="fas fa-times"></i>
                            </button>
                          </form>
                        <?php else : ?>
                          <span class="<?= ($r['status'] == 'Lulus') ? 'text-success' : 'text-danger' ?>"><?= $r['status'] ?></span>
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