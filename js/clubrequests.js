$(document).ready(function() {
      var mail = "admin";
        $.ajax(
            {
                url: './api/get/getrequests.php',
                type: 'POST',
                dataType : 'json',
                data: {admin:mail},
                success: successfn,
                error: function(err,errt){
                    console.log(errt);
                }
            }
        );
            
    function successfn(data) {
        var cardno = 0;
        var req = data["req"];
        var club = data["user"];
        var prod = data["product"];
        var additionaldata = data["additionaldata"];
        $("#fillcards").empty();
        req.forEach(function (arrayItem, index) {
            var cards = '<div class="card col-12 rounded mb-2 justify-content-center bg-danger">'+
                '                    <div class="card-header" data-toggle="collapse" aria-expanded="false" data-target="#collapse'+cardno+'" aria-controls="collapse'+cardno+'"><h5 class="mb-0 justify-content-between">'+
                '                        <a class="text-left text-white">'+
                '                        '+prod[index]["product_name"]+' – '+club[index]["club_name"]+
                '                        </a>'+
                '                        <i class="fa fa-caret-down d-inline float-right" style="font-size:24px"></i>'+
                ''+
                '                    </h5>'+
                '                    </div>'+
                '                    <div aria-labelledby="headingOne" data-parent="#accordionExample" class="collapse border-top border-light" id="collapse'+cardno+'">'+
                '                    <div class="card-body col-12 text-white">'+
                '                            <div class="row pl-2" id="text-wrap request-2">';
                if(arrayItem["quantity"]!=null){
                    cards+='                            <p class="pl-4 row col-12">No of '+prod[index]["product_name"]+':            '+ arrayItem["quantity"]+'</p>';
                }
                if(arrayItem["size"]!=null){
                cards+='                            <p class="pl-4 row col-12">Size of '+prod[index]["product_name"]+':            '+arrayItem["size"]+'</p>';
                }
                if(arrayItem["color"]!=null){
                cards+='                            <p class="pl-4 row col-12">Color of '+prod[index]["product_name"]+':            '+arrayItem["color"]+'</p>';
                }
                if(arrayItem["table_name"]!=null)
                {

                        Object.keys(additionaldata[index]).forEach(function(key) {
                            if(additionaldata[index][key]!=null && key!="request_id"){
                                cards+='                            <p class="pl-4 row col-12">'+key+':            '+additionaldata[index][key]+'</p>';
                        
                                }
                            });
                }

                if(arrayItem["description"]!=null){
                cards+='                            <p class="pl-4 row col-12">Tilleggsinformasjon:            '+ arrayItem["description"]+'</p>';
                }
                cards+='                            </div>'+
                '                        </div>'+
                '                    </div>'+
                '                </div>';
            $("#fillcards").append(cards);
            cardno+=1;
        });
        }



});