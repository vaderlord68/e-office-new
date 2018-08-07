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
    <div class="module-bi container">
        <div class="row">
            <div class="folder-sidebar col-sm-3">
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
            <div class="folder-content col-sm-9">

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
        height: 100%;
    }

    .module-bi .folder-sidebar {
        height: 100%;
        box-shadow: 0 0 5px grey;
    }

    .module-bi .folder-content {
        height: 100%;
    }
</style>