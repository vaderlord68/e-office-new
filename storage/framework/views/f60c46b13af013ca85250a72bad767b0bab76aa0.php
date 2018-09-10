<?php $__env->startSection("folderView"); ?>
    ##parent-placeholder-9f3e12f98d9ee531c43b3db281a9fcf165eca90f##
    <form id="#createFolderForm" action="/bi/folder/create/execute" method="post">
        <div class="form-group">
            <label for="usr">Tên thư mục</label>
            <input required type="text" name="FolderName" class="form-control" id="folderName">
        </div>
        <div class="form-group">
            <label for="usr">Mô tả thư mục</label>
            <textarea required type="text" name="FolderDescription" class="form-control "
                      id="folderDescription"></textarea>
        </div>
        <div class="form-group">
            <button class="btn-primary btn">Tạo thư mục</button>
        </div>
        <input type="hidden" name="FolderParentID" value="<?php echo $FolderParentID ?>">
        <input type="hidden" name="CreateUserID" value="<?php echo $CreateUserID ?>">
        <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
    </form>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('system.module.bi', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>