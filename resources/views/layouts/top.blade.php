<header class="app-header navbar">
    <button class="navbar-toggler sidebar-toggler d-lg-none mr-auto" type="button" data-toggle="sidebar-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <a class="navbar-brand" href="#">
        <img class="navbar-brand-full" src="{{asset('img/logo.png')}}" height="32"
             alt="CoreUI Logo">
        <img class="navbar-brand-minimized" src="{{asset('img/logo.png')}}" height="32"
             alt="CoreUI Logo">
    </a>
    @if (Helpers::getDevice() == 'DESKTOP')
        <button class="navbar-toggler sidebar-toggler d-md-down-none" type="button" data-toggle="sidebar-lg-show">
            <span class="navbar-toggler-icon"></span>
        </button>
    @endif

    {{--<div class="top-menu">--}}
    {{--<ul class="nav navbar-nav d-md-down-none">--}}
    {{--<li class="nav-item dropdown">--}}
    {{--<a class="nav-link dropdown-toggle" href="#" id="navbardrop" data-toggle="dropdown">--}}
    {{--Danh mục--}}
    {{--</a>--}}
    {{--<ul class="dropdown-menu">--}}
    {{--<li class="nav-item dropdown-submenu">--}}
    {{--<a href="#" class="nav-link dropdown-toggle has-child" data-toggle="dropdown">Tài chính</a>--}}
    {{--<ul class="dropdown-menu">--}}
    {{--<li class="dropdown-submenu">--}}
    {{--<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Danh mục khối</a>--}}
    {{--</li>--}}
    {{--<li class="dropdown-submenu">--}}
    {{--<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Danh mục phòng ban</a>--}}
    {{--</li>--}}
    {{--<li class="dropdown-submenu">--}}
    {{--<a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown">Danh mục nhóm</a>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</li>--}}

    {{--</ul>--}}
    {{--</li>--}}
    {{--</ul>--}}
    {{--</div>--}}

    {!! Helpers::createMainMenu() !!}


    <ul class="nav navbar-nav ml-auto">
        <li class="nav-item dropdown d-md-down-none">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                <i class="icon-envelope-letter"></i>
                <span class="badge badge-pill badge-info">7</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                <div class="dropdown-header text-center">
                    <strong>You have 4 messages</strong>
                </div>
                <a class="dropdown-item" href="#">
                    <div class="message">
                        <div class="py-3 mr-3 float-left">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('img/avatars/7.jpg')}}" alt="admin@bootstrapmaster.com">
                                <span class="avatar-status badge-success"></span>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">John Doe</small>
                            <small class="text-muted float-right mt-1">Just now</small>
                        </div>
                        <div class="text-truncate font-weight-bold">
                            <span class="fa fa-exclamation text-danger"></span> Important message
                        </div>
                        <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit, sed do eiusmod tempor incididunt...
                        </div>
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <div class="message">
                        <div class="py-3 mr-3 float-left">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('img/avatars/6.jpg')}}" alt="admin@bootstrapmaster.com">
                                <span class="avatar-status badge-warning"></span>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">John Doe</small>
                            <small class="text-muted float-right mt-1">5 minutes ago</small>
                        </div>
                        <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                        <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit, sed do eiusmod tempor incididunt...
                        </div>
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <div class="message">
                        <div class="py-3 mr-3 float-left">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('img/avatars/5.jpg')}}" alt="admin@bootstrapmaster.com">
                                <span class="avatar-status badge-danger"></span>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">John Doe</small>
                            <small class="text-muted float-right mt-1">1:52 PM</small>
                        </div>
                        <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                        <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit, sed do eiusmod tempor incididunt...
                        </div>
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <div class="message">
                        <div class="py-3 mr-3 float-left">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('img/avatars/4.jpg')}}" alt="admin@bootstrapmaster.com">
                                <span class="avatar-status badge-info"></span>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">John Doe</small>
                            <small class="text-muted float-right mt-1">4:03 PM</small>
                        </div>
                        <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                        <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit, sed do eiusmod tempor incididunt...
                        </div>
                    </div>
                </a>
                <a class="dropdown-item text-center" href="#">
                    <strong>View all messages</strong>
                </a>
            </div>
        </li>
        <li class="nav-item d-md-down-none">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                <i class="icon-bell"></i>
                <span class="badge badge-pill badge-danger">5</span>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                <div class="dropdown-header text-center">
                    <strong>You have 4 messages</strong>
                </div>
                <a class="dropdown-item" href="#">
                    <div class="message">
                        <div class="py-3 mr-3 float-left">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('img/avatars/7.jpg')}}" alt="admin@bootstrapmaster.com">
                                <span class="avatar-status badge-success"></span>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">John Doe</small>
                            <small class="text-muted float-right mt-1">Just now</small>
                        </div>
                        <div class="text-truncate font-weight-bold">
                            <span class="fa fa-exclamation text-danger"></span> Important message
                        </div>
                        <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit, sed do eiusmod tempor incididunt...
                        </div>
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <div class="message">
                        <div class="py-3 mr-3 float-left">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('img/avatars/6.jpg')}}" alt="admin@bootstrapmaster.com">
                                <span class="avatar-status badge-warning"></span>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">John Doe</small>
                            <small class="text-muted float-right mt-1">5 minutes ago</small>
                        </div>
                        <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                        <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit, sed do eiusmod tempor incididunt...
                        </div>
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <div class="message">
                        <div class="py-3 mr-3 float-left">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('img/avatars/5.jpg')}}" alt="admin@bootstrapmaster.com">
                                <span class="avatar-status badge-danger"></span>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">John Doe</small>
                            <small class="text-muted float-right mt-1">1:52 PM</small>
                        </div>
                        <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                        <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit, sed do eiusmod tempor incididunt...
                        </div>
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <div class="message">
                        <div class="py-3 mr-3 float-left">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('img/avatars/4.jpg')}}" alt="admin@bootstrapmaster.com">
                                <span class="avatar-status badge-info"></span>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">John Doe</small>
                            <small class="text-muted float-right mt-1">4:03 PM</small>
                        </div>
                        <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                        <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit, sed do eiusmod tempor incididunt...
                        </div>
                    </div>
                </a>
                <a class="dropdown-item text-center" href="#">
                    <strong>View all messages</strong>
                </a>
            </div>
        </li>
        <li class="nav-item d-md-down-none">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                <i class="icon-list"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                <div class="dropdown-header text-center">
                    <strong>You have 4 messages</strong>
                </div>
                <a class="dropdown-item" href="#">
                    <div class="message">
                        <div class="py-3 mr-3 float-left">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('img/avatars/7.jpg')}}" alt="admin@bootstrapmaster.com">
                                <span class="avatar-status badge-success"></span>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">John Doe</small>
                            <small class="text-muted float-right mt-1">Just now</small>
                        </div>
                        <div class="text-truncate font-weight-bold">
                            <span class="fa fa-exclamation text-danger"></span> Important message
                        </div>
                        <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit, sed do eiusmod tempor incididunt...
                        </div>
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <div class="message">
                        <div class="py-3 mr-3 float-left">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('img/avatars/6.jpg')}}" alt="admin@bootstrapmaster.com">
                                <span class="avatar-status badge-warning"></span>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">John Doe</small>
                            <small class="text-muted float-right mt-1">5 minutes ago</small>
                        </div>
                        <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                        <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit, sed do eiusmod tempor incididunt...
                        </div>
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <div class="message">
                        <div class="py-3 mr-3 float-left">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('img/avatars/5.jpg')}}" alt="admin@bootstrapmaster.com">
                                <span class="avatar-status badge-danger"></span>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">John Doe</small>
                            <small class="text-muted float-right mt-1">1:52 PM</small>
                        </div>
                        <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                        <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit, sed do eiusmod tempor incididunt...
                        </div>
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <div class="message">
                        <div class="py-3 mr-3 float-left">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('img/avatars/4.jpg')}}" alt="admin@bootstrapmaster.com">
                                <span class="avatar-status badge-info"></span>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">John Doe</small>
                            <small class="text-muted float-right mt-1">4:03 PM</small>
                        </div>
                        <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                        <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit, sed do eiusmod tempor incididunt...
                        </div>
                    </div>
                </a>
                <a class="dropdown-item text-center" href="#">
                    <strong>View all messages</strong>
                </a>
            </div>
        </li>
        <li class="nav-item d-md-down-none">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="true">
                <i class="icon-location-pin"></i>
            </a>
            <div class="dropdown-menu dropdown-menu-right dropdown-menu-lg">
                <div class="dropdown-header text-center">
                    <strong>You have 4 messages</strong>
                </div>
                <a class="dropdown-item" href="#">
                    <div class="message">
                        <div class="py-3 mr-3 float-left">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('img/avatars/7.jpg')}}" alt="admin@bootstrapmaster.com">
                                <span class="avatar-status badge-success"></span>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">John Doe</small>
                            <small class="text-muted float-right mt-1">Just now</small>
                        </div>
                        <div class="text-truncate font-weight-bold">
                            <span class="fa fa-exclamation text-danger"></span> Important message
                        </div>
                        <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit, sed do eiusmod tempor incididunt...
                        </div>
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <div class="message">
                        <div class="py-3 mr-3 float-left">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('img/avatars/6.jpg')}}" alt="admin@bootstrapmaster.com">
                                <span class="avatar-status badge-warning"></span>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">John Doe</small>
                            <small class="text-muted float-right mt-1">5 minutes ago</small>
                        </div>
                        <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                        <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit, sed do eiusmod tempor incididunt...
                        </div>
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <div class="message">
                        <div class="py-3 mr-3 float-left">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('img/avatars/5.jpg')}}" alt="admin@bootstrapmaster.com">
                                <span class="avatar-status badge-danger"></span>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">John Doe</small>
                            <small class="text-muted float-right mt-1">1:52 PM</small>
                        </div>
                        <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                        <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit, sed do eiusmod tempor incididunt...
                        </div>
                    </div>
                </a>
                <a class="dropdown-item" href="#">
                    <div class="message">
                        <div class="py-3 mr-3 float-left">
                            <div class="avatar">
                                <img class="img-avatar" src="{{asset('img/avatars/4.jpg')}}" alt="admin@bootstrapmaster.com">
                                <span class="avatar-status badge-info"></span>
                            </div>
                        </div>
                        <div>
                            <small class="text-muted">John Doe</small>
                            <small class="text-muted float-right mt-1">4:03 PM</small>
                        </div>
                        <div class="text-truncate font-weight-bold">Lorem ipsum dolor sit amet</div>
                        <div class="small text-muted text-truncate">Lorem ipsum dolor sit amet, consectetur adipisicing
                            elit, sed do eiusmod tempor incididunt...
                        </div>
                    </div>
                </a>
                <a class="dropdown-item text-center" href="#">
                    <strong>View all messages</strong>
                </a>
            </div>
        </li>
        <li class="nav-item dropdown">
            <a class="nav-link" data-toggle="dropdown" href="#" role="button" aria-haspopup="true"
               aria-expanded="false">
                <img class="img-avatar" src="{{asset('img/avatars/6.jpg')}}" alt="admin@bootstrapmaster.com">
            </a>
            <div class="dropdown-menu dropdown-menu-right">
                <div class="dropdown-header text-center">
                    <strong>Account</strong>
                </div>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-bell-o"></i> Updates
                    <span class="badge badge-info">42</span>
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-envelope-o"></i> Messages
                    <span class="badge badge-success">42</span>
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-tasks"></i> Tasks
                    <span class="badge badge-danger">42</span>
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-comments"></i> Comments
                    <span class="badge badge-warning">42</span>
                </a>
                <div class="dropdown-header text-center">
                    <strong>Settings</strong>
                </div>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-user"></i> Profile</a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-wrench"></i> Settings</a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-usd"></i> Payments
                    <span class="badge badge-secondary">42</span>
                </a>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-file"></i> Projects
                    <span class="badge badge-primary">42</span>
                </a>
                <div class="divider"></div>
                <a class="dropdown-item" href="#">
                    <i class="fa fa-shield"></i> Lock Account</a>
                <a class="dropdown-item" href="{{url('/logout/post')}}">
                    <i class="fa fa-lock"></i> Logout</a>
            </div>
        </li>
    </ul>
    <button class="navbar-toggler aside-menu-toggler d-md-down-none" type="button" data-toggle="aside-menu-lg-show">
        <span class="navbar-toggler-icon"></span>
    </button>
    <button class="navbar-toggler aside-menu-toggler d-lg-none" type="button" data-toggle="aside-menu-show">
        <span class="navbar-toggler-icon"></span>
    </button>
