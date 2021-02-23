<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?><?= $page_title ?><?= $this->endSection() ?>
<?= $this->section('styles') ?>
<style>
	.imagePreview {
		height: 250px;
	}
</style>
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="ibox">
	<div class="ibox-content">
		<h3><?= $page_title ?></h3>
		<a href="<?= base_url('/admin/store_items/manage') ?>" class="btn btn-sm btn-primary">
			Back &nbsp; <i class="fa fa-chevron-circle-right"></i>
		</a>
		<div class="row mt-2">
			<div class="col-md-12">
				<?= form_open_multipart('admin/store_items/upload_image/' . $store_item_id) ?>
				<div class="form-group">
					<label for="">Item Image</label>
					<div class="custom-file">
						<input id="item_image" type="file" class="custom-file-input" name="item_image">
						<label for="item_image" class="custom-file-label">Choose file...</label>
					</div> 
				</div>
				<div class="imagePreview"></div>
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
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>

<script>
	$(document).ready(function(){
		$('.custom-file-input').on('change', function() {
			let fileName = $(this).val().split('\\').pop();
			$(this).next('.custom-file-label').addClass("selected").html(fileName);
		}); 
	});
</script>
<?= $this->endSection() ?>