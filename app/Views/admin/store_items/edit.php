<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?><?= isset($page_title) ? $page_title : '' ?><?= $this->endSection() ?>
<?= $this->section('styles') ?>
<link href="<?= base_url('adminfiles/css/plugins/summernote/summernote-bs4.css') ?>" rel="stylesheet">
<?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="ibox">
    <div class="ibox-title">
        <h3>Item Options</h3>
    </div>
    <div class="ibox-content">
        <?php if($store_item->big_pic == ""){ ?>
            <a href="<?= base_url('/admin/store_items/upload_image/' . $store_item->id) ?>" class="btn btn-primary">Upload
            Item Image</a>
        <?php }else{ ?>
            <a href="<?= base_url('/admin/store_items/delete_image/' . $store_item->id) ?>" class="btn btn-danger">Delete
            Item Image</a>
        <?php } ?>
        <a href="<?= base_url('/admin/store_item_colours/update/' . $store_item->id) ?>" class="btn btn-primary">Update Item Colours</a>
        <a href="<?= base_url('/admin/store_item_sizes/update/' . $store_item->id) ?>" class="btn btn-primary">Update Item Sizes</a>
        <a href="" class="btn btn-primary">Update Categories</a>
        <a href="<?= base_url('/product/' . $store_item->item_url) ?>" class="btn btn-info" target="_blank">View In Shop</a>
        <a href="<?= base_url('/admin/store_items/delete/' . $store_item->id) ?>" class="btn btn-danger">Delete Item</a>
    </div>
</div>


<div class="ibox">
    <div class="ibox-content">
        <h3><?= $page_title ?></h3>
        <a href="<?= base_url('/admin/store_items/manage') ?>" class="btn btn-sm btn-primary">
            Back &nbsp; <i class="fa fa-chevron-circle-right"></i>
        </a>
        <div class="row mt-2">
            <div class="col-md-12">
                <?= form_open('admin/store_items/edit/' . $store_item->id) ?>
                <div class="form-group">
                    <label for="item_title">Item Title</label>
                    <input type="text" id="item_title" class="form-control" name="item_title"
                    value="<?= (isset($store_item->item_title) ? $store_item->item_title : old('item_title')); ?>">
                </div>

                <div class="form-group">
                    <label for="item_price">Item Price</label>
                    <input type="text" id="item_price" class="form-control" name="item_price"
                    value="<?= (isset($store_item->item_price) ? $store_item->item_price : old('item_price')); ?>">
                </div>

                <div class="form-group">
                    <label for="was_price">Was Price <span class="text-green">(optional)</span></label>
                    <input type="text" id="was_price" class="form-control" name="was_price"
                    value="<?= (isset($store_item->was_price) ? $store_item->was_price : old('was_price')) ?>">
                </div>

                <div class="form-group">
                    <label for="status">Status</label>
                    <?php
                    $options = array(
                        "" => 'Please Select',
                        "active" => 'Active',
                        "inactive" => 'Inactive'
                    );
                    ?>
                    <?= form_dropdown("status", $options, (isset($store_item->status) ? $store_item->status : old('was_price')), array('class' => 'form-control', 'required' => true)) ?>
                </div>

                <div class="form-group">
                    <label for="was_price">Item Description</label>
                    <textarea name="item_description" id="item_description" cols="30" rows="10"
                    class="summernote"><?= (isset($store_item->item_description) ? $store_item->item_description : old('item_description')); ?></textarea>
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

<?php if($store_item->big_pic != ""): ?>
    <div class="ibox">
        <div class="ibox-title">
            <h3>Item Image</h3>
        </div>
        <div class="ibox-content">
            <img src="<?= site_url('/admin/store_items/store_image/' . $store_item->id) ?>" alt="" class="mx-auto d-block img-fluid">
        </div>
    </div>
<?php endif; ?>
<?= $this->endSection() ?>

<?= $this->section('scripts') ?>
<script src="<?= base_url('adminfiles/js/plugins/summernote/summernote-bs4.js') ?>"></script>

<script>
    $(document).ready(function () {

        $('.summernote').summernote();

    });
</script>
<?= $this->endSection() ?>