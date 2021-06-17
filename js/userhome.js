$(document).ready(function() {
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
    var item=  "<option  value = '' selected>Choose Product / Service </option>";
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

