<?php if(session()->has('warning')): ?>
<div class="alert alert-warning alert-dismissible fade show" role="alert">
	<?= session('warning') ?>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<?php if(session()->has('error')): ?>
<div class="alert alert-danger alert-dismissible fade show" role="alert">
	<?= session('danger') ?>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<?php if(session()->has('info')): ?>
<div class="alert alert-info alert-dismissible fade show" role="alert">
	<?= session('info') ?>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<?php if(session()->has('success')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<?= session('success') ?>
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
</div>
<?php endif; ?>

<?php if(session()->has('errors')): ?>
<div class="alert alert-success alert-dismissible fade show" role="alert">
	<button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
	<?php foreach(session('errors') as $error): ?>
		<li>
			<?php echo $error; ?>
		</li>
	<?php endforeach; ?>
</div>
<?php endif; ?>
