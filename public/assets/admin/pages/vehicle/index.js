$(document).ready(function () {
    $('#datatable').on('click', '.confirm_delete', function(e){
        e.preventDefault();
        e.stopPropagation();
        var id = $(this).data('id');
        $('.delete_button').click(function(){
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: delete_url,
                method: 'get',
                data: {id:id},
                success: function (data){
                    toastr["success"]("Success");
                    $('#myModal').modal('hide');
                    location.href = index_url; 
                }
            })
        })
})
})