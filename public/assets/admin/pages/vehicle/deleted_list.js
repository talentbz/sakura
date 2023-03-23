$(document).ready(function () {
    function newexportaction(e, dt, button, config) {
        var self = this;
        var oldStart = dt.settings()[0]._iDisplayStart;
        dt.one('preXhr', function (e, s, data) {
            // Just this once, load all data from the server...
            data.start = 0;
            data.length = 2147483647;
            dt.one('preDraw', function (e, settings) {
                // Call the original action function
                if (button[0].className.indexOf('buttons-copy') >= 0) {
                    $.fn.dataTable.ext.buttons.copyHtml5.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-excel') >= 0) {
                    $.fn.dataTable.ext.buttons.excelHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.excelHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.excelFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-csv') >= 0) {
                    $.fn.dataTable.ext.buttons.csvHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.csvHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.csvFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-pdf') >= 0) {
                    $.fn.dataTable.ext.buttons.pdfHtml5.available(dt, config) ?
                        $.fn.dataTable.ext.buttons.pdfHtml5.action.call(self, e, dt, button, config) :
                        $.fn.dataTable.ext.buttons.pdfFlash.action.call(self, e, dt, button, config);
                } else if (button[0].className.indexOf('buttons-print') >= 0) {
                    $.fn.dataTable.ext.buttons.print.action(e, dt, button, config);
                }
                dt.one('preXhr', function (e, s, data) {
                    // DataTables thinks the first item displayed is index 0, but we're not drawing that.
                    // Set the property to what it was before exporting.
                    settings._iDisplayStart = oldStart;
                    data.start = oldStart;
                });
                // Reload the grid with the original page. Otherwise, API functions like table.cell(this) don't work properly.
                setTimeout(dt.ajax.reload, 0);
                // Prevent rendering of the full data to the DOM
                return false;
            });
        });
        // Requery the server with the new one-time export settings
        dt.ajax.reload();
    }
    var table = $('.datatable').DataTable({
        searching: true,
        serverSide: true,
        processing: true,
        deferRender:true,
        ajax: get_data,
        order: [[7, 'desc']],
        columns: [
            {data: 'image', name: 'image', render: function( data ){
                return '<img src="' + data + '" width="80"/>';
            }},
            {data: 'stock_no', name: 'stock_no' },
            {data: 'chassis', name: 'chassis'},
            {data: 'price', name: 'price', render: function( data ){
                return '¥ ' + data.toLocaleString()
            }},
            {data: 'sale_price', name: 'sale_price', render: function( data ){
                if(data){
                    return '¥ ' + data.toLocaleString()
                } else {
                    return ''
                }
            }},
            {data: 'usd', name: 'usd', render: function( data ){
                return '$ ' + data.toLocaleString()
            }},
            {data: 'status', name: 'status', render: function( data ){
                return '<span class="badge badge-pill badge-soft-warning font-size-12">'+ data +'</span>';
            }},
            {data: 'deleted_at', name: 'deleted_at'},
            {data: 'action', name: 'action'},
        ],
        columnDefs: [
            {"className": "dt-body-center", "targets": "_all"},
            { orderable: false, targets: [0] },
        ],
        dom: 'lBfrtip',
        buttons: [
            {
                extend:'copy',
                text: 'Copy',
                "action": newexportaction
            },
            {
                "extend": 'excel',
                // "text": '<button class="btn"><i class="fa fa-file-excel-o" style="color: green;"></i>  Excel</button>',
                // "titleAttr": 'Excel',
                "action": newexportaction
            },
            {
                extend:'pdf',
                text: 'PDF',
                "action": newexportaction
            }
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
    $('.datatable').on('click', '.confirm_restore', function(e){
        e.preventDefault();
        e.stopPropagation();
        var id = $(this).data('id');
        $('.restore_button').click(function(){
            $.ajaxSetup({
                headers: {
                  'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $.ajax({
                url: restore_url,
                method: 'get',
                data: {id:id},
                success: function (data){
                    toastr["success"]("Success");
                    $('#restoreModal').modal('hide');
                    table.ajax.reload();
                }
            })
        })
    })
})