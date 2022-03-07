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
    $("#input-24").fileinput({
        deleteExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
            };
        },
        
        overwriteInitial: false,
        maxFileCount: 50,
        showBrowse: false,
        browseOnZoneClick: true,
    });

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
            url: create_url,
            method: 'post',
            data: formData,
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