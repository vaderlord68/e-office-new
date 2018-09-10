<div class="card document-content">
    <div class="card-header">
        <button type="button" title="Đăng tập tin" class="btn btn-default  pull-right"><i class="fa fa-upload text-primary mgr5"></i>Đăng tập tin</button>
        <button type="button" title="Tạo thư mục" class="btn btn-default  pull-right mgr5"><i class="fa fa-folder text-warning mgr5"></i>Tạo thư mục</button>
    </div>
    <div class="card-body" style="padding: 5px !important;">
        <?php echo $__env->yieldContent('document-list'); ?>
    </div>
</div>