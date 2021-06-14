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
//----------
$('#Category').on('change', function()  {
    if($('#Category').val()!="")
    {
        var cat = $('#Category').val();
        $.ajax(
            {
                url: './api/get/getproducts.php',
                type: 'POST',
                dataType : 'json',
                data: {category:cat},
                success: displayproducts,
                error: function(err,errt){
                    console.log(errt);
                }
            }
        );
    }
});

function displayproducts(data)
{
    $('#Product').empty();
    var item=  "<option  val = '' selected>Choose Product / Service </option>";
    $('#Product').append(item);

    for (var prod of data) {
        var item=  "<option value = \""
        + prod['product_id']+"\">"+prod['product_name']+"</option>";
        $('#Product').append(item);
    }
}
// -----------------products update ends



//document end
});

