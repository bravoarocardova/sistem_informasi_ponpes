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
                    <th>BUKTI PEMBAYARAN</th>
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
                    <th>TANGGAL TES</th>
                    <th>NILAI TES</th>
                    <th>TANGGAL DIBUAT</th>
                    <th>TANGGAL UPDATE</th>
                    <th>AKSI</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($pendaftaran as $r) : ?>

                    <div class="modal fade" id="modal-default-<?= $r['id_pendaftaran'] ?>">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Tanggal Tes</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                            <form action="<?= base_url() ?>admin/penerimaan/terima/<?= $r['id_pendaftaran'] ?>" method="post" class="d-inline">
                              <?= csrf_field() ?>
                              <input type="hidden" name="_method" value="PUT">
                              <div class="mb-3">
                                <label class="form-label" for="tgl_tes">Tanggal Tes</label>
                                <input type="date" required class="form-control <?= validation_show_error('tgl_tes') ? 'is-invalid' : '' ?>" id="tgl_tes" name="tgl_tes" placeholder="Tanggal Tes" value="<?= old('tgl_tes') ?>">
                              </div>
                              <div class="mb-3">
                                <label class="form-label" for="jam_tes">Jam Tes</label>
                                <select name="jam_tes" id="jam_tes" class="form-control">
                                  <option value="">Pilih Jam</option>
                                  <option value="09:30">09:30</option>
                                  <option value="13:30">13:30</option>
                                </select>
                                <!-- <input type="time" required class="form-control <?= validation_show_error('jam_tes') ? 'is-invalid' : '' ?>" id="jam_tes" name="jam_tes" placeholder="Jam Tes" value="<?= old('jam_tes') ?>"> -->
                              </div>
                              <button type="submit" class="btn btn-success" title="Terima">
                                <i class="fas fa-check"></i> Terima
                              </button>
                            </form>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>

                    <div class="modal fade" id="modal-lulus-<?= $r['id_pendaftaran'] ?>">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Nilai Hasil Tes</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                            <form action="<?= base_url() ?>admin/penerimaan/terima_lulus/<?= $r['id_pendaftaran'] ?>" method="post" class="d-inline">
                              <?= csrf_field() ?>
                              <input type="hidden" name="_method" value="PUT">
                              <div class="mb-3">
                                <label class="form-label" for="nilai_tes">Nilai Tes</label>
                                <input type="text" required class="form-control <?= validation_show_error('nilai_tes') ? 'is-invalid' : '' ?>" id="nilai_tes" name="nilai_tes" placeholder="Nilai Tes" value="<?= old('nilai_tes') ?>">
                              </div>

                              <button type="submit" class="btn btn-primary" title="Lulus Tes">
                                <i class="fas fa-check"></i> Kirim
                              </button>
                            </form>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>

                    <div class="modal fade" id="modal-tidak-lulus-<?= $r['id_pendaftaran'] ?>">
                      <div class="modal-dialog modal-md">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h4 class="modal-title">Nilai Hasil Tes tidak lulus</h4>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">

                            <form action="<?= base_url() ?>admin/penerimaan/tidak_lulus/<?= $r['id_pendaftaran'] ?>" method="post" class="d-inline">
                              <?= csrf_field() ?>
                              <input type="hidden" name="_method" value="PUT">
                              <div class="mb-3">
                                <label class="form-label" for="nilai_tes">Nilai Tes</label>
                                <input type="text" required class="form-control <?= validation_show_error('nilai_tes') ? 'is-invalid' : '' ?>" id="nilai_tes" name="nilai_tes" placeholder="Nilai Tes" value="<?= old('nilai_tes') ?>">
                              </div>

                              <button type="submit" class="btn btn-warning" title="Lulus Tes">
                                <i class="fas fa-check"></i> Tidak Lulus
                              </button>
                            </form>
                          </div>
                          <div class="modal-footer justify-content-between">
                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                          </div>
                        </div>
                        <!-- /.modal-content -->
                      </div>
                      <!-- /.modal-dialog -->
                    </div>
                    <tr>
                      <td>
                        <?php if ($r['status'] == 'Lulus Syarat') : ?>
                          <!-- Lulus Tes -->
                          <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal-lulus-<?= $r['id_pendaftaran'] ?>">
                            <i class="fas fa-check"></i>
                          </button>
                          <!-- Tidak lulus -->
                          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-tidak-lulus-<?= $r['id_pendaftaran'] ?>">
                            <i class="fas fa-times"></i>
                          </button>

                          <br>
                          <span class="<?= (in_array($r['status'], ['Lulus Syarat'])) ? 'text-primary' : 'text-danger' ?>"><?= $r['status'] ?></span>
                        <?php elseif (!in_array($r['status'], ['Lulus', 'Tidak Lulus'])) : ?>
                          <?php if ($r['bukti_pembayaran'] != null) : ?>
                            <!-- Terima berkas dan jadwalkan tes -->
                            <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-default-<?= $r['id_pendaftaran'] ?>">
                              <i class="fas fa-check"></i>
                            </button>
                            <form action="<?= base_url() ?>admin/penerimaan/tolak/<?= $r['id_pendaftaran'] ?>" method="post" class="d-inline">
                              <?= csrf_field() ?>
                              <input type="hidden" name="_method" value="PUT">
                              <button type="submit" class="btn btn-danger" title="Tolak">
                                <i class="fas fa-times"></i>
                              </button>
                            </form>
                          <?php else : ?>
                            <p>Belum Bayar</p>
                          <?php endif ?>
                        <?php else : ?>
                          <span class="<?= (in_array($r['status'], ['Lulus'])) ? 'text-success' : 'text-danger' ?>">
                            <?= $r['status'] ?>
                          </span>
                        <?php endif ?>
                      </td>
                      <td><?= $r['id_pendaftaran'] ?></td>
                      <td>
                        <?php if ($r['bukti_pembayaran'] != null) : ?>
                          <a target="_blank" href="<?= base_url() . 'img/bukti/' . $r['bukti_pembayaran'] ?>" class="btn btn-primary">Lihat Bukti</a>
                        <?php else : ?>
                          <p class="text-danger">Belum Bayar</p>

                        <?php endif ?>
                      </td>
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
                      <td><?= $r['tgl_tes'] ?></td>
                      <td><?= $r['nilai_tes'] ?></td>
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


<!-- /.modal -->

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
                    <h3>Data Penerimaan</h3>
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
        "targets": [4, 7, 8, 9, 10, 12, 13, 14, 15, 18],
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