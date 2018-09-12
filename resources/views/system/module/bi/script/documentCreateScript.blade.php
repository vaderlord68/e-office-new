<script>
    var createDocumentForm = $("#createDocument");

    $(document).ready(function () {
        ClassicEditor
            .create( document.querySelector('#documentContent' ))
            .then( editor => {
            } )
            .catch( error => {
            } );
        // tinymce.init({
        //     selector:'#documentContent',
        // });

        $("#submitCreateDocumentForm").click(function () {
            // alert('xxxx');
            // createDocumentForm.submit();
        });

    })


</script>