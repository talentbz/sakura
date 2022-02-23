$(document).ready(function () {
    $("#input-24").fileinput({
        deleteExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
            };
        },
        overwriteInitial: false,
        validateInitialCount: true,
        maxFileCount: 10,
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
            url: add_post,
            method: 'post',
            data: formData,
            success: function (res) {
                toastr["success"]("Success");
                // setInterval(function(){ 
                //     location.href = list_url; 
                // }, 2000);
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
