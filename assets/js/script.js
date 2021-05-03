(function($)
{


    $('#biens').hover(function()
    {
        $('#biens>ul').stop().slideDown("slow");
    }, function(){
        $('#biens>ul').stop().slideUp("slow");
    });

})(jQuery);