<?= $this->extend('layouts/admin') ?>

<?= $this->section('title') ?>Update Category<?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="ibox ">
	<div class="ibox-content">
		<h3>Update Category</h3>
		<hr>
		<div class="row">
			<div class="col-md-12">
				
				<?= form_open("admin/categories/update/" . $category->id) ?>
				<div class="form-group">
					<label for="cat_title">Category Title</label> 
					<input type="text" id="cat_title" class="form-control" name="cat_title" value="<?= (isset($category->cat_title) ? $category->cat_title : old('cat_title')); ?>">
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