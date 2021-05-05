(function($)
{


    $('#biens').on('click',function()
    {
        
        $('#biens>ul').slideDown();
        
    });
    // $('#biens').mouseover(function()
    // {
    //     $('#biens>li').show();

    // });
    $('#biens').mouseout(function()
    {
        $('#biens>li').hide();
    });


})(jQuery);