$(document).ready(function() {

    function loaduserdata() {
        $.ajax(
                {
                    url: './api/get/getbusinessaccounts.php',
                    type: 'POST',
                    dataType : 'json',
                    data: {display:"yes"},
                    success: displayaccounts,
                    error: function(err,errt){
                        console.log(errt);
                    }
                });
    }
    function displayaccounts(data)
        {
            $("#table-body").empty();
            data.forEach(function (arrayItem) {
                var row = '<tr class = "myrow" id='+arrayItem["business_id"]+'>'+
                '          <th scope="row">1</th>'+
                '               <td>'+arrayItem["business_name"]+'</td>'+
                '               <td>'+arrayItem["email"]+'</td>'+
                '               <td class="bg-warning text-center edituser text-white">Endre</td>'+
                '               <td class="bg-danger text-center deleteuser text-white">Slett</td>'+
                '          </tr></form>';
                $("#table-body").append(row);
            });
        }

    loaduserdata();
    $(document).on("click",".edituser",function() {
        var id = $(this).parent().attr("id");
        window.location = "./editbusiness.php?bid="+id;
    })
    var buid=0;
    $(document).on("click",".deleteuser",function() {
        buid = $(this).parent().attr("id");
        $("#exampleModalScrollable0").modal('show');
    });
    $("#delete-business").on("click",function()
    {
        $.ajax(
            {
                url: './api/delete/deletebusinessaccounts.php',
                type: 'POST',
                dataType : 'json',
                data: {bid:buid},
                success: loaduserdata,
                error: function(err,errt){
                    console.log(errt);
                }
            });
    });
});