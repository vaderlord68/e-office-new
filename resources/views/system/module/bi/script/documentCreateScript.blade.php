<script>
    var createDocumentForm = $("#createDocument");

    $(document).ready(function () {
        ClassicEditor
            .create( document.querySelector('#documentContent' ))
            .then( editor => {
                console.log( editor );
            } )
            .catch( error => {
                console.error( error );
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