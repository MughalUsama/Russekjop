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

$("select#Product").change(function () {
    var selectedVal = $(this).children("option:selected").val();
    if (selectedVal == "136")
    {
        $("#subproduct-div").show();
        }
    else {
        $("#subproduct-div").hide();
        }
    });
    //hide subcategory
    $("select#Category").change(function () {
        var selectedVal1 = $(this).children("option:selected").val();
        if (selectedVal1 != "29") {
            $("#subproduct-div").hide();
        }
    });

//document end
});

