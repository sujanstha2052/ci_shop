<?= $this->extend('layouts/admin') ?>
<?= $this->section('title') ?><?= (isset($page_title) ? $page_title : '') ?><?= $this->endSection() ?>
<?= $this->section('content') ?>

<div class="ibox">
    <div class="ibox-content">
        <h3><?= (isset($page_title) ? $page_title : '') ?></h3>
        <a href="<?= base_url('/admin/store_accounts/create') ?>" class="btn btn-sm btn-primary">
            <i class="fa fa-plus-circle"></i> &nbsp; Add Store Account
        </a>
        <div class="row mt-2">
            <div class="col-md-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th class="w-50 ac">#</th>
                                <th class="ac">Item Title</th>
                                <th class="ac">Price</th>
                                <th class="ac">Was Price</th>
                                <th class="ac">Status</th>
                                <th class="w-250 ac">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php if (isset($store_items)): ?>
                                <?php foreach ($store_items as $row): ?>
                                    <tr>
                                        <td class="ac">
                                            <?= $row->id ?>
                                        </td>
                                        <td>
                                            <?= $row->item_title ?>
                                        </td>
                                        <td class="ar">
                                            <?= $row->item_price ?>
                                        </td>
                                        <td class="ar">
                                            <?= $row->was_price ?>
                                        </td>
                                        <td class="ac">
                                            <label class="label label-<?= getStatus($row->status) ?>">
                                                <?= ucfirst($row->status) ?>
                                            </label>
                                        </td>
                                        <td class="ac">
                                            <a href="<?= base_url('/admin/store_items/edit/' . $row->id) ?>"
                                               class="btn btn-primary btn-xs">
                                               <i class="fa fa-edit"></i>
                                           </a>
                                       </td>
                                   </tr>
                               <?php endforeach; ?>
                           <?php endif; ?>
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