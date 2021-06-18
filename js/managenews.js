$(document).ready(function() {



    $('#addnewsform').submit(function(){  
        var image_name = $('#postimage').val();  
        if(image_name == '')  
        {  
             alert("Please Select Image");  
             return false;  
        }  
        else  
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

    $(document).on("click",".delete-news",function() {
        let news_id = $(this).attr("news-id");
        var data = {
        "news_id": news_id};
        console.log(data);

        $.ajax(
            {
                url: 'deletenews.php',
                type: 'POST',
                dataType : 'text',
                data: {mdata:data},
                context: this,
                success: deletenews,
                error: function(err,errt){
                    console.log(errt);
                }
            });
        });
    function deletenews(data){
    location.reload();
    }
});