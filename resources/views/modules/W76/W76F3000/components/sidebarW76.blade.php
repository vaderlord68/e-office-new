<!-- A vertical navbar -->
<div class="">
    <nav class="navbar bg-light">
        <a class="nav-link" href="#" style="margin-left: -15px !important">{{Helpers::getRS("QUAN_TRI_HE_THONG_U")}}</a>
        <ul class="navbar-nav">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fas fa-users pdr10"></i>{{Helpers::getRS("Quan_ly_tai_khoan")}}
                </a>
                {{--<div class="dropdown-menu">--}}
                    <a class="dropdown-item" href="{{url('/W76F3000/TaskList')}}"><i
                                class="fas fa-user"></i>{{Helpers::getRS("Tai_khoan")}}</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-suitcase"></i>{{Helpers::getRS("Vai_tro")}}</a>
                {{--</div>--}}
            </li>
        </ul>
    </nav>
</div>

<script>

</script>

<style>
    .task-section .dropdown {
        border: none !important;
        border-bottom: 1px solid #cccccc;
    }

    .task-section .navbar-nav {
        width: 100% !important;
    }

    .task-section .dropdown-item {
        border: none !important;
    }

    .task-section .dropdown-menu {
        border: none !important;
        box-shadow: none;
        -webkit-box-shadow: none !important;
    }

    .dropdown-menu {
        background-color: #F0F3F5;
    }

    .dropdown-menu:hover {
        background-color: #F0F3F5;
    }

</style>



