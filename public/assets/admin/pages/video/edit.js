$(document).ready(function () {
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