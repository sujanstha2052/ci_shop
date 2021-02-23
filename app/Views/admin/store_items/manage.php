<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?><?= $page_title ?><?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="ibox">
	<div class="ibox-content">
		<h3><?= $page_title ?></h3>
		<a href="<?= base_url('/admin/store_items/create') ?>" class="btn btn-sm btn-primary">
			<i class="fa fa-plus-circle"></i> &nbsp; Add Store Items
		</a>
		<div class="row mt-2">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th class="w-50 ac">#</th>
								<th>Item Title</th>
								<th>Price</th>
								<th>Was Price</th>
								<th>Status</th>
								<th class="w-250 ac">Action</th>
							</tr>
						</thead>
						<tbody>
							
						</tbody>
					</table>
					<div class="float-right">
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<?= $this->endSection() ?>