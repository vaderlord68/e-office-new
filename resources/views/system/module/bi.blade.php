@extends('page.master')
@section('body_content')
    @parent
    <div class="module-bi">
        <div class="row">
            <div class="folder-sidebar col-sm-3">
                <div class="card">
                    <div class="card-header">
                        <i class="custom-jtree-icon"></i>
                        <strong class="card-title">Quản lý thư mục</strong>
                    </div>
                    <div class="card-body">
                        <h5 class="">Cây thư mục</h5>
                        <div id="folderTree">
                            <ul>
                                <li>Folder
                                    <ul>
                                        <li>Folder child</li>
                                        <li>Folder child</li>
                                        <li>Folder child</li>
                                        <li>Folder child</li>
                                        <li>Folder child</li>
                                        <li>Folder child
                                            <ul>
                                                <li>Folder child 2</li>
                                                <li>Folder child 2</li>
                                                <li>Folder child 2</li>
                                                <li>Folder child 2</li>
                                                <li>Folder child 2</li>
                                            </ul>
                                        </li>
                                    </ul>
                                </li>
                            </ul>
                            {{--{!!html_entity_decode($folderTree)!!}--}}

                        </div>
                    </div>
                </div>

            </div>
            <div class="folder-content col-sm-9">
                @section("folderView")
                    @include("system.module.bi.folderView")
                @show
            </div>
        </div>

        <script>
            $(document).ready(function () {
                $('#folderTree').jstree({
                    'core': {
                        'multiple': false,
                    }
                });
                $('#folderTree')
                // listen for event
                    .on('changed.jstree', function (e, data) {
                        var selectedFolderId = data.node.li_attr.folder_id;
                        console.log("Selected Folder Id: " + selectedFolderId);
                    })
                    .jstree();
            });
        </script>
        @stop
        <style>
            .module-bi.container {
                height: 100%;
            }

            .module-bi .row {
                height: auto;
            }

            .module-bi .folder-sidebar {
                height: 100%;
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
                background-color: #a8abad;
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
                .module-bi .folder-sidebar, .module-bi .folder-content {
                    height: auto;
                    flex: 0 0 100%;
                    max-width: 100%;
                }

                .folder-sidebar .card .card-header strong {
                    display: inline-block !important;
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
        </style>
    </div>