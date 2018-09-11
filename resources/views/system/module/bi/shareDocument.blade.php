<!-- Modal share document-->
<div class="modal fade" id="modalShareDocument">
    <div class="modal-dialog  modal-lg" role="document">
        <div class="modal-content">
            <div class="loading hide">
                <div class="backdrop-loading"></div>
                <div class="icon-loading">
                    <div>
                        <img src="{{asset('media/loading.gif')}}" /></br>
                        Sending..
                    </div>
                </div>
            </div>
            <div class="modal-header">
                <h5 class="modal-title" id="deleteModalLabel">{{Helpers::getRS('Chia_se')}} "{{$document->DocName or ''}}"</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body" style="padding: 1rem">
                <form action="" id="frmShareDocument">
                    {{csrf_field()}}
                    <div class="row form-group">
                        <label class="col-sm-3">{{Helpers::getRS('Chia_se_duong_dan')}}</label>
                        <div class="col-sm-9">
                            <input type="text" class="form-control" name="txtShareLink" id="txtShareLink"
                                   value="{{url('/bi/document/view?DocumentId='.$document->ID)}}" readonly/>

                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3"></label>
                        <div class="col-sm-7">
                            <label for="chkSendMail">
                                <input type="checkbox" class="custom-checkbox" name="chkSendMail" id="chkSendMail" checked /> {{Helpers::getRS('Send_an_email_invitation')}}
                            </label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3">{{Helpers::getRS('Chia_se_voi')}}</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="txtShareWith[]" id="txtShareWith" style="width: 100%" tabindex="-1"
                                    multiple="multiple" autofocus>
                                @foreach($users as $row)
                                    <option value="{{$row->UserID or ''}}" {{isset($share)?(in_array($row->UserID, $share->StrUserIDSharing)?'selected':''):''}}
                                            data-email="{{$row->Email or ''}}">{{$row->UserName or ''}}</option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <label class="col-sm-3">{{Helpers::getRS('Moi_moi_nguoi')}}</label>
                        <div class="col-sm-7">
                            <select class="form-control" name="txtInvitePeople[]" id="txtInvitePeople" style="width: 100%" tabindex="-1"
                                    multiple="multiple" autofocus required>
                                @foreach($users as $row)
                                    <option value="{{$row->UserID or ''}}" {{isset($share)?(in_array($row->UserID, $share->StrUserIDInvite)?'selected':''):''}}
                                            data-email="{{$row->Email or ''}}">{{$row->UserName or ''}}</option>
                                @endforeach
                            </select>
                        </div>
                        {{--<div class="col-sm-2">--}}
                            {{--<select class="form-control" name="txtSharePer" id="txtSharePer">--}}
                                {{--<option value="0">Can Edit</option>--}}
                                {{--<option value="1">Can View</option>--}}
                            {{--</select>--}}
                        {{--</div>--}}
                    </div>
                    <input type="hidden" name="hdDocID" value="{{$document->ID or ''}}"/>
                    <button type="submit" class="hide" id="btnSubmit" />
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" id="submitShare">{{Helpers::getRS('Chia_se')}}</button>
                <button type="button" class="btn btn-primary" data-dismiss="modal" >{{Helpers::getRS('Huy_bo')}}</button>
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
                url: '{{url('/bi/folder/share/execute')}}',
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