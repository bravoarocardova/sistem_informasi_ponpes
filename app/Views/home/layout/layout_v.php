<!doctype html>
<html lang="en">

<head>
  <?= $this->include('home/layout/_partials/head'); ?>

</head>

<body>
  <?= $this->include('home/layout/_partials/header'); ?>


  <?= $this->renderSection('content') ?>

  <?= $this->include('home/layout/_partials/footer'); ?>


  <?= $this->include('home/layout/_partials/js'); ?>
  <?= $this->renderSection('script') ?>

</body>

</html>