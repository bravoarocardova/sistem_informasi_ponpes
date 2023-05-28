<?= $this->extend('admin/layout/layout_v') ?>
<?= $this->section('content') ?>


<div class="content-wrapper">
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Data Santri</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Data</a></li>
            <li class="breadcrumb-item active">Santri</li>
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
                    <a href="<?= base_url() ?>admin/data/santri/tambah" class="btn btn-primary">
                      <i class="fas fa-plus-square"></i>
                      Tambah
                    </a>
                  </h3>
                </div>
                <div class="col-lg-8 d-flex justify-content-end">
                  <form action="" method="post" class="d-flex align-items-center">
                    <div class="mb-3">
                      <label class="form-label" for="filter_jenjang"></label>
                      <select name="filter_jenjang" id="filter_jenjang" class="form-control">
                        <option value="ALL" <?= ($filter_jenjang == 'ALL') ? 'selected' : '' ?>>ALL</option>
                        <option value="MA" <?= ($filter_jenjang == 'MA') ? 'selected' : '' ?>>MA</option>
                        <option value="MTS" <?= ($filter_jenjang == 'MTS') ? 'selected' : '' ?>>MTS</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="filter_jk"></label>
                      <select name="filter_jk" id="filter_jk" class="form-control">
                        <option value="ALL" <?= ($filter_jk == 'ALL') ? 'selected' : '' ?>>ALL</option>
                        <option value="L" <?= ($filter_jk == 'L') ? 'selected' : '' ?>>Laki-laki</option>
                        <option value="P" <?= ($filter_jk == 'P') ? 'selected' : '' ?>>Perempuan</option>
                      </select>
                    </div>
                    <div class="mb-3">
                      <label class="form-label" for="filter_tahun"></label>
                      <select name="filter_tahun" id="filter_tahun" class="form-control">
                        <option value="ALL" <?= ($filter_tahun == 'ALL') ? 'selected' : '' ?>>ALL</option>
                        <?php foreach ($list_tahun as $t) : ?>
                          <option value="<?= $t['tahun_masuk'] ?>" <?= ($filter_tahun == $t['tahun_masuk']) ? 'selected' : '' ?>><?= $t['tahun_masuk'] ?></option>
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
                    <th>JENJANG SEKOLAH</th>
                    <th>PASSWORD</th>
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
                      <td><?= $s['jenjang_sekolah'] ?></td>
                      <td><?= $s['password'] ?></td>
                      <td><?= $s['created_at'] ?></td>
                      <td><?= $s['updated_at'] ?></td>
                      <td>
                        <a href="<?= base_url() ?>admin/data/santri/edit/<?= $s['nis'] ?>" class="btn btn-warning" title="edit">
                          <i class="fas fa-pencil-alt"></i>
                        </a>
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

<script>
  $(function() {
    $("#example1").DataTable({
      "responsive": true,
      "lengthChange": false,
      "autoWidth": false,
      "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"],
      "columnDefs": [{
        "targets": [4, 5, 8, 9, 11, 12, 13],
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