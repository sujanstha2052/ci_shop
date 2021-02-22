<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?>Registration<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div id="authForm">
	<div class="card">
		<div class="card-header">
			<h3 class="text-center">Register</h3>
		</div>
		<div class="card-body">
			<?= form_open('authentication/registration') ?>
			<div class="row">
				<div class="col-md-6">
					<div class="mb-3">
						<label for="first_name" class="form-label">First Name</label>
						<input type="text" class="form-control" id="first_name" name="first_name">
					</div>
				</div>

				<div class="col-md-6">
					<div class="mb-3">
						<label for="last_name" class="form-label">Last Name</label>
						<input type="text" class="form-control" id="last_name" name="last_name">
					</div>
				</div>

				<div class="col-md-12">
					<div class="mb-3">
						<label for="email" class="form-label">Email address</label>
						<input type="email" class="form-control" id="email" name="email">
						<div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
					</div>
				</div>

				<div class="col-md-6">
					<div class="mb-3">
						<label for="password" class="form-label">Password</label>
						<input type="password" class="form-control" id="password" name="password">
					</div>
				</div>

				<div class="col-md-6">
					<div class="mb-3">
						<label for="confirm_password" class="form-label">Confirm Password</label>
						<input type="password" class="form-control" id="confirm_password" name="confirm_password">
					</div>
				</div>
			</div>
			
			<div class="mb-3 form-check">
				<input type="checkbox" class="form-check-input" id="check">
				<label class="form-check-label" for="check">I accept the Terms & Conditions</label>
			</div>


			<div class="d-grid gap-2 col-6 mx-auto">
				<button type="submit" class="btn btn-primary">Register</button>
			</div>
			<?= form_close() ?>

			<br>
			<div class="row">
				<div class="col-6">
					<a href="#">Forgot Password?</a>
				</div>
				<div class="col-6" style="text-align: right;">
					<a href="#">Already Have an account?</a>
				</div>
			</div>
		</div>
	</div>
</div>

<?= $this->endSection() ?>