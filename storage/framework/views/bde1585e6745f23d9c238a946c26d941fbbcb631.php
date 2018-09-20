<?php $__env->startSection('content'); ?>
    <div class="row justify-content-center">
        <div class="col-md-4">
            <div class="card-group">
                <div class="card p-4 form-login">
                    <div class="card-body">
                        <h1 class="hide" style="font-size: 300% !important;">
                            <span class="text-red">e</span>
                            <span class="text-primary">OFFCIE</span></h1>
                        <p class="text-muted hide">Sign In to your website</p>
                        <div style="text-align: center;width: 100%">
                            <img src="<?php echo e(asset('img/logo.png')); ?>" alt="">
                        </div>

                        <?php
                        $errorMessage = session('errorMessage');
                        $successMessage = session('successMessage');
                        session()->remove('errorMessage');
                        session()->remove('successMessage');
                        ?>
                        <?php if(isset($errorMessage)): ?>
                            <div class="col-sm-12">
                                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                                    <span class="badge badge-pill badge-danger">Error</span> <?php echo e($errorMessage); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        <?php endif; ?>
                        <?php if(isset($successMessage)): ?>
                            <div class="col-sm-12">
                                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                                    <span class="badge badge-pill badge-success">Success</span> <?php echo e($successMessage); ?>

                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            </div>
                        <?php endif; ?>
                        <form class="login-form" method="post" action="/login/post">
                            <div class="input-group mb-3">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="icon-user"></i>
                                </span>
                                </div>
                                <input class="form-control" name="UserName" type="text" placeholder="Tên đăng nhập" autofocus autocomplete="off">
                            </div>
                            <div class="input-group mb-4">
                                <div class="input-group-prepend">
                                <span class="input-group-text">
                                  <i class="icon-lock"></i>
                                </span>
                                </div>
                                <input class="form-control" type="password" name="UserPassword" placeholder="Mật khẩu" autocomplete="off">
                            </div>
                            <div class="row">
                                <div class="col-12">
                                    <button id="btnLogin" class="btn btn-primary px-4" type="submit">Login</button>
                                </div>
                            </div>
                            <input type="hidden" name="_token" value="<?php echo e(csrf_token()); ?>">
                        </form>
                        <div style="text-align: center;width: 100%">
                            <img src="<?php echo e(asset('img/icon-footer.png')); ?>" alt="">
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
<?php $__env->stopSection(); ?>
<style>
    .form-login {
        border-radius: 8px !important;
        background: transparent !important;
        border: none !important;
        background: transparent 50%;
    }

    .form-login #btnLogin{
        border-radius: 8px !important;
        background: #ffe724;
        border: 1px solid #ededed;
        text-transform: uppercase;
        text-align: center;
        width: 100%;
        color: #000;
        font-weight: bold;
    }
    body{
        background-image: url('img/background.png');
        background-position: left top;
        background-repeat: no-repeat;
        background-size: calc(100%) calc(100%);
        position: relative;
        top: 0px;
        display: table;
        width: 100%;
    }
    .form-login{
        background-image: url('img/login-background.png') !important;
        background-position: left top !important;
        background-repeat: no-repeat !important;
        background-size: calc(100%) calc(100%) !important;
        position: relative !important;
        top: 0px !important;
        display: table !important;
        width: 100% !important;
        box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.2), 0px 4px 4px 0px rgba(0, 0, 0, 0.2) inset;
        height: calc(82%) !important;

    }
    .form-login form{
        margin-top: 40px;
    }
</style>

<?php echo $__env->make('layouts.login-layout', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>