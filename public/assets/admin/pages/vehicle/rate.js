$(document).ready(function () {
    $('form#myForm').submit(function(e){
        e.preventDefault();
        var formData = new FormData(this);
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: rate_url,
            method: 'post',
            data: formData,
            success: function (res) {
                toastr["success"]("Updated rate!");
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