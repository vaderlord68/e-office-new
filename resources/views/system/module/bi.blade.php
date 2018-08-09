@extends('page.master')
@section('body_content')
    @parent
    <?php
    if (session("previousUrl")) {
        $previousUrl = session("previousUrl");
        echo "
<script>
var previousUrl = '$previousUrl';
</script>
";
        session()->remove("previousRequest");
        session()->remove("previousUrl");
    }
    ?>
    <div class="module-bi">
        <div class="row">
            <div class="folder-sidebar col-sm-3">
                <div class="card">
                    <div class="card-header">
                        <i class="custom-jtree-icon"></i>
                        <strong class="card-title">Quản lý thư mục</strong>
                    </div>
                    <div class="card-body">
                        <h5 class="">Tài liệu ưa thích</h5>
                        <div id="folderTree">
                            {{--<ul>--}}
                            {{--<li>Folder--}}
                            {{--<ul>--}}
                            {{--<li>Folder child</li>--}}
                            {{--<li>Folder child</li>--}}
                            {{--<li>Folder child</li>--}}
                            {{--<li>Folder child</li>--}}
                            {{--<li>Folder child</li>--}}
                            {{--<li>Folder child--}}
                            {{--<ul>--}}
                            {{--<li>Folder child 2</li>--}}
                            {{--<li>Folder child 2</li>--}}
                            {{--<li>Folder child 2</li>--}}
                            {{--<li>Folder child 2</li>--}}
                            {{--<li>Folder child 2</li>--}}
                            {{--</ul>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                            {!!html_entity_decode($folderTree)!!}

                        </div>
                    </div>
                </div>

            </div>
            <div class="folder-content col-sm-9">
                @section("folderView")
                    {{--@include("system.module.bi.folderView")--}}
                @show
            </div>
        </div>
        @stop
        <style>
            .module-bi {
                height: 100%;
            }
            .module-bi .folder-content thead th {
                font-size: 12px;
            }
            .module-bi .folder-content .bi-table-item:hover {
                cursor: pointer;
            }
            .module-bi .folder-content .bi-table-item td {
                font-size: 12px;
            }
            .module-bi .row {
                height: auto;
            }

            .module-bi .folder-sidebar {
                height: 100%;
            }
            .module-bi .folder-sidebar .card {
                border-radius: 5px;
                height: 600px;
            }
            .module-bi .folder-content .card {
                border-radius: 5px;
                height: 600px;
            }
            .module-bi .folder-content {
                height: 100%;
            }

            .custom-jtree-icon, .custom-plus-icon {
                display: inline-block;
                vertical-align: middle;
                width: 23px;
                height: 23px;
                line-height: 22px;
            }

            .custom-jtree-icon {
                margin-right: 5px;
                margin-top: -5px;
                background-position: -260px -4px;
                background-image: url('http://www.eoffice.local/jstree/dist/themes/default/32px.png');
            }

            .custom-plus-icon {
                float: right;
                border-radius: 50%;
                font-style: normal;
                background-color: green;
                text-align: center;
                color: white !important;
                font-weight: 900;
                box-shadow: 0 0 2px greenyellow;
            }

            .table-documentary .table-bordered thead th {
                text-align: center;
                background-color: #68a4c8 !important;
                vertical-align: middle;
            }

            .left-table-header .action-on-header {
                display: inline-block;
                padding: 0 10px;
            }

            .right-table-header input.searh-form {
                box-sizing: border-box;
            }

            .right-table-header {
                float: right;
            }

            .left-table-header {
                float: left;
            }

            @media screen and (max-width: 1220px) {
                .folder-sidebar .card .card-header strong {
                    display: inline-block !important;
                }
            }

            @media screen and (max-width: 1100px) {
                .module-bi .folder-sidebar, .module-bi .folder-content {
                    height: auto;
                    flex: 0 0 100%;
                    max-width: 100%;
                }

                .module-bi .folder-sidebar {
                    order: 0;
                }
            }

            @media screen and (max-width: 575.99px) {
                .right-panel .content #bootstrap-data-table_wrapper .table td,
                .right-panel .content #bootstrap-data-table_wrapper .table th {
                    padding: 0 !important;
                    font-size: 0.6em;
                    line-height: 1;
                }

                .left-table-header a {
                    padding: 0 0.3em !important;
                    font-size: 0.65em;
                }

                .right-table-header input.searh-form {
                    max-width: 70px;
                }
            }

            @media screen and (min-width: 1101px) {
                .folder-sidebar .card-body {
                    height: 80%;
                    overflow: scroll;
                }

                .folder-content .card-body {
                    height: 80%;
                }
            }
        </style>
    </div>