@extends('page.master')
@section('custom_head')
    @include('page.head_custom')
@stop
@section('content_top')
    @parent
@stop
@section('content_body')
    @parent
    <?php
    $errorMessage = session('errorMessage');
    $successMessage = session('successMessage');
    session()->remove('errorMessage');
    session()->remove('successMessage');
    ?>
    @if (isset($errorMessage))
        <div class="col-sm-12">
            <div class="alert  alert-danger alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-danger">Error</span> {{$errorMessage}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    @if (isset($successMessage))
        <div class="col-sm-12">
            <div class="alert  alert-success alert-dismissible fade show" role="alert">
                <span class="badge badge-pill badge-success">Success</span> {{$successMessage}}
                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
        </div>
    @endif
    <div id="prototype-screen-image-2"></div>
@stop