define([
    'jquery',
], function($){
    return function (config){
        var ajaxUrl = config.ajaxUrl;
        $("#sendZipButton").on("click",function (event){
            $(".zip-code-check .form-control .zipcodeInput-error").css("display", "none");
            $("#zipcode_return_data").html('');
            event.preventDefault();
            zipcode = $("#zipcodeInput").val();
            if(zipcode){
                $.ajax({
                    showLoader: true,
                    url: ajaxUrl,
                    data: {
                        zipcode : zipcode
                    },
                    type: "POST"
                }).done(function (data) {
                    if (data.cod_text) {
                        $("#zipcode_return_data").html('<div class="message '+data.ship_type+'"><p>'+data.ship_text+'</p></div><div class="message '+data.cod_type+'"><p>'+data.cod_text+'</p></div>');
                    }else{
                        $("#zipcode_return_data").html('<div class="message '+data.ship_type+'"><p>'+data.ship_text+'</p></div>');
                    }
                });
            }else{
                $(".zip-code-check .form-control .zipcodeInput-error").css("display", "block");
            }
        });
    }
});