</header>

<style>
    .top-menu .dropdown > .dropdown-menu{
        white-space: nowrap;
        margin: 0px;
        border: 1px solid #f5ebce !important;
        padding: 0px !important;
    }
    .top-menu .dropdown:hover > .dropdown-menu {
        display: block !important;
        -webkit-animation: slide-down .3s ease-out;
        -moz-animation: slide-down .3s ease-out;
        margin: 0px;

        white-space: nowrap;
    }

    .top-menu .dropdown-submenu {
        position: relative !important;
        padding: 0px 0px 0px 0px;
        color: #333 !important;
        width: 100%;
    }

    .top-menu .dropdown-submenu > .dropdown-menu {
        top: 0px !important;
        left: 100% !important;
        margin-top: 0px !important;
        margin-left: 0px !important;
        -webkit-border-radius: 6px 6px 6px 6px !important;
        -moz-border-radius: 6px 6px 6px !important;
        color: #333 !important;
        border: none !important;
        white-space: nowrap;
    }

    .top-menu a.dropdown-toggle {
        color: #333;
    }

    .top-menu a.dropdown-toggle:hover {
        color: #000;
        text-decoration: none;
    }

    .dropdown-submenu:hover > .dropdown-menu {
        display: table !important;
    }

    .top-menu .dropdown-submenu > a{
        display: table;
    }
    .top-menu .dropdown-submenu > a:after {
        display: inline-flex !important;
        content: "" !important;
        float: right !important;
        width: 0px !important;
        height: 0px !important;
        border-color: transparent !important;
        border-style: solid !important;
        border-width: 5px 0 5px 5px !important;
        border-left-color: #000 !important;
        margin-top: 5px !important;
        margin-left: 0.255em;
        vertical-align: 0.255em;
        border-top: 0.3em solid;
        border-right: 0.3em solid transparent;
        border-bottom: 0;
        border-left: 0.3em solid transparent;
        z-index: 999;
    }

    .top-menu .no-submenu > a:after {
        display: none !important;

    }

    .top-menu .dropdown-submenu.pull-left > .dropdown-menu {
        left: -100% !important;
        margin-left: 10px !important;
        -webkit-border-radius: 6px 0 6px 6px !important;
        -moz-border-radius: 6px 0 6px 6px !important;
        border-radius: 6px 0 6px 6px !important;
    }

    .top-menu a {
        font-size: 12px !important;
        font-weight: bold;
    }

    .top-menu .nav-link {
        padding: 5px 10px !important;
        text-align: left;
        /*background-color: #ffc13f !important;*/
        border-radius: 1px;
        margin: 0px 2px;
        width: 98%;
        color: #333;
        text-transform: capitalize;
    }

    .top-menu .nav-link:hover {

        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#fefcea+0,efde6b+100 */
        background: #fefcea; /* Old browsers */
        background: -moz-linear-gradient(top, #fefcea 0%, #efde6b 100%); /* FF3.6-15 */
        background: -webkit-linear-gradient(top, #fefcea 0%,#efde6b 100%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(to bottom, #fefcea 0%,#efde6b 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fefcea', endColorstr='#efde6b',GradientType=0 ); /* IE6-9 */

    }

    @-webkit-keyframes slide-down {
        0% { opacity: 0; -webkit-transform: translateY(-100%); }
        100% { opacity: 1; -webkit-transform: translateY(0); }
    }
    @-moz-keyframes slide-down {
        0% { opacity: 0; -moz-transform: translateY(-100%); }
        100% { opacity: 1; -moz-transform: translateY(0); }
    }

    .breadcrumb{
        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#ffffff+0,e1e1e1+16,e1e1e1+16,f1f1f1+50,f6f6f6+100 */
        background: rgb(255,255,255); /* Old browsers */
        background: -moz-linear-gradient(45deg, rgba(255,255,255,1) 0%, rgba(225,225,225,1) 16%, rgba(225,225,225,1) 16%, rgba(241,241,241,1) 50%, rgba(246,246,246,1) 100%); /* FF3.6-15 */
        background: -webkit-linear-gradient(45deg, rgba(255,255,255,1) 0%,rgba(225,225,225,1) 16%,rgba(225,225,225,1) 16%,rgba(241,241,241,1) 50%,rgba(246,246,246,1) 100%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(45deg, rgba(255,255,255,1) 0%,rgba(225,225,225,1) 16%,rgba(225,225,225,1) 16%,rgba(241,241,241,1) 50%,rgba(246,246,246,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#ffffff', endColorstr='#f6f6f6',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */


        /*!* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#161616+0,000000+100&0.65+0,0+100 *!*/
        /*background: -moz-linear-gradient(45deg, rgba(22,22,22,0.65) 0%, rgba(0,0,0,0) 100%); !* FF3.6-15 *!*/
        /*background: -webkit-linear-gradient(45deg, rgba(22,22,22,0.65) 0%,rgba(0,0,0,0) 100%); !* Chrome10-25,Safari5.1-6 *!*/
        /*background: linear-gradient(45deg, rgba(22,22,22,0.65) 0%,rgba(0,0,0,0) 100%); !* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ *!*/
        /*filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#a6161616', endColorstr='#00000000',GradientType=1 ); !* IE6-9 fallback on horizontal gradient *!*/
    }

    .app-header{
        /*background: rgb(252,234,187); !* Old browsers *!*/
        /*background: -moz-linear-gradient(45deg, rgba(252,234,187,1) 0%, rgba(252,205,77,1) 65%, rgba(252,205,77,1) 65%, rgba(252,205,77,1) 65%, rgba(252,205,77,1) 65%, rgba(252,205,77,1) 69%, rgba(248,181,0,1) 69%, rgba(251,223,147,1) 100%); !* FF3.6-15 *!*/
        /*background: -webkit-linear-gradient(45deg, rgba(252,234,187,1) 0%,rgba(252,205,77,1) 65%,rgba(252,205,77,1) 65%,rgba(252,205,77,1) 65%,rgba(252,205,77,1) 65%,rgba(252,205,77,1) 69%,rgba(248,181,0,1) 69%,rgba(251,223,147,1) 100%); !* Chrome10-25,Safari5.1-6 *!*/
        /*background: linear-gradient(45deg, rgba(252,234,187,1) 0%,rgba(252,205,77,1) 65%,rgba(252,205,77,1) 65%,rgba(252,205,77,1) 65%,rgba(252,205,77,1) 65%,rgba(252,205,77,1) 69%,rgba(248,181,0,1) 69%,rgba(251,223,147,1) 100%); !* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ *!*/
        /*filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#fceabb', endColorstr='#fbdf93',GradientType=1 ); !* IE6-9 fallback on horizontal gradient *!*/
        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#e0f3fa+0,d8f0fc+50,b8e2f6+51,b6dffd+100;Shape+2+Style */
        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#e0f3fa+0,d8f0fc+77,d8f0fc+77,b8e2f6+78,b6dffd+100 */
        /* Permalink - use to edit and share this gradient: http://colorzilla.com/gradient-editor/#e0f3fa+0,b8e2f6+71,b8e2f6+71,b8e2f6+73,d8f0fc+77,d8f0fc+78,d8f0fc+78,d8f0fc+79,d8f0fc+79,b6dffd+100 */
        background: #e0f3fa; /* Old browsers */
        background: -moz-linear-gradient(45deg, #e0f3fa 0%, #b8e2f6 71%, #b8e2f6 71%, #b8e2f6 73%, #d8f0fc 77%, #d8f0fc 78%, #d8f0fc 78%, #d8f0fc 79%, #d8f0fc 79%, #b6dffd 100%); /* FF3.6-15 */
        background: -webkit-linear-gradient(45deg, #e0f3fa 0%,#b8e2f6 71%,#b8e2f6 71%,#b8e2f6 73%,#d8f0fc 77%,#d8f0fc 78%,#d8f0fc 78%,#d8f0fc 79%,#d8f0fc 79%,#b6dffd 100%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(45deg, #e0f3fa 0%,#b8e2f6 71%,#b8e2f6 71%,#b8e2f6 73%,#d8f0fc 77%,#d8f0fc 78%,#d8f0fc 78%,#d8f0fc 79%,#d8f0fc 79%,#b6dffd 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e0f3fa', endColorstr='#b6dffd',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
    }

    .dropdown-item{
        font-size: 11px !important;
        border-bottom: 1px solid #FCEABB !important;
    }

    body{
        overflow-y: scroll;
    }
</style>
