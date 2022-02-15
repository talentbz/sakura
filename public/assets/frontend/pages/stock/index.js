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
        for(i=0; i<border_object.length; i++){
            if(i==0){
                border_object.eq(i).css('display', 'none')    
            } else{
                border_object.eq(3*i).css('display', 'none');
            }
        }
    }
})