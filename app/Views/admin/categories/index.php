<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>Manage Category<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="ibox">
	<div class="ibox-content">
		<h3>Manage Category</h3>
		<a href="<?= base_url('/admin/categories/create') ?>" class="btn btn-sm btn-primary">
			<i class="fa fa-plus-circle"></i> &nbsp; Add Category
		</a>
		<div class="row mt-2">
			<div class="col-md-12">
				<div class="table-responsive">
					<table class="table table-bordered">
						<thead>
							<tr>
								<th class="w-50 ac">#</th>
								<th>Category Title</th>
								<th>Parent Category</th>
								<th class="w-250 ac">Action</th>
							</tr>
						</thead>
						<tbody>
							<?php foreach($categories as $row): ?>
								<tr>
									<td class="ac">
										<?= $row->id ?>
									</td>
									<td>
										<?= $row->cat_title ?>
									</td>
									<td>
										<?= $row->parent_cat_id ?>
									</td>
									<td class="ac">
										<a href="<?= base_url('/admin/categories/edit/' . $row->id) ?>" class="btn btn-info btn-xs">
											<i class="fa fa-edit"></i>
										</a>
										<a href="<?= base_url('/admin/categories/delete/' . $row->id) ?>" class="btn btn-danger btn-xs">
											<i class="fa fa-trash"></i>
										</a>

									</td>
								</tr>
							<?php endforeach; ?>

						</tbody>
					</table>
					<div class="float-right">
						<?= $pager->links() ?>
					</div>
				</div>
			</div>
			
		</div>
	</div>
</div>
<?= $this->endSection() ?>