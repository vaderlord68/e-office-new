<?php $__env->startSection('body_content'); ?>
    ##parent-placeholder-5a4526adfe28f01223dccf37a363ace9165900d0##
    <?php
    $channelIDList = $data['channelIDList'];
    $bestNews = $data['IsShowBestNews'];
    ?>

    <section class="news-view">
        <div class="rơw">
            <div class="col-sm-3 news-box">
                <div class="well">
                    <div class="well-right category">
                        <span class="nav-link title-category"><?php echo e(Helpers::getRS("Chuyen_muc")); ?></span>
                        <div class="list-category">
                            <ul class="nav nav-pills flex-column">
                                <?php

                                \Debugbar::info($channelIDList);
                                ?>

                                <?php $__currentLoopData = $channelIDList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group" name="channelIDshowNews" id="channelIDshowNews">
                                        <a class="nav-link" href="<?php echo e(url('/news').'/list/?channelID='.$row->CodeID); ?>">
                                            <?php echo e(isset($row->CodeName) ? $row->CodeName : ''); ?>

                                        </a>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                    <div class="well-right best-news">
                        <span class="nav-link title-category"><?php echo e(Helpers::getRS("Tin_moi_nhat")); ?></span>
                        <div class="list-category">
                            <ul class="nav nav-pills flex-column">
                                <?php $__currentLoopData = $bestNews; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <li class="list-group">
                                        <div class="row">
                                            <div class="col-sm-4">
                                                <img src="<?php echo e(isset($row->Image) ? $row->Image : ''); ?>"/>
                                            </div>
                                            <div class="col-sm-8">
                                                <a class="nav-link">
                                                    <?php echo e(isset($row->Title) ? $row->Title : ''); ?>

                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-sm-9 news-box" style="height: 300px;">
                <div class="well">
                    <label class="label"><?php echo e(Helpers::getRS("Tin_tuc")); ?></label>
                    <?php $__currentLoopData = $newsList; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $newsRow): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                        <?php
                            $newsID = $newsRow->NewsID;
                            $detailURL = url('/news/detail/').'?newsID='.$newsID;
                        ?>
                        <div class="row">
                            <div class="col-sm-5">
                                <a href="<?php echo e($detailURL); ?>"><img src="<?php echo e(isset($newsRow->Image) ? $newsRow->Image : ''); ?>"/></a>
                            </div>
                            <div class="col-sm-7">
                                <a href="<?php echo e($detailURL); ?>" class="nav-link">
                                    <?php echo e(isset($newsRow->Title) ? $newsRow->Title : ''); ?>

                                </a>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-sm-5">
                            </div>
                            <div class="col-sm-7">
                            </div>
                        </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </section>

    <script>
        $(document).ready(function () {
            $("#channelIDshowNews").change(function () {
                console.log('test');
                postMethod('<?php echo e(url("/news/view")); ?>', function (data) {
                    console.log('sdfds');
//                    $("#grdW76F2140_SelectNews").pqGrid('option','dataModel.data', JSON.parse(data) );
//                    $("#grdW76F2140_SelectNews").pqGrid('refreshDataAndView');
                }, {channelIDshowNews: $("#channelIDshowNews").val(), _token: '<?php echo e(csrf_token()); ?>'});
            });
        });
    </script>

<?php $__env->stopSection(); ?>


<?php echo $__env->make('page.master', array_except(get_defined_vars(), array('__data', '__path')))->render(); ?>