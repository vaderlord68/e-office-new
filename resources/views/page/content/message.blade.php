<?php
$errorMessage = session('errorMessage');
$successMessage = session('successMessage');
session()->remove('errorMessage');
session()->remove('successMessage');
?>
@if (isset($errorMessage))
    <div class="alert-message-session">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-danger">Error</span><span id="content-message"> {{$errorMessage}}</span>
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>

@endif
@if (isset($successMessage))
    <div class="alert-message-session">
        <div class="row">
            <div class="col-sm-12">
                <div class="alert  alert-success alert-dismissible fade show" role="alert">
                    <span class="badge badge-pill badge-success">Success</span> {{$successMessage}}
                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
            </div>
        </div>
    </div>


@endif