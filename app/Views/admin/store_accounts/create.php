<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?><?= $page_title ?><?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="ibox">
  <div class="ibox-content">
    <h3><?= $page_title ?></h3>
    <a href="<?= base_url('/admin/store_accounts/manage') ?>" class="btn btn-sm btn-primary">
      Back &nbsp; <i class="fa fa-chevron-circle-right"></i>
    </a>
    <div class="row mt-2">
      <div class="col-md-12">
        <?= form_open('admin/store_accounts/create', array('class' => 'form-horizontal', 'autocomplete' => 'off')) ?>
        
        <div class="form-group  row">
          <label class="col-sm-2 col-form-label text-right">First Name</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="first_name" value="<?= isset($store_accounts->first_name) ? $store_accounts->first_name : '' ?>">
          </div>
        </div>

        <div class="form-group  row">
          <label class="col-sm-2 col-form-label text-right">Last Name</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="last_name" value="<?= isset($store_accounts->last_name) ? $store_accounts->last_name : '' ?>">
          </div>
        </div>

        <div class="form-group  row">
          <label class="col-sm-2 col-form-label text-right">Phone</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="phone" value="<?= isset($store_accounts->phone) ? $store_accounts->phone : '' ?>">
          </div>
        </div>

        <div class="form-group  row">
          <label class="col-sm-2 col-form-label text-right">Address 1</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="address1" value="<?= isset($store_accounts->address1) ? $store_accounts->address1 : '' ?>">
          </div>
        </div>

        <div class="form-group  row">
          <label class="col-sm-2 col-form-label text-right">Address 2</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="address2" value="<?= isset($store_accounts->address2) ? $store_accounts->address2 : '' ?>">
          </div>
        </div>

        <div class="form-group  row">
          <label class="col-sm-2 col-form-label text-right">Town</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="town" value="<?= isset($store_accounts->town) ? $store_accounts->town : '' ?>">
          </div>
        </div>

        <div class="form-group  row">
          <label class="col-sm-2 col-form-label text-right">Country</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="country" value="<?= isset($store_accounts->country) ? $store_accounts->country : '' ?>">
          </div>
        </div>

        <div class="form-group  row">
          <label class="col-sm-2 col-form-label text-right">Postcode</label>
          <div class="col-sm-6">
            <input type="text" class="form-control" name="post_code" value="<?= isset($store_accounts->post_code) ? $store_accounts->post_code : '' ?>">
          </div>
        </div>
        <hr>
        <legend>Authentication Details</legend>
        <div class="form-group  row">
          <label class="col-sm-2 col-form-label text-right">Email</label>
          <div class="col-sm-6">
            <input type="email" class="form-control" name="email" value="<?= isset($store_accounts->email) ? $store_accounts->email : '' ?>">
          </div>
        </div>

        <div class="form-group  row">
          <label class="col-sm-2 col-form-label text-right">Password</label>
          <div class="col-sm-6">
            <input type="password" class="form-control" name="password" value="<?= isset($store_accounts->password) ? $store_accounts->password : '' ?>">
          </div>
        </div>
        <div class="offset-2">
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
