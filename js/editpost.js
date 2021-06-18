$(document).ready(function() {



    $('#updatenewsform').submit(function(){  
        var image_name = $('#postimage').val();  
        if(image_name != '')  
        {  
             var extension = $('#postimage').val().split('.').pop().toLowerCase();  
             if(jQuery.inArray(extension, ['gif','png','jpg','jpeg','jpeg']) == -1)  
             {  
                  alert('Invalid Image File');  
                  $('#postimage').val('');  
                  return false;  
             }  
        }  
    });
    
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();
            
            reader.onload = function (e) {
                $("table").attr("CELLPADDING","0");
                $('#news-img').removeClass("d-none");
                $('#news-img').attr('src', e.target.result);
            }
            
            reader.readAsDataURL(input.files[0]);
        }
    }
  
    $("#postimage").change(function(){
        readURL(this);
    });
});