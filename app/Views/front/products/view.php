<?= $this->extend('layouts/default') ?>
<?= $this->section('title') ?><?= isset($page_title) ? $page_title : '' ?><?= $this->endSection() ?>

<?= $this->section('content') ?>
<div class="row">
	<div class="col-md-4">
		<img src="<?= site_url('/products/image/' . $store_item->id) ?>" alt="">
	</div>
	<div class="col-md-5">
		<h2>
			<?= ucwords($store_item->item_title) ?>
		</h2>

		<div style="clear:both; font-size: 12px;">
			<?= nl2br($store_item->item_description) ?>
		</div>
	</div>
	<div class="col-md-3">
		<div>
			<?= $add_to_cart ?>
		</div>
	</div>
</div>
<?= $this->endSection() ?>