$(document).ready(function() {

  $(".chosen").chosen({
  search_contains: true,
  inherit_select_classes: true
  });

  var isVisibleSP = false;
  var isVisibleSP1 = false;

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
      $('#prod').empty();
      $('#prod').prop('disabled', true);
      $("#prod").trigger("chosen:updated");

  }
  $("#subproducts-div").hide();
  $("#prod option").prop("selected", false);
});
  $('#prod').chosen().on('change', function () {
    if ($('#prod').val().length > 0) {
      var pro = $('#prod').val();
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
        $("#prod option").prop("selected", false);

      }
      else {
        $("#subproducts-div").show();

      }
    }
    else {
      isVisibleSP1 = false;
      $("#subproducts-div").hide();
      $("#prod option").prop("selected", false);

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
