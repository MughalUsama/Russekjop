$(document).ready(function() {
    var b_id = 0;
    $('.bname>u').mouseenter(function()  {
        b_id = $(this).parent(".bname").attr("currentbid");
        tippy(this, {
            content: 'Loading...', 
            allowHTML: true,            
            onShow(instance) {
                tipshow(instance);
            }
          });        

    });
    $("#search-txt").on('keyup',function(e) {
        if(e.which == 13) {
            var value = $(this).val().toLowerCase();
            $(".cname").each(function() {
                var str = $(this).text().trim().toLowerCase();            
                if(str.indexOf(value) == -1)
                {
                    $(this).closest('div').addClass("d-none");
                    $(this).closest('div').removeClass("d-flex");

                }
            })
        }
        });
        $("#search-txt").on('keydown',function(e) {
            if(!$(this).val())
            {
                $(".cname").each(function() {
                    $(this).closest('div').removeClass("d-none");
                    $(this).closest('div').addClass("d-flex");

                })
            }
        });
     function tipshow(instance) {
    $.ajax(
        {
            url: './api/get/getbusinessaccounts.php',
            type: 'POST',
            context: this,
            dataType : 'json',
            data: {bid:b_id},
            success: displayproducts,
            error: function(err,errt){
                console.log(errt);
            }
        }
    );

function displayproducts(data)
{
    var item=  "<option  val = '' selected>Velg produkt/tjeneste </option>";
    $('#prod').append(item);
    var addhtml = "<img width=\"100\" class=\"d-inline\" src=\"uploads/"+data[0]["logo_name"]+"\"><br><b>Webside: "+ data[0]["website"]+"</b><br>";
    addhtml += "<b>Telefon: "+ data[0]["telephone"]+"</b><br>";
    addhtml += "<b>Epost: "+ data[0]["business_email"]+"</b><br>";
    addhtml += "<b>Address: "+ data[0]["address"]+"</b>";
    instance.setContent(addhtml);
    instance.setProps({
        arrow: true,
        interactive: true,
    });
}
}
});