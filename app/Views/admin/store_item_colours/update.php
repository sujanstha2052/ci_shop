<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?><?= isset($page_title) ? $page_title : '' ?><?= $this->endSection() ?>

<?= $this->section('content') ?>

<div class="ibox">
	<div class="ibox-content">
		<h3><?= $page_title ?></h3>
		<a href="<?= base_url('/admin/store_items/edit/' . $store_item_id) ?>" class="btn btn-sm btn-primary">
			Back &nbsp; <i class="fa fa-chevron-circle-right"></i>
		</a>

		<div class="row mt-2">
			<div class="col-md-12">
				<?= form_open('/admin/store_item_colours/update/' . $store_item_id) ?>
				<div class="form-group">
					<label for="colour">Colour</label>
					<input type="text" id="colour" class="form-control" name="colour"
					value="<?= (isset($store_item_colour->colour) ? $store_item_colour->colour : old('colour')); ?>">
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
		<h3>Existing Colour Options</h3>
	</div>
	<div class="ibox-content">
		<div class="table-responsive">
			<table class="table table-bordered">
				<thead>
					<tr>
						<th class="w-50 ac">#</th>
						<th class="ac">Colour</th>
						<th class="w-250 ac">Action</th>
					</tr>
				</thead>
				<tbody>
					<?php if(isset($store_item_colours)): ?>
						<?php foreach($store_item_colours as $row): ?>
							<tr>
								<td class="ac">
									<?= $row->id; ?>
								</td>
								<td>
									<?= $row->colour ?>
								</td>
								<td class="ac">
									<a href="<?= base_url('/admin/store_item_colours/delete/' . $row->id) ?>" class="btn btn-danger">
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