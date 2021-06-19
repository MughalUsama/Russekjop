$(document).ready(function() {
    var mail = "admin";
    var cardno = 0;
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
      cardno = 0;
      var req = data["req"];
      var club = data["user"];
      var prod = data["product"];
      var additionaldata = data["additionaldata"];

      $("#fillcards").empty();
      req.forEach(function (arrayItem, index) {
        let downloadbtn ='';
        if(req[index]["filename"]){
            downloadbtn ='                            <p class="row col-9 justify-content-end"><a href="./requestuploads/'+req[index]["filename"]+'" download><button class="btn-primary float-right">Download Attachment</button></a>';

        }
        var strVar="";
            strVar += "<div class=\"card col-sm-12 col-md-10 rounded mb-2 justify-content-center\">";
            strVar += "                    <div class=\"card-header\" rid=\""+arrayItem["request_id"]+"\" data-toggle=\"collapse\" aria-expanded=\"false\" data-target=\"#collapse"+cardno+"\" aria-controls=\"collapse"+cardno+"\"><h5 class=\"mb-0 justify-content-between\">";
            strVar += "                        <a class=\"text-left  text-dark\">";
            strVar += "                        "+prod[index]["product_name"]+"' – '"+club[index]["club_name"];
            strVar += "                        <\/a>";
            strVar += "                        <i class=\"fa fa-caret-down d-inline float-right\" style=\"font-size:24px\"><\/i> <p class=\"d-inline msg-icon mr-2 float-right\" style=\"font-size:24px\"><\/p>";
            strVar += "";
            strVar += "                    <\/h5>";
            strVar += "                    <\/div>";
            strVar += "                    <div aria-labelledby=\"headingOne\" data-parent=\"#accordionExample\" class=\"collapse border-top border-light\" id=\"collapse"+cardno+"\">";
            strVar += "                    <div class=\"card-body text-dark col-12\">";
            strVar += '                            <div class="row pl-2" id="text-wrap request-2">';
            if(arrayItem["quantity"]!=null){
                strVar += '                            <p class="pl-4 row col-12">No of '+prod[index]["product_name"]+':         '+ arrayItem["quantity"]+'</p>';
            }
            if(arrayItem["size"]!=null){
                strVar += '                            <p class="pl-4 row col-12">Size of '+prod[index]["product_name"]+':       '+ arrayItem["size"]+'</p>';
            }
            
            if(arrayItem["color"]!=null){
                strVar += '                            <p class="pl-4 row col-12">Color of '+prod[index]["product_name"]+':      '+ arrayItem["color"]+'</p>';
            }
            if(arrayItem["table_name"]!=null)
            {

                    Object.keys(additionaldata[index]).forEach(function(key) {
                        if(additionaldata[index][key]!=null && key!="request_id"){
                            strVar+='                            <p class="pl-4 row col-12">'+key+':            '+additionaldata[index][key]+'</p>';
                    
                            }
                        });
            }
            strVar += '                            <p class="pl-4 row col-12">Additional Information:<br><pre class="d-inline ml-4">'+ arrayItem["description"]+'</pre></p>';
            strVar+=downloadbtn;
            strVar += '                            </div><hr><div class="messages" clubid="'+club[index]["club_id"]+'" reqid="'+arrayItem["request_id"]+'"></div>';
            strVar += "                            <div class=\"row msg-div m-2 col-12 border-light\">";
            strVar += "                                <textarea rows=\"5\" class=\"tarea row col-10\" clubid="+club[index]["club_id"]+" reqid="+arrayItem["request_id"]+" id=\"off"+cardno+"-msg\" placeholder=\"Write your offer\"><\/textarea>";
            strVar += "                                <div class=\"d-flex row col-10 justify-conter-end\"><button class=\"ml-auto mt-1 px-4 send-btn\">Send<\/button><\/div>";
            strVar += "                            <\/div>";
            strVar += "                        <\/div>";
            strVar += "                    <\/div>";
            strVar += "                <\/div>";
            strVar += "";

        $("#fillcards").append(strVar);
        cardno+=1;

      });
      addmessages();
      }

    $(document).on('click','.send-btn',function(){
        var msg = $(this).parent().siblings("textarea").val();
        var rid = $(this).parent().siblings("textarea").attr("reqid");
        var cid = $(this).parent().siblings("textarea").attr("clubid");
        var data = {
            "msg": msg,
            "rid": rid,
            "cid": cid };

        $.ajax(
            {
                url: './api/update/sendmsg.php',
                type: 'POST',
                dataType : 'text',
                data: {mdata:data},
                success: sent,
                error: function(err,errt){
                    console.log(errt);
                }
            }
        );
    $(this).parent().siblings("textarea").val("");
    function sent(data) {
        addmessages();
    }
    });

    const interval = setInterval(function() {
        addmessages();
      }, 5000);




    function addmessages() {

        $(".messages").each(function(i, object) {
            var rid = $(this).attr("reqid");
            var cid = $(this).attr("clubid");
            var data = {
                "rid": rid,
                "cid": cid };
            $.ajax(
                {
                    url: './api/get/getbusinessmsg.php',
                    type: 'POST',
                    dataType : 'json',
                    data: {mdata:data},
                    context: this,
                    success: getmsg,
                    error: function(err,errt){
                        console.log(errt);
                    }
                });
        });
        }
        function getmsg(data) {
            var msg = data["msg"];
            var club = data["club"];
            $(this).empty();
            myvar = this;
            msg.forEach(function (arrayItem, index) {
                if (arrayItem["sentby"]=="1") {
                $(myvar).append("<pre class=\"text-wrap text-break\"> "+arrayItem["datetime"]+"    You:    "+arrayItem["message"]+"</pre>");
                }
                else{
                $(myvar).append("<pre class=\"text-wrap text-break\"> "+arrayItem["datetime"]+"   "+club[index]["club_name"]+":    "+arrayItem["message"]+"</pre>");
                }
                if (arrayItem["is_seen"]=="0" && arrayItem["sentby"]=="0")
                {
                    $(myvar).closest(".collapse").siblings(".card-header").find(".msg-icon").empty();
                    $(myvar).closest(".collapse").siblings(".card-header").find(".msg-icon").append("&#9993;");
                }
            });
        }
        $(document).on('click', '.card-header', function() {
            if(!$(this).find(".msg-icon").is(':empty')){
                var rid = $(this).attr("rid");
                $(this).find(".msg-icon").empty();
                var data = {"rid": rid};

                    $.ajax(
                        {
                            url: './api/update/updateseen.php',
                            type: 'POST',
                            dataType : 'text',
                            data: {req:data},
                            context: this,
                            success: seensuccess,
                            error: function(err,errt){
                                console.log(errt);
                            }
                        });
            }

        });
        function seensuccess(data)
        {
            var done=1;
        }
});
