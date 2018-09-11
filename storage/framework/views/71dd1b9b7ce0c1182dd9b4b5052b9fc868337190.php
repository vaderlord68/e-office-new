<!-- Modal share document-->
<div class="modal fade" id="modalShareDocument">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="loading hide">
                <div class="backdrop-loading"></div>
                <div class="icon-loading">
                    <div>
                        <img src="<?php echo e(asset('media/loading.gif')); ?>" /></br>
                        Sending..
                    </div>
                </div>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel"><?php echo e(Helpers::getRS('Chia_se')); ?> "<?php echo e(isset($document->DocName) ? $document->DocName : ''); ?>"</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 1rem">
                <form action="" id="frmShareDocument">
                    <?php echo e(csrf_field()); ?>

                    <div class="row form-group">
                        <label class="col-sm-3"><?php echo e(Helpers::getRS('Chia_se_duong_dan')); ?></label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="txtShareLink" id="txtShareLink"
                                   value="<?php echo e(url('/bi/document/view?DocumentId='.$document->ID)); ?>" readonly/>

                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3"></label>
                        <div class="col-sm-7">
                            <label for="chkSendMail">
                                <input type="checkbox" class="custom-checkbox" name="chkSendMail" id="chkSendMail" checked /> <?php echo e(Helpers::getRS('Send_an_email_invitation')); ?>

                            </label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3"><?php echo e(Helpers::getRS('Chia_se_voi')); ?></label>
                        <div class="col-sm-7">
                            <select class="form-control" name="txtShareWith[]" id="txtShareWith" style="width: 100%" tabindex="-1"
                                    multiple="multiple" autofocus>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(isset($row->UserID) ? $row->UserID : ''); ?>" <?php echo e(isset($share)?(in_array($row->UserID, $share->StrUserIDSharing)?'selected':''):''); ?>

                                            data-email="<?php echo e(isset($row->Email) ? $row->Email : ''); ?>"><?php echo e(isset($row->UserName) ? $row->UserName : ''); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3"><?php echo e(Helpers::getRS('Moi_moi_nguoi')); ?></label>
                        <div class="col-sm-7">
                            <select class="form-control" name="txtInvitePeople[]" id="txtInvitePeople" style="width: 100%" tabindex="-1"
                                    multiple="multiple" autofocus required>
                                <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $row): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e(isset($row->UserID) ? $row->UserID : ''); ?>" <?php echo e(isset($share)?(in_array($row->UserID, $share->StrUserIDInvite)?'selected':''):''); ?>

                                            data-email="<?php echo e(isset($row->Email) ? $row->Email : ''); ?>"><?php echo e(isset($row->UserName) ? $row->UserName : ''); ?></option>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </select>
                        </div>
                        
                            
                                
                                
                            
                        
                    </div>
                    <input type="hidden" name="hdDocID" value="<?php echo e(isset($document->ID) ? $document->ID : ''); ?>"/>
                    <button type="submit" class="hide" id="btnSubmit" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="submitShare"><?php echo e(Helpers::getRS('Chia_se')); ?></button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" ><?php echo e(Helpers::getRS('Huy_bo')); ?></button>
            </div>
        </div>
    </div>
</div>
<script>
    $(document).ready(function () {

        $('#submitShare').on('click', function () {
            $('#btnSubmit').click();
        });

        $('#modalShareDocument').on('submit', '#frmShareDocument', function (e) {
            e.preventDefault();
            $('#modalShareDocument').find('.loading').removeClass('hide');
            $.ajax({
                method: "POST",
                url: '<?php echo e(url('/bi/folder/share/execute')); ?>',
                data: $("#frmShareDocument").serialize(),
                success: function (data) {
                    if (data == 0) {//Error
                        alert_error('Error occurred while sharing document!.');
                    } else {//Successfully
                        alert_info('Sharing document successfully!', function () {
                            $('#modalShareDocument').modal('hide');
                        });
                    }

                    $('#modalShareDocument').find('.loading').addClass('hide');
                }
            });
        });

        $('#txtShareWith').select2({
            placeholder: "User ID, User Name, Email",
            separator: ";",
            templateResult: function (state) {
                if (!state.id) {
                    return state.text;
                }
                return $('<span>' + state.text + '</span>&nbsp;&nbsp;<small>' + $(state.element).data('email') + '</small>');
            },
            matcher: function(term, data) {
                if (typeof term.term == 'undefined' || term.term.trim() === '')
                    return data;

                var email = $(data.element).data('email');
                return data.text.toUpperCase().indexOf(term.term.toUpperCase()) > -1
                        || data.id.toUpperCase().indexOf(term.term.toUpperCase()) > -1
                        || email.toUpperCase().indexOf(term.term.toUpperCase()) > -1 ? data : null;

            },
        });
        $('#txtInvitePeople').select2({
            placeholder: "User ID, User Name, Email",
            separator: ";",
            templateResult: function (state) {
                if (!state.id) {
                    return state.text;
                }
                return $('<span>' + state.text + '</span>&nbsp;&nbsp;<small>' + $(state.element).data('email') + '</small>');
            },
            matcher: function(term, data) {
                if (typeof term.term == 'undefined' || term.term.trim() === '')
                    return data;

                var email = $(data.element).data('email');
                return data.text.toUpperCase().indexOf(term.term.toUpperCase()) > -1
                || data.id.toUpperCase().indexOf(term.term.toUpperCase()) > -1
                || email.toUpperCase().indexOf(term.term.toUpperCase()) > -1 ? data : null;

            },
        });
        setTimeout(function () {
            var shareWith = $("#txtShareWith").val();
            var invitePeople = $("#txtInvitePeople").val();
            if (shareWith.length == 0) {
                $("#txtShareWith").val('').trigger('change');
            }
            if (invitePeople.length == 0) {
                $("#txtInvitePeople").val('').trigger('change');
            }
        }, 800);
    });
</script>