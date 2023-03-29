$(document).ready(function () {
    var local_url = new URL(window.location.href);
    var body_type = local_url.searchParams.get("body_type");
    var make_type = local_url.searchParams.get("make_type");
    var gear = local_url.searchParams.get("gear");
    //model select category and sub category
    $('.select-category').on("change", function (e) { 
        var select_val = $(e.currentTarget).val();
            for(cat=0; cat<models.length; cat++){
                if(models[cat].category_name == select_val){
                    $(".subcategory").empty();
                    var sub_category = models[cat].children
                    if(sub_category.length>1){
                        $('.subcategory').append('<option value="">'+'Any'+'</option>');
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
            var port_list = response.port_list;
            var port_list_array= $.map(port_list, function(value, index) {
                return [[index,value]];
            });
            html = ''
            if(port_list_array){
                for(i=0; i<port_list_array.length; i++){
                    arr_str = port_list_array[i][1];
                    console.log(arr_str);
                    html +=`<option value='${JSON.stringify(port_list_array[i][1])}'>${port_list_array[i][0]}</option>`
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
            var port_list = response.port_list;
            var port_list_array= $.map(port_list, function(value, index) {
                return [[index,value]];
            });
            html = ''
            if(port_list_array){
                for(i=0; i<port_list_array.length; i++){
                    arr_str = port_list_array[i][1];
                    console.log(arr_str);
                    html +=`<option value='${JSON.stringify(port_list_array[i][1])}'>${port_list_array[i][0]}</option>`
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
    var sort_by = 'new_arriaval';
    // infinteLoadMore(page);
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
    
    $('.sort-by').on("change", function (e) { 
        e.preventDefault();
        e.stopPropagation();
        sort_by = $(e.currentTarget).val()
        $.ajax({
            url: sock_page,
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
                sort_by:sort_by,
                gear:gear,
            },
            type: "get",
        })
        .done(function (response) {
            $("#stock-list").empty();
            $("#stock-list").append(response);
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occured');
        });
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
                sort_by:sort_by,
                gear:gear,
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
            setTimeout(function(){
                $('.stock-spinner').addClass('hide')
            }, 500)
            border_object = $('.contents-border-right')
            if($(window).width() <= 1024){
                for(i=0; i<border_object.length; i++){
                    border_object.eq(i).css('display', 'block')
                    border_object.eq(3*i).css('display', 'none');
                }
            }
            if($( window ).width() <= 425){
                for(i=0; i<border_object.length; i++){  
                        border_object.eq(2*i).css('display', 'none');
                }
            }
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
    port_array = JSON.parse($('.port-pc option:selected' ).val());
    port_price = 0
    port_name = $('.port-pc option:selected' ).text(); 
    inspection_price = parseInt($('.inspection option:selected' ).val());
    insurance_price = parseInt($('.insurance option:selected' ).val()); 
    country = $('#select-country').val();
    $('.contents-list').each(function(e) {
        body_type = $(this).find('.body_type').text(); 
        for (i = 0; i < port_array.length; i++) {
            if(body_type == Object.keys(port_array[i])){
                port_price = port_array[i][body_type];
            }
        }
        total_price = parseInt($(this).find('.price').val());
        cubic_meter = $(this).find('.cubic-meter').val();
        price_shipping = port_price*cubic_meter;
        console.log(port_price)
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
// enable search icon 
$(".form-content input").on('input', function(){
    if($(this).val()){
        $('.form-content span').css({'color': '#34424e', 'cursor':'pointer'})
        $('.form-content span').addClass('search-icon');
        
        $('.form-content span').click(function(){
            $('.custom-search').closest('form').submit();
        })

    } else {
        $('.form-content span').css({'color':'#b9bfc4'})
    }
})
//   mobile calc function 
function price_calc_mobile(){
    port_price = 0;
    port_array = JSON.parse($('.port option:selected' ).val());
    port_name = $('.port option:selected' ).text(); 
    inspection_price = parseInt($('.insp-value' ).val());
    insurance_price = parseInt($('.insu-value' ).val()); 
    $('.contents-list').each(function() {
        body_type = $(this).find('.mobile-body-type').val(); 
        for (i = 0; i < port_array.length; i++) {
            console.log('body type' + body_type)
                console.log('port_array' + Object.keys(port_array[i]))
            if(body_type == Object.keys(port_array[i])){
                console.log('body type' + body_type)
                console.log('port_array' + Object.keys(port_array[i]))
                port_price = port_array[i][body_type];
            }
        }
        console.log(port_price);
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