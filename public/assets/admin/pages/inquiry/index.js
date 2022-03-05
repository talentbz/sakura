$(document).ready(function(){
    $('.edit').click(function(e){
        e.preventDefault();
        e.stopPropagation();
        var id = $(this).data('id');
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: detail_url,
            method: 'post',
            data: {id:id},
            success: function (data){
                var result = data.data;
                console.log(result)
                $('.inqu-name').text(result.inqu_name)
                $('.inqu-email').text(result.inqu_email)
                $('.inqu-phone').text(result.inqu_mobile)
                $('.inqu-country').text(result.inqu_country)
                $('.inqu-city').text(result.inqu_city)
                $('.inqu-address').text(result.inqu_address)
                $('.inqu-vehicle a').text(result.vehicle_name)
                $('.inqu-vehicle a').attr("href", result.site_url)
                $('.inqu-fprice').text(result.fob_price)
                $('.inqu-insurance').text(result.insurance)
                $('.inqu-inspection').text(result.inspection)
                $('.inqu-port').text(result.inqu_port)
                $('.inqu-tprice').text(result.total_price)
                $('.inqu-stock a').text(result.stock_no)
                $('.inqu-stock a').attr("href", result.site_url)
                $('.inqu-comment').html(result.inqu_comment)

            }
        })
    })
    $('.confirm_delete').click(function(e){
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
                    location.href = list_url; 
                }
            })
        })
    })
})