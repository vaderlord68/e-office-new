<script>
    var createDocumentForm = $("#createDocument");

    $(document).ready(function () {
        // ClassicEditor
        //     .create( document.querySelector('#documentContent' ))
        //     .then( editor => {
        //     } )
        //     .catch( error => {
        //     } );
        CKEDITOR.replace('documentContent', {
            removeButtons: 'Source',
            removePlugins: 'save,print,preview,find,about,maximize,showblocks,elementspath,spellchecker',
            resize_enabled: false
            // The rest of options...
        });
        // tinymce.init({
        //     selector:'#documentContent',
        // });

        $("#submitCreateDocumentForm").click(function () {
            // alert('xxxx');
            // createDocumentForm.submit();
        });

    })


</script>