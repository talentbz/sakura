$(document).ready(function () {
    var table = $('.datatable').DataTable({
        searching: true,
        serverSide: true,
        processing: true,
        deferRender:true,
        ajax: get_data,
        order: [[2, 'desc']],
        columns: [
            {data: 'url', name: 'url'},
            {data: 'search_key', name: 'search_key', render: function( data ){
                return data;
            }},
            {data: 'created_at', name: 'created_at'},
            {data: 'action', name: 'action'},
        ],
        columnDefs: [
            {"className": "dt-body-center", "targets": "_all"},
            { orderable: false, targets: [0] },
        ],
    });
    $('.datatable').on('click', '.confirm_delete', function(e){
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
                    table.ajax.reload();
                }
            })
        })
    })
})