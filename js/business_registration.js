$(document).ready(function() {

  $(".chosen").chosen({
  search_contains: true,
  inherit_select_classes: true
  });

  var isVisibleSP = false;
  var isVisibleSP1 = false;

$('#breg-form').submit(function(){  
  var image_name = $('#fileToUpload').val();

  if (image_name == '')
  {  
       alert("Please Endre nyhet");  
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
      isVisibleSP = false;
      for (var i of cat) {
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
    else {
      $('#products').empty();
      $('#products').prop('disabled', true);
      $("#products").trigger("chosen:updated");

  }
  $("#subproducts-div").hide();
  $("#subproducts option").prop("selected", false);
});
  $('#products').chosen().on('change', function () {
    if ($('#products').val().length > 0) {
      var pro = $('#products').val();
      isVisibleSP1 = false;
      for (var i of pro) {

        if (i.split(" ")[1] == "136") {
          isVisibleSP1 = true;
          console.log(i);
        }
      }
      if (isVisibleSP1 == false)
      {
        $("#subproducts-div").hide();
        $("#subproducts option").prop("selected", false);

      }
      else {
        $("#subproducts-div").show();

      }
    }
    else {
      isVisibleSP1 = false;
      $("#subproducts-div").hide();
      $("#subproducts option").prop("selected", false);

    }
  });
function displayoption()
{
  $('#products').empty();

}
function displayproducts(data)
{
   for (var prod of data) {
          var item=  "<option value = \""+ prod['category_id']+ " " +
          + prod['product_id']+"\">"+prod['product_name']+"</option>";
    $('#products').append(item);
  }
  $('#products').prop('disabled', false);

  $("#products").trigger("chosen:updated");

}
});
