$(document).ready(function() {
    var win = $(this);
    function showLine(){
        let dleft = $(".bimage").offset().left - 1;
        let dtop = $(".bottom-images").offset().top;
        let dheight = $(".bottom-images").outerHeight();
        dheight = dheight-(dheight*20/100);
        dtop = dtop+(dheight*15/100)
        $(".divider").offset({top:dtop , left:dleft});
        $(".divider").height(dheight);
    }
    $(window).on('resize', function(){
        if (win.width() >= 768){
            showLine();
        }
    });
    $(window).on("load", function() {
        showLine();
    });
});