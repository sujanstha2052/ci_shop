<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>Login<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div id="authForm">
	<div class="row">
		<div class="col-4 mx-auto">
			<div class="card">
				<div class="card-header">
					<h3 class="text-center">Login</h3>
				</div>
				<div class="card-body">
					<?= form_open('authentication/login') ?>
					<div class="mb-3">
						<label for="email" class="form-label">Email address</label>
						<input type="email" class="form-control" id="email" name="email">
						<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
					</div>
					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" class="form-control" id="password" name="password">
					</div>
					<div class="d-grid gap-2 col-6 mx-auto">
						<button type="submit" class="btn btn-primary">Login</button>
					</div>
					<?= form_close() ?>
					<br>
					<div class="row">
						<div class="col-6">
							<a href="#">Forgot Password?</a>
						</div>
						<div class="col-6" style="text-align: right;">
							<a href="#">Need an account?</a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>