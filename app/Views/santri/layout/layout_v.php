<!DOCTYPE html>
<html lang="en">

<head>
  <?= $this->include('santri/layout/_partials/head') ?>
</head>

<body class="hold-transition sidebar-mini layout-fixed">
  <div class="wrapper">

    <!-- Preloader -->
    <div class="preloader flex-column justify-content-center align-items-center">
      <img class="animation__shake" src="<?= base_url() ?>img/icon/<?= $profilApp['logo'] ?>" alt="<?= $profilApp['nama_pondok'] ?>" height="60" width="60">
    </div>

    <!-- Navbar -->
    <?= $this->include('santri/layout/_partials/navbar') ?>

    <!-- /.navbar -->

    <!-- Main Sidebar Container -->
    <?= $this->include('santri/layout/_partials/aside') ?>


    <!-- Content Wrapper. Contains page content -->
    <?= $this->renderSection('content') ?>
    <!-- /.content-wrapper -->

    <?= $this->include('santri/layout/_partials/footer') ?>

    <!-- Control Sidebar -->
    <aside class="control-sidebar control-sidebar-dark">
      <!-- Control sidebar content goes here -->
    </aside>
    <!-- /.control-sidebar -->
  </div>
  <!-- ./wrapper -->

  <?= $this->include('santri/layout/_partials/js') ?>
</body>

</html>