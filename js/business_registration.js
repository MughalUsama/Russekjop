$(document).ready(function() {

  $(".chosen").chosen({
  search_contains: true,
  inherit_select_classes: true
  });


$('#breg-form').submit(function(){  
  var image_name = $('#fileToUpload').val();  
  if(image_name == '')  
  {  
       alert("Please Select Image");  
       return false;  
  }  
  else  
  {  
       var extension = $('#fileToUpload').val().split('.').pop().toLowerCase();  
       if(jQuery.inArray(extension, ['gif','png','jpg','jpeg']) == -1)  
       {  
            alert('Invalid Image File');  
            $('#fileToUpload').val('');  
            return false;  
       }  
  }
});
$('#category').chosen().on('change', function()  {
    if($('#category').val().length>0)
    {
        var cat = $('#category').val();
        displayoption();
         for(var i of cat){
          $.ajax(
              {
                  url: './api/get/getproducts.php',
                  type: 'POST',
                  dataType : 'json',
                  data: {category:i},
                  success: displayproducts,
                  error: function(err,errt){
                      console.log(errt);
                  }
              }
          );
        }  

    }
    else{
      $('#prod').empty();
      $('#prod').prop('disabled', true);
      $("#prod").trigger("chosen:updated");

    }
});

function displayoption()
{
  $('#prod').empty();

}
function displayproducts(data)
{
   for (var prod of data) {
          var item=  "<option value = \""+ prod['category_id']+ " " +
          + prod['product_id']+"\">"+prod['product_name']+"</option>";
    $('#prod').append(item);
  }
  $('#prod').prop('disabled', false);

  $("#prod").trigger("chosen:updated");

}
});
