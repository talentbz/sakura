$(document).ready(function () {
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
    
        $(".image-count").on('click', function(e) {
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
                    var host = window.location.href
                    var arr = data.data;
                            
                    arr.forEach( function(data) {
                        data['src'] = data['image'];
                        delete data['image'];
                        data.src = host +  'uploads/vehicle/' + id + '/real/'+data.src;
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

        $(".video-count").on('click', function(e) {
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
        $(".customer-title").on('click', function(e) {
            e.preventDefault();
            e.stopPropagation();
            image_path = $(this).data("id");
            $(this).lightGallery({
                dynamic: true,
                dynamicEl: [
                    {
                        src : image_path
                    },
                ],
                download: false,
                mode: 'lg-fade',
            })
        });

})