$(document).ready(function () {
    $('#datatable-buttons').on('click', '.confirm_delete', function(e){
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
    $('#datatable-buttons').on('click', '.confirm_status', function(e){
        e.preventDefault();
        e.stopPropagation();
        var id = $(this).data('id');
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
                data: {id:id, status:status},
                success: function (data){
                    toastr["success"]("Success");
                    $('#myModal').modal('hide');
                    location.href = index_url; 
                }
            })
        })
    })
})