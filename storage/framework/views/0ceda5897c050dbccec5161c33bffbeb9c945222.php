<div class="container-fluid pdl10 pdr10">
    <div class="animated fadeIn">
        <div class="row">
            <div class="col-sm-12 mgb10">
                <?php echo $__env->make("partials.message", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
                <?php echo $__env->make("partials.alert-dismissible", array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>
            </div>
        </div>
        <?php echo $__env->yieldContent('content'); ?>
    </div>
</div>