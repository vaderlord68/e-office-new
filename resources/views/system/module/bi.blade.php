@extends('page.master')
@section('body_content')
    @parent
    <?php
    $folders = [
        [
            "folderId" => "1",
            "folderName" => "Folder 1",
            "folderParent" => "",
        ],
        [
            "folderId" => "2",
            "folderName" => "Folder 2",
            "folderParent" => "1",
        ],
        [
            "folderId" => "3",
            "folderName" => "Folder 3",
            "folderParent" => "",
        ],
        [
            "folderId" => "4",
            "folderName" => "Folder 4",
            "folderParent" => "3",
        ],
        [
            "folderId" => "5",
            "folderName" => "Folder 5",
            "folderParent" => "4",
        ],


    ];

    function prepareFolderStructure($folders)
    {
        $folderStructure = [];
        foreach ($folders as $folder) {
            if ($folder['folderParent'] == "") {
                $folderStructure['parents'][] = $folder;
            } else {
                $folderStructure['children'][] = $folder;
            }
        }
        return $folderStructure;
    }

    //    function
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
                        <h5 class="">Cây thư mục</h5>
                        <div id="folderTree">
                            <?php
                            $folderStructure = prepareFolderStructure($folders);
                            ?>
                            <?php foreach ($folderStructure['parents'] as $parent): ?>
                            <ul>
                                <li><?php echo $parent['folderName'] ?>
                                    <?php foreach ($folderStructure['children'] as $child): ?>
                                    <?php if ($child['folderParent'] == $parent['folderId']) : ?>
                                    <ul>
                                        <li><?php echo $child['folderName']?></li>
                                    </ul>
                                    <?php endif; ?>
                                    <?php endforeach;?>
                                </li>

                            </ul>
                            <?php endforeach; ?>
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
            .table-documentary .table-bordered thead th{
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
