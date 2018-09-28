<ol class="breadcrumb">

    <?php
    $title = isset($title) ? $title : "Trang chủ";
    ?>
    <li class="breadcrumb-item text-primary"><strong>{{$title}}</strong></li>
    <li class="breadcrumb-item">
        <a href="#">Admin</a>
    </li>
    <li class="breadcrumb-item active hide">Dashboard</li>
    <!-- Breadcrumb Menu-->
    <li class="breadcrumb-menu d-md-down-none">
        <div class="btn-group" role="group" aria-label="Button group">
            @yield('toolbar')


            <a class="btn hide" href="#">
                <i class="icon-speech"></i>
            </a>
            <a class="btn hide" href="./">
                <i class="icon-graph"></i>  Chuyển tiếp</a>
            <a class="btn hide" href="#">
                <i class="icon-settings"></i>  Chia sẽ</a>
        </div>
    </li>
</ol>