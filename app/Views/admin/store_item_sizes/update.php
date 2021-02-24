<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?><?= isset($page_title) ? $page_title : '' ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="ibox">
	<div class="ibox-content">
		<h3><?= $page_title ?></h3>
		<a href="<?= base_url('/admin/store_items/edit/') ?>" class="btn btn-sm btn-primary">
			Back &nbsp; <i class="fa fa-chevron-circle-right"></i>
		</a>

		<div class="row mt-2">
			<div class="col-md-12">
				<?= form_open('/admin/store_item_sizes/update/' . $store_item_id) ?>
				<div class="form-group">
					<label for="size">size</label>
					<input type="text" id="size" class="form-control" name="size"
					value="<?= (isset($store_item_size->size) ? $store_item_size->size : old('size')); ?>">
				</div>

				<div>
					<button class="btn btn-sm btn-primary" type="submit">
						<strong>Submit</strong>
					</button>
				</div>
				<?= form_close() ?>
			</div>
		</div>
	</div>
</div>

<div class="ibox">
	<div class="ibox-title">
		<h3>Existing size Options</h3>
	</div>
	<div class="ibox-content">
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="w-50 ac">#</th>
						<th class="ac">size</th>
						<th class="w-250 ac">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if(isset($store_item_sizes)): ?>
						<?php foreach($store_item_sizes as $row): ?>
							<tr>
								<td class="ac">
									<?= $row->id; ?>
								</td>
								<td>
									<?= $row->size ?>
								</td>
								<td class="ac">
									<a href="<?= base_url('/admin/store_item_sizes/delete/' . $row->id) ?>" class="btn btn-danger">
										<i class="fa fa-trash"></i> &nbsp; Remove Option
									</a>
								</td>
							</tr>
						<?php endforeach; ?>
					<?php endif; ?>
				</tbody>	
			</table>
		</div>
	</div>
</div>

<?= $this->endSection() ?>