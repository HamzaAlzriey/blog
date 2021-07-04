    
    
    
    <script src="https://code.jquery.com/jquery-3.5.1.min.js">
    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"></script>


    <script src=" https://cdn.ckeditor.com/ckeditor5/12.3.1/classic/ckeditor.js "></script>
    <script>
        ClassicEditor
            .create(document.querySelector('#editor'))
            .then(editor => {
                console.log(editor);
            })
            .catch(error => {
                console.error(error);
            });

    </script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <script>
        $(".edit").click(function(){
            // console.log("name" , $(this).data("name"));
            $("#id").val($(this).data("id"));
            $("#name").val($(this).data("name"));
        });
</script>