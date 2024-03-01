<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $judul; ?></title>
    <!-- Custom fonts for this template-->
    <link href="<?= base_url(); ?>vendor/fontawesome-free-6.5.1-web/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="<?= base_url(); ?>public/css/styles.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

    <!-- bootstrap dan datatables-->
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/DataTables/Bootstrap-5-5.3.0/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/DataTables/DataTables-2.0.1/css/dataTables.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/DataTables/Responsive-3.0.0/css/responsive.bootstrap.css">
    <link rel="stylesheet" type="text/css" href="<?= base_url(); ?>vendor/DataTables/Buttons-3.0.0/css/buttons.bootstrap.css">


</head>

<body>
    <!-- Begin Page Content -->
    <?= $this->renderSection('page-content'); ?>
    <!-- /.container-fluid -->


    <!-- Bootstrap core JavaScript-->
    <script src="<?= base_url(); ?>vendor/DataTables/Bootstrap-5-5.3.0/jsbootstrap.bundle.js"></script>
    <script src="<?= base_url(); ?>vendor/DataTables/Buttons-3.0.0/js/buttons.bootstrap.js"></script>
    <script src="<?= base_url(); ?>vendor/DataTables/DataTables-2.0.1/js/dataTables.bootstrap.js"></script>
    <script src="<?= base_url(); ?>vendor/DataTables/jQuery-1.12.4/jquery-1.12.4.js"></script>
    <script src="<?= base_url(); ?>vendor/DataTables/Responsive-3.0.0/js/dataTables.responsive.js"></script>
    <script src="<?= base_url(); ?>vendor/fontawesome-free-6.5.1-web/js/all.js"></script>
</body>

</html>