<?php if(session()->has('success')) :?>
<div class="alert alert-success alert-dismissible fade show">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<?= session('success') ?>
</div>
<?php endif; ?>

<?php if(session()->has('info')) :?>
<div class="alert alert-info alert-dismissible fade show">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<?= session('info') ?>
</div>
<?php endif; ?>

<?php if(session()->has('error')) :?>
<div class="alert alert-warning alert-dismissible fade show">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<?= session('error') ?>
</div>
<?php endif; ?>

<?php if(session()->has('errors')) :?>
<div class="alert alert-warning alert-dismissible fade show">
	<button type="button" class="close" data-dismiss="alert">&times;</button>
	<?php foreach(session('errors') as $err): ?>
		<li><?= $err ?></li>
	<?php endforeach; ?>
</div>
<?php endif; ?>