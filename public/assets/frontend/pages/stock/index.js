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
    $('#select-country').on("change", function (e) { 
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
                html +='<option value="0"></option>'
            } 
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
    

    var _token = $('input[name="_token"]').val();
    var page = 1;
    infinteLoadMore(page);
    $(document).on('click', '#load_more_button', function(){
        $('#load_more_button').html('<b>Loading...</b>');
        page++;
        infinteLoadMore(page);
    });
   
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
    $(document).on('click', '#price-calc', function(){       
        price_calc();
    })


    /* 
        pc price calculator
    */
   function price_calc(){
        port_price = parseInt($('.port-pc option:selected' ).val()); 
        port_name = $('.port-pc option:selected' ).text(); 
        inspection_price = parseInt($('.inspection option:selected' ).val());
        insurance_price = parseInt($('.insurance option:selected' ).val()); 
        $('.stock-price-list').each(function() {
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
            if(final_price == '$NaN') {
                final_price ='ASK'
            }
            $(this).find('.cif').text(cif);
            $(this).find('.port').text(port_name);
            $(this).find('.totla-value').text(final_price);
        })
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
   //   mobile calc function
   function price_calc_mobile(){
    port_price = parseInt($('.port option:selected' ).val()); 
    port_name = $('.port option:selected' ).text(); 
    inspection_price = parseInt($('.insp-value' ).val());
    insurance_price = parseInt($('.insu-value' ).val()); 
    $('.stock-price-list').each(function() {
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
        $(this).find('.cif').text(cif);
        $(this).find('.port').text(port_name);
        $(this).find('.totla-value').text(final_price);
    })
}
})

border_object = $('.contents-border-right');
console.log(border_object)
if($(window).width() <= 1024){
    console.log(border_object)
    for(i=0; i<border_object.length; i++){
        border_object.eq(3*i).css('display', 'none');
    }
}
if($( window ).width() <= 425){
    border_object.css('display', 'block')
    for(i=0; i<border_object.length; i++){  
            console.log((2*i));
            border_object.eq(2*i).css('display', 'none');
    }
}