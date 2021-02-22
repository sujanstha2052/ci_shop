<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>Manage Category<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="ibox">
	<div class="ibox-content">
		<h3>Manage Category</h3>
		<a href="<?= base_url('admin/categories/create') ?>" class="btn btn-sm btn-primary">
			<i class="fa fa-plus-circle"></i> &nbsp; Add Category
		</a>
		<div class="row mt-2">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th>#</th>
								<th>First Name</th>
								<th>Last Name</th>
								<th>Username</th>
							</tr>
						</thead>
						<tbody>
							<tr>
								<td>1</td>
								<td>Mark</td>
								<td>Otto</td>
								<td>@mdo</td>
							</tr>
							<tr>
								<td>2</td>
								<td>Jacob</td>
								<td>Thornton</td>
								<td>@fat</td>
							</tr>
							<tr>
								<td>3</td>
								<td>Larry</td>
								<td>the Bird</td>
								<td>@twitter</td>
							</tr>
						</tbody>
					</table>
				</div>
			</div>
			
		</div>
	</div>
</div>






<?= $this->endSection() ?>