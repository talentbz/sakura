$(document).ready(function () {
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

    var page = 1;
    infinteLoadMore(page);
    $('#load-more').click(function () {
        page++;
        infinteLoadMore(page);
    });
    function infinteLoadMore(page) {
        $.ajax({
                url: sock_page + "?page=" + page,
                datatype: "html",
                type: "get",
            })
            .done(function (response) {
                console.log(response.length);
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