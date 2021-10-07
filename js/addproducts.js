$(document).ready(function() {

    $('#remcategory').on('change', function()  {
        if($('#remcategory').val()!=-1)
        {
            var cat = $('#remcategory').val();
            var sportsname = $('#sports2').val();

            $.ajax(
                {
                    url: './api/get/getproducts.php',
                    type: 'POST',
                    dataType : 'json',
                    data: {category:cat, sports:sportsname},
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
        $('#prod').empty();
        var item=  "<option  val = '' selected>Velg produkt/tjeneste </option>";
        $('#prod').append(item);

        for (var prod of data) {
            var item=  "<option value = \""
            + prod['product_id']+"\">"+prod['product_name']+"</option>";
			$('#prod').append(item);
		}
    }
    function showmsg(message,state) {
        $.notify.defaults({globalPosition: 'bottom right'});
        $.notify(message, state);    
    }
        if($("#errormsg").hasClass("prexists")){
            showmsg("Product does not exist!", "error");
        }
        if($("#errormsg").hasClass("crexists")){
            showmsg("Category does not exist!", "error");
        }
        if($("#errormsg").hasClass("asuccess")){
            showmsg("Added Successfully!","success");
        }
        if($("#errormsg").hasClass("rsuccess")){
            showmsg("Removed Successfully!","success");
        }
        if($("#errormsg").hasClass("caexists")){
            showmsg("Already Exists!","error");
        }
        if($("#errormsg").hasClass("paexists")){
            showmsg("Already Exists!","error");
        }

    
});