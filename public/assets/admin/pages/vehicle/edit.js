$(document).ready(function () {
    //model select category and sub category
    $('.select-category').on("change", function (e) { 
        var select_val = $(e.currentTarget).val();
            for(cat=0; cat<models.length; cat++){
                if(models[cat].category_name == select_val){
                    $("#subcategory").empty();
                    var sub_category = models[cat].children
                    if(sub_category.length>1){
                        for(sub=0; sub<sub_category.length; sub++){
                            $('#subcategory').append('<option value="'+sub_category[sub]+'">'+sub_category[sub]+'</option>');
                        };
                    } else {
                        $('#subcategory').append('<option value="">'+'Select'+'</option>');
                    }
                }
            }
    })
    $("#input-711").fileinput({
        
        initialPreview: image_path,
        //uploadAsync: false,
        initialPreviewAsData: true,
        initialPreviewConfig: id_array,
        deleteUrl: image_delete,
        uploadUrl: image_add,
        uploadExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
                vehicle_id: vehicle_id,
            };
        },
        deleteExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
            };
        },
        overwriteInitial: false,
        maxFileCount: 50,
        maxFilesNum: 50,
        showBrowse: false,
        browseOnZoneClick: true,
    });
    $('.fileinput-remove-button').on('click', function(e){
        e.preventDefault();
        e.stopPropagation();
        id = id_array;
        if(id.length > 0){
            $.ajaxSetup({
                headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: image_all_delete,
                method: 'post',
                contentType: 'application/json',
                data: JSON.stringify(id),
                beforeSend: function(){
                    $('.back').hide();
                },
                success: function (res) {
                    toastr["success"]("Success");
                    setInterval(function(){ 
                        location.href = window.location.href; 
                    }, 2000);
                },
                error: function (res){
                    console.log(res)
                }
            })
        }
    })
    if(id_array.length > 0) {
        // 
        $('.fileinput-upload-button').attr('style','display: none !important'); 
    } else {
        $('.fileinput-upload-button').attr('style','display: block !important'); 
    }
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
            url: edit_post,
            method: 'post',
            data: formData,
            beforeSend: function(){
                $('.back').hide();
            },
            success: function (res) {
                toastr["success"]("Success");
                setInterval(function(){ 
                    location.href = list_url; 
                }, 2000);
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
