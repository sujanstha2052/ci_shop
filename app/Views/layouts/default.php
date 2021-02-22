<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>
		<?= $this->renderSection('title') ?>
	</title>

	<link rel="stylesheet" href="<?= base_url('css/bootstrap.css') ?>">
	<link rel="stylesheet" href="<?= base_url('css/custom.css') ?>">
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.2/css/all.min.css"
	integrity="sha512-HK5fgLBL+xu6dm/Ii3z4xhlSUyZgTT9tuc/hSrtw6uzJOvgRr2a9jyxxT1ely+B+xFAmJKVSTbpM/CuL7qxO8w==" 
	crossorigin="anonymous" />
</head>
<body>
	<?= $this->include('layouts/partials/topHeader') ?>
	<?= $this->include('layouts/partials/navbar') ?>

	<div class="container mt-2">
		<?= $this->include('layouts/partials/flash_message') ?>
		<?= $this->renderSection('content') ?>
	</div>

	<script src="<?= base_url('js/bootstrap.js') ?>"></script>
	<script src="<?= base_url('js/jquery.js') ?>"></script>
	<script src="<?= base_url('js/main.js') ?>"></script>
</body>
</html>