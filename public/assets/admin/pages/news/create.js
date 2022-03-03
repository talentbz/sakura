$(document).ready(function () {
    $("#input-24").fileinput({
        deleteExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
            };
        },
        
        overwriteInitial: false,
        validateInitialCount: true,
        maxFileCount: 1,
        showBrowse: false,
        browseOnZoneClick: true,
        showUpload: false
    });
    tinymce.init({
        mode : "specific_textareas",
        editor_selector : "mceEditor"
    });
    $('form#myForm').submit(function(e){
        e.preventDefault();
        e.stopPropagation();
        var formData = new FormData(this);
        formData.append('news_contents', tinyMCE.get('news-contents').getContent());
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