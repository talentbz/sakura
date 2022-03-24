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
            url: create_url,
            method: 'post',
            data: formData,
            success: function (res) {
                toastr["success"]("Success");
                setInterval(function(){ 
                    location.href = window.location.href; 
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
    $('.status').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var id = $(this).data('id');
        var user_id = $(this).attr('data-user');
        $('.save_button').click(function(){
            var status = $( ".select-status option:selected" ).text();
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: change_status,
                method: 'get',
                data: {id:id, status:status, user_id:user_id},
                success: function (data){
                    toastr["success"]("Success");
                    $('#myModal').modal('hide');
                    location.href = window.location.href; 
                }
            })
        })
        
    })
    var container = document.querySelector('#chat-scroll .simplebar-content-wrapper'); 
    container.scrollTo({ top: container.scrollHeight, behavior: "smooth" });
})
