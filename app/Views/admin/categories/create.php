<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?>Manage Category<?= $this->endSection() ?>
<?= $this->section('content') ?>



<div class="ibox ">
	<div class="ibox-content">
		<h3>Create Category</h3>
		<hr>
		<div class="row">
			<div class="col-md-12">
				<?= form_open('admin/categories/create') ?>
				<div class="form-group">
					<label for="cat_title">Category Title</label> 
					<input type="text" id="cat_title" class="form-control" name="cat_title">
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






<?= $this->endSection() ?>