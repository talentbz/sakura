$(document).ready(function () {
    $("#input-24").fileinput({
        deleteExtraData: function() {
            return {
                _token: $("input[name='_token']").val(),
            };
        },
        
        overwriteInitial: false,
        validateInitialCount: true,
        maxFileCount: 50,
        showBrowse: false,
        browseOnZoneClick: true,
    });
})