//todo

$(document).ready(function() {
    $('[data-toggle="tooltip"]').tooltip();
    
    $(document).on('click', '.news-start',function()
    {
        var imgsrc = $(this).find("img").attr("src");
        var hdline = $(this).find("h5").text();
        if(hdline=="")
        {
            hdline = $(this).find("h3").text();
        }

        var para = $(this).find("pre").html();
        if(imgsrc.split(".")[1]=="png")
        {
            $(".modal-body").find("img").addClass("bg-white");
        }
        $(".modal-body").find("img").attr("src", imgsrc);
        $(".modal-body").find("pre").html(para);
        $(".modal-body").find("h3").html(hdline);

    })


});