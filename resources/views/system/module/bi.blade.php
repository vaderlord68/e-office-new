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
                        <strong class="card-title">Thuộc chuyên mục</strong>
                        <a class="custom-plus-icon">+</a>
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

                            {{--<ul>--}}
                            {{--<li class="folderItem" folder_id='999999'>Folder root--}}
                            {{--<ul>--}}
                            {{--<li class="folderItem" folder_id='123456'>Folder child</li>--}}
                            {{--<li class="folderItem" folder_id='111111'>Folder child</li>--}}
                            {{--<li class="folderItem" folder_id='222222'>Folder child</li>--}}
                            {{--</ul>--}}
                            {{--</li>--}}
                            {{--</ul>--}}
                        </div>
                    </div>
                </div>

            </div>
            <div class="folder-content col-sm-9">
                <div class="card">
                    <div class="card-header">
                        <div class="left-table-header">
                            <a class="action-on-header" href="#">Thêm mới</a>
                            <a class="action-on-header" href="#">Mở</a>
                            <a class="action-on-header" href="#">Sửa</a>
                            <a class="action-on-header" href="#">Xóa</a>
                        </div>
                        <div class="right-table-header">
                            <input type="search" class="form-control form-control-sm searh-form" placeholder="Nhập từ khóa để tìm kiếm" aria-controls="bootstrap-data-table">
                        </div>
                    </div>
                    <div class="card-body">
                        <div id="bootstrap-data-table_wrapper"
                             class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer table-documentary">
                            <div class="row">
                                <div class="col-sm-12">
                                    <table id="bootstrap-data-table"
                                           class="table table-striped table-bordered dataTable no-footer" role="grid"
                                           aria-describedby="bootstrap-data-table_info">
                                        <thead>
                                        <tr role="row">
                                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                rowspan="1" colspan="1" aria-label="Name: activate to sort column ascending"
                                                style="width: 20%">Tên tài liệu
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                rowspan="1" colspan="1"
                                                style="width: 40%">Mô tả
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                rowspan="1" colspan="1"
                                                style="width: 10%;">Người tạo
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                rowspan="1" colspan="1"
                                                style="width: 10%;">Ngày tạo
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                rowspan="1" colspan="1"
                                                style="width: 10%;">Người sửa cuối
                                            </th>
                                            <th class="sorting" tabindex="0" aria-controls="bootstrap-data-table"
                                                rowspan="1" colspan="1"
                                                style="width: 10%;">Ngày sửa cuối
                                            </th>
                                        </tr>
                                        </thead>
                                        <tbody>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Airi Satou</td>
                                            <td>Accountant</td>
                                            <td>Tokyo</td>
                                            <td>$162,700</td>
                                            <td>Tokyo</td>
                                            <td>$162,700</td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">Angelica Ramos</td>
                                            <td>Chief Executive Officer (CEO)</td>
                                            <td>London</td>
                                            <td>$1,200,000</td>
                                            <td>Tokyo</td>
                                            <td>$162,700</td>
                                        </tr>
                                        <tr role="row" class="odd">
                                            <td class="sorting_1">Ashton Cox</td>
                                            <td>Junior Technical Author</td>
                                            <td>San Francisco</td>
                                            <td>$86,000</td>
                                            <td>Tokyo</td>
                                            <td>$162,700</td>
                                        </tr>
                                        <tr role="row" class="even">
                                            <td class="sorting_1">Bradley Greer</td>
                                            <td>Software Engineer</td>
                                            <td>London</td>
                                            <td>$132,000</td>
                                            <td>Tokyo</td>
                                            <td>$162,700</td>
                                        </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
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
