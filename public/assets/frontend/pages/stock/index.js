$(document).ready(function () {
    var local_url = new URL(window.location.href);
    var body_type = local_url.searchParams.get("body_type");
    var make_type = local_url.searchParams.get("make_type");
    //model select category and sub category
    $('.select-category').on("change", function (e) { 
        var select_val = $(e.currentTarget).val();
            for(cat=0; cat<models.length; cat++){
                if(models[cat].category_name == select_val){
                    $(".subcategory").empty();
                    var sub_category = models[cat].children
                    if(sub_category.length>1){
                        for(sub=0; sub<sub_category.length; sub++){
                            $('.subcategory').append('<option value="'+sub_category[sub]+'">'+sub_category[sub]+'</option>');
                        };
                    } else {
                        $('.subcategory').append('<option value="">'+'Any'+'</option>');
                    }
                }
            }
    })

    //price calc for pc version
    $('#select-country').on("change", function (e) { 
        e.preventDefault();
        e.stopPropagation();
        var id = $(e.currentTarget).val()
        $.ajax({
            url: select_port,
            data:{
                id:id
            },
            type: "get",
        })
        .done(function (response) {
            var port = response.port;
            var port_name = JSON.parse(port.port)
            var port_price = JSON.parse(port.price)
            html = ''
            if(port_name != null){
                for(i=0; i<port_name.length; i++){
                    html +='<option value="'+port_price[i]+'">'+port_name[i]+'</option>'
                }
            } 
            html +='<option value="0"></option>'
            $('#price-port')
                    .find('option')
                    .remove()
                    .end()
                    .append(html)
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occured');
        });
    })

    //price cal for mobile version
    $('#select-country-mobile').on("change", function (e) { 
        var id = $(e.currentTarget).val()
        $.ajax({
            url: select_port,
            data:{
                id:id
            },
            type: "get",
        })
        .done(function (response) {
            var port = response.port;
            var port_name = JSON.parse(port.port)
            var port_price = JSON.parse(port.price)
            html = ''
            if(port_name != null){
                for(i=0; i<port_name.length; i++){
                    html +='<option value="'+port_price[i]+'">'+port_name[i]+'</option>'
                }
            } 
            html +='<option value="0"></option>'
            $('#price-port-mobile')
                    .find('option')
                    .remove()
                    .end()
                    .append(html)
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occured');
        });
    })
    $(document).on('click', '.image-count', function(e){
        e.preventDefault();
        e.stopPropagation();
        id = $(this).data("id");
        $.ajaxSetup({
            headers: {
              'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        $.ajax({
            url: light_url,
            method: 'get',
            data: {id:id},
            success: function (data){
                var host = window.location.origin
                var arr = data.data;
                        
                arr.forEach( function(data) {
                    data['src'] = data['image'];
                    delete data['image'];
                    data.src = host +  '/uploads/vehicle/' + id + '/real/'+data.src;
                });
                $(this).lightGallery({
                    dynamic: true,
                    dynamicEl: arr,
                    download: false,
                    mode: 'lg-fade',
                })
            }
        })
    });
    $(document).on('click', '.video-count', function(e){
        e.preventDefault();
        e.stopPropagation();
        video = $(this).data("id");
        console.log(video);
        $(this).lightGallery({
            dynamic: true,
            dynamicEl: [
                {
                    src : video
                },
            ],
            download: false,
            mode: 'lg-fade',
        })
    });
    var _token = $('input[name="_token"]').val();
    var page = 1;
    infinteLoadMore(page);
    $(document).on('click', '#load_more_button', function(){
        $('#load_more_button').html('<b>Loading...</b>');
        page++;
        infinteLoadMore(page);
    });
    $(document).on('click', '#price-calc', function(){   
        price_calc();
        // var price_country = $('#select-country').val(); 
        // var price_port = parseInt($('.port-pc option:selected' ).val()); 
        // var inspection = parseInt($('.inspection option:selected' ).val());
        // var insurance = parseInt($('.insurance option:selected' ).val()); 
        // if(window.location.href.indexOf('?') > -1) {
        //     location.href = window.location.href + "&price_country=" + price_country + '&price_port=' + price_port + '&inspection=' + inspection + '&insurance=' + insurance
        // } else {
        //     location.href = window.location.href + "?price_country=" + price_country + '&price_port=' + price_port + '&inspection=' + inspection + '&insurance=' + insurance
        // }  

    })
    function infinteLoadMore(page) {
        $.ajax({
            url: sock_page + "?page=" + page,
            data:{
                body_type:body_type,
                make_type:make_type,
                search_keyword:search_keyword,
                maker:maker,
                model_name:model_name,
                from_year:from_year,
                to_year:to_year,
                from_price:from_price,
                to_price:to_price,
                // price_country:price_country,
                // price_port:price_port,
                // inspection:inspection,
                // insurance:insurance,
            },
            type: "get",
        })
        .done(function (response) {
            $('#load_more_button').remove();
            if (response.length <= 24) {
                $('#load-more').hide();
                //$('.auto-load').html("We don't have more data to display :(");
                return;
            }
            $("#stock-list").append(response);
            if( page>1 ){
                price_calc();
            }
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occured');
        });
    }
    
    
   $('.insp-n').click(function(){
       $(this).addClass('active')
       $('.insp-y').removeClass('active')    
       $('.insp-value').val($(this).data("id"))
   })
   $('.insp-y').click(function(){
        $(this).addClass('active')
        $('.insp-n').removeClass('active')    
        $('.insp-value').val($(this).data("id"))
   })
   $('.insu-n').click(function(){
        $(this).addClass('active')
        $('.insu-y').removeClass('active')    
        $('.insu-value').val($(this).data("id"))
   })
   $('.insu-y').click(function(){
        $(this).addClass('active')
        $('.insu-n').removeClass('active')    
        $('.insu-value').val($(this).data("id"))
   })

   $(document).on('click', '#mobile-cal-btn', function(){
        price_calc_mobile()
   })
   
})
// $( window ).on( "load", function() {
//     price_calc();
//     price_calc_mobile();
// });
/* 
    pc price calculator
*/
function price_calc(){
    port_price = parseInt($('.port-pc option:selected' ).val()); 
    port_name = $('.port-pc option:selected' ).text(); 
    inspection_price = parseInt($('.inspection option:selected' ).val());
    insurance_price = parseInt($('.insurance option:selected' ).val()); 
    country = $('#select-country').val();
    $('.contents-list').each(function(e) {
        total_price = parseInt($(this).find('.price').val());
        cubic_meter = $(this).find('.cubic-meter').val();
        price_shipping = port_price*cubic_meter;
        if(port_price == 0) {
            cif = '( C & F )'
            final_price = "ASK"    
            port_name = 'Port'
        } else {
            if(inspection_price == 0){
                cif = '( CIF )'
            }
            if(insurance_price == 0){
                cif = '(  C&F Inspect )'
            }
            if(insurance_price == 0 && inspection_price == 0){
                cif = '( C & F )';
            }
            if(!insurance_price == 0 && !inspection_price == 0){
                cif = '( CIF Inspect )'
            }
            final_price ='$' + Math.round(total_price + price_shipping + inspection_price + insurance_price).toLocaleString();
        }
        if(final_price == '$NaN') {
            final_price ='ASK'
        }
        current_url = $(this).find('.detail-inquire a').attr("data-contents");
        new_url = current_url + '?country=' + country +'&port=' +port_price +'&inspection='+inspection_price +'&insurance='+insurance_price +'&total_price=' + final_price;
        $(this).find('.detail-inquire a').attr("href", new_url)
        $(this).find('.stock-contents a').attr("href", new_url)
        $(this).find('.stock-image a').attr("href", new_url)
        $(this).find('.cif').text(cif);
        $(this).find('.port').text(port_name);
        $(this).find('.totla-value').text(final_price);
    })
}
//   mobile calc function 
function price_calc_mobile(){
    port_price = parseInt($('.port option:selected' ).val()); 
    port_name = $('.port option:selected' ).text(); 
    inspection_price = parseInt($('.insp-value' ).val());
    insurance_price = parseInt($('.insu-value' ).val()); 
    $('.contents-list').each(function() {
        total_price = parseInt($(this).find('.price').val());
        cubic_meter = $(this).find('.cubic-meter').val();
        price_shipping = port_price*cubic_meter;
        if(port_price == 0) {
            cif = "( C & F )"
            final_price = "ASK"    
        } else {
            if(inspection_price == 0){
                cif = '( CIF )'
            }
            if(insurance_price == 0){
                cif = '(  C&F Inspect )'
            }
            if(insurance_price == 0 && inspection_price == 0){
                cif = '( C & F )';
            }
            if(!insurance_price == 0 && !inspection_price == 0){
                cif = '( CIF Inspect )'
            }
            final_price ='$' + Math.round(total_price + price_shipping + inspection_price + insurance_price).toLocaleString();
        }
        country = $('#select-country-mobile').val();
        current_url = $(this).find('.detail-inquire a').attr("data-contents");
        new_url = current_url + '?country=' + country +'&port=' +port_price +'&inspection='+inspection_price +'&insurance='+insurance_price +'&total_price=' + final_price;
        $(this).find('.detail-inquire a').attr("href", new_url)
        $(this).find('.stock-mobile-title a').attr("href", new_url)
        $(this).find('.stock-image a').attr("href", new_url)
        $(this).find('.cif').text(cif);
        $(this).find('.port').text(port_name);
        $(this).find('.totla-value').text(final_price);
    })
}
border_object = $('.contents-border-right');
if($(window).width() <= 1024){
    for(i=0; i<border_object.length; i++){
        border_object.eq(3*i).css('display', 'none');
    }
}
if($( window ).width() <= 425){
    border_object.css('display', 'block')
    for(i=0; i<border_object.length; i++){  
            border_object.eq(2*i).css('display', 'none');
    }
}