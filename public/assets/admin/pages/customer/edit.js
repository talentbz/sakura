$(document).ready(function () {
    $("#input-24").fileinput({
        initialPreview: image_path,
        //uploadAsync: false,
        initialPreviewAsData: true,
        initialPreviewConfig: id_array,
        deleteUrl: image_delete,
        uploadUrl: image_add,

        uploadExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
                review_id: review_id,
            };
        },
        deleteExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
            };
        },
        overwriteInitial: false,
        maxFileCount: 10,
        maxFilesNum: 10,
        showBrowse: false,
        browseOnZoneClick: true,
    });
    $(document).on('click', '.file-drop-zone', function(){
        $('.fileinput-upload-button').attr('style','display: block !important'); 
    })
    $('form#myForm').submit(function(e){
        e.preventDefault();
        e.stopPropagation();
        var formData = new FormData(this);
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: edit_url,
            method: 'post',
            data: formData,
            success: function (res) {
                toastr["success"]("Success");
                location.href = list_url; 
            },
            error: function (res){
                console.log(res)
            },
            cache: false,
            contentType: false,
            processData: false
        })
    })
})
