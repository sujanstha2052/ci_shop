<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>CIShop | <?= $this->renderSection('title') ?></title>

    <link href="<?= base_url('adminfiles/css/bootstrap.min.css') ?>" rel="stylesheet">
    <link href="<?= base_url('adminfiles/font-awesome/css/font-awesome.css') ?>" rel="stylesheet">

    <link href="<?= base_url('adminfiles/css/animate.css') ?>" rel="stylesheet">
    <link href="<?= base_url('adminfiles/css/style.css') ?>" rel="stylesheet">
    <link href="<?= base_url('adminfiles/css/custom.css') ?>" rel="stylesheet">

    <?= $this->renderSection('styles') ?>
</head>

<body class="">

    <div id="wrapper">
        <?= $this->include('layouts/partials/admin/sidebar') ?>


        <div id="page-wrapper" class="gray-bg">
            <?= $this->include('layouts/partials/admin/header') ?>

            <div class="wrapper">
                <?= $this->include('layouts/partials/admin/flash_message') ?>
                <?= $this->renderSection('content') ?>
            </div>
            <?= $this->include('layouts/partials/admin/footer') ?>



        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="<?= base_url('adminfiles/js/jquery-3.1.1.min.js') ?>"></script>
    <script src="<?= base_url('adminfiles/js/popper.min.js') ?>"></script>
    <script src="<?= base_url('adminfiles/js/bootstrap.js') ?>"></script>
    <script src="<?= base_url('adminfiles/js/plugins/metisMenu/jquery.metisMenu.js') ?>"></script>
    <script src="<?= base_url('adminfiles/js/plugins/slimscroll/jquery.slimscroll.min.js') ?>"></script>

    <!-- Custom and plugin javascript -->
    <script src="<?= base_url('adminfiles/js/inspinia.js') ?>"></script>
    <script src="<?= base_url('adminfiles/js/plugins/pace/pace.min.js') ?>"></script>
    <?= $this->renderSection('scripts') ?>

</body>

</html>
