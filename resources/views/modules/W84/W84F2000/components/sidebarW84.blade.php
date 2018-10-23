<!-- A vertical navbar -->
<div class="">
    <nav class="navbar bg-light">
        <a class="nav-link" href="#">{{Helpers::getRS("Ho_so_cong_viec")}}</a>
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link " href="{{url('/W84F2000/')}}" id="navbardrop" >
                    <i class="fas fa-tasks pdr10"></i>{{Helpers::getRS("Dự án")}}
                </a>
            </li>

            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">
                    <i class="fas fa-tasks pdr10"></i>{{Helpers::getRS("Cong_viec")}}
                </a>
                <div class="dropdown-menu">
                    <a class="dropdown-item" href="{{url('/W84F1000/TaskList')}}"><i
                                class="fas fa-cog"></i>{{Helpers::getRS("Xu_ly")}}</a>
                    <a class="dropdown-item" href="#"><i class="fas fa-eye"></i>{{Helpers::getRS("Theo_doi")}}</a>
                </div>
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



