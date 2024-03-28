<script src="https://cdnjs.cloudflare.com/ajax/libs/tinymce/7.0.0/tinymce.min.js"
    integrity="sha512-xEHlM+pBhSw2P/G+5x3BR8723QPEf2bPr4BLV8p8pvtaCHmWVuSzzKy9M0oqWaXDZrB3r2Ntwmc9iJcNV/nfBQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $(document).ready(function () {
        $('#dataTable').DataTable();
    });
    tinymce.init({
        selector: 'textarea#blog',
       
        plugins: [
            'advlist', 'autolink', 'link', 'image', 'lists', 'charmap', 'preview', 'anchor', 'pagebreak',
            'searchreplace', 'wordcount', 'visualblocks', 'code', 'fullscreen', 'insertdatetime', 'media',
            'table', 'emoticons', 'template', 'help'
        ],
        toolbar: 'undo redo | styles | bold italic | alignleft aligncenter alignright alignjustify | ' +
            'bullist numlist outdent indent | link image | print preview media fullscreen | ' +
            'forecolor backcolor emoticons | help',
        menu: {
            favs: { title: 'My Favorites', items: 'code visualaid | searchreplace | emoticons' }
        },
        menubar: 'favs file edit view insert format tools table help',
        content_style: 'body { font-family:Helvetica,Arial,sans-serif; font-size:16px }'
    });
</script>