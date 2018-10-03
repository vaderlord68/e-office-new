<?php
$errorMessage = session('errorMessage');
$successMessage = session('successMessage');
session()->remove('errorMessage');
session()->remove('successMessage');
?>
<?php if(isset($errorMessage)): ?>
    <div class="">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-danger">Error</span><span id="content-message"> <?php echo e($errorMessage); ?></span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

<?php endif; ?>
<?php if(isset($successMessage)): ?>
    <div class="">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> <?php echo e($successMessage); ?>

                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>


<?php endif; ?>