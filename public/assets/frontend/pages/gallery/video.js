$(document).ready(function(){

    $('.page-content').on('click', '.pagination a', function(event){
        event.preventDefault(); 
        var page = $(this).attr('href').split('page=')[1];
        fetch_data(page);
    });

    function fetch_data(page)
    {
        $.ajax({
        url:"/gallery/video/fetch_data?page="+page,
        success:function(data) {
            $('.page-content').html(data);
        }
        });
    }

});