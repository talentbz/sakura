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
    border_object = $('.contents-border-right');
    if($( window ).width() <= 1024){
        border_object.css('display', 'block')
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

    var _token = $('input[name="_token"]').val();
    // load_data('', _token);

    // function load_data(id="", _token){
    //     $.ajax({
    //         url:sock_page,
    //         method:"POST",
    //         data:{id:id, _token:_token},
    //         success:function(data)
    //         {
    //             console.log(data);
    //             $('#load_more_button').remove();
    //             $('#stock-contents').html(data);
    //             $('#stock-list').append(data);
    //         }
    //     })
    // }

    // $(document).on('click', '#load_more_button', function(){
    //     var id = $(this).data('id');
    //     $('#load_more_button').html('<b>Loading...</b>');
    //     load_data(id, _token);
    // });
    var page = 1;
    infinteLoadMore(page);
    $(document).on('click', '#load_more_button', function(){
        $('#load_more_button').html('<b>Loading...</b>');
        page++;
        infinteLoadMore(page);
    });
   
    
    console.log(body_type);
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
        })
        .fail(function (jqXHR, ajaxOptions, thrownError) {
            console.log('Server error occured');
        });
    }
})