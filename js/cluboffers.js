$(document).ready(function() {
    let b_name = [];

    $.ajax(
        {
            url: './api/get/getbname.php',
            type: 'POST',
            dataType : 'json',
            data: {bid:0},
            context: this,
            success: appbname,
            error: function(err,errt){
                console.log(errt);
            }
        });
    function appbname(data) {
        b_name = data;
        console.log(b_name);
}
    

    $("#accordionExample").show();
    $("#ar-table").hide();
    $("#acc-table").hide();

    cardno= 0;

    var data = {
        "required": "1"}
    addrequests(data);
    var getdata = {
        "required": "0"}

    function addrequests(data) {
        var data = {
            "required": "1"};
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
        }
          //creating cards with ids
        function getmsg(data) {
            let acc_count = 0
            data.forEach(function(arrayItem,i) {
            acc_count=acc_count + 1;
            var strVar = "<div class=\"accordion-item\">\n"+
            "<h2 class=\"accordion-header c-heading\" rid=\""+arrayItem["request_id"]+" id=\"heading"+acc_count+"One\">"+
            "<button class=\"accordion-button bg-danger text-white\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse"+acc_count+"\" aria-expanded=\"true\" aria-controls=\"collapse"+acc_count+"\">\n"+
            "<\/button>\n"+
            "<\/h2>\n"+
            "<div id=\"collapse"+acc_count+"\" class=\"accordion-collapse collapse\" aria-labelledby=\"heading"+acc_count+"\" data-bs-parent=\"#accordionExample\">"+
            "<div class=\"accordion-body\">\n"+
            "<div class=\"row text-left ml-1\">"+
            "                                <b>You have got the following offer:<\/b>"+
            "                            <\/div>"+
            "                            <div class=\"row text-wrap m-offer-div col-10\" rid=\""+arrayItem["request_id"]+"\" bid=\""+arrayItem["business_id"]+ "\" id=\"text-wrap offer-2\">"+
            "                                <div class=\"text-wrap offer-details mt-4\"  rid=\""+arrayItem["request_id"]+"\" bid=\""+arrayItem["business_id"]+ "\"><\/div></div> "+
            "                             <div class=\"row btn-classes col-10 justify-content-center\">  <button class = \"d-inline col-5 float-right rej-btn\" >Reject Offer<\/button>"+
            "                                <button class = \"d-inline col-5 ml-1 mr-1 float-right acc-btn\">Accept Offer<\/button>"+
            "                            <\/div>"+
            "                            <div class=\"row msg-div m-2 col-12 border-light\">"+
            "                                <textarea rows=\"5\" class=\"tarea row col-10\" rid=\""+arrayItem["request_id"]+"\" bid=\""+arrayItem["business_id"]+"\" id=\"off"+acc_count+"-msg\" placeholder=\"or Send a message back to business\"><\/textarea>"+
            "                                <div class=\"d-flex row col-10 justify-content-end\"><button class=\"col-4 ml-auto mt-1 px-4 send-btn\">Send<\/button><\/div>"+
            "                            <\/div>"+
            "<\/div>"+
            
            "<\/div>"+
            "<\/div>";
            $("#accordionExample").append(strVar);
            cardno+=1;
        });
        getmessages(getdata);


    }
        //getting data inside cards
    function getmessages(getdata) {

        $(".offer-details").each(function(i, object) {
            var rid = $(this).attr("rid");
            var bid = $(this).attr("bid");

            var data = {
                "rid": rid,
                "bid": bid,
                "required": getdata };
            
                        
                $.ajax(
                    {
                        url: './api/get/getbusinessmsg.php',
                        type: 'POST',
                        dataType : 'json',
                        data: {mdata:data},
                        context: this,
                        success: addmsgvalues,
                        error: function(err,errt){
                            console.log(errt);
                        }
                    });
            });
            }
        function addmsgvalues(data) { //printing data inside cards
            var msg = data["msg"];
            var business = data["business"];
            var pro = data["products"];
            $(this).empty();
            myvar = this;
            msg.forEach(function (arrayItem, i) {
                if (arrayItem["sentby"]=="0") {
                $(myvar).append("<p>"+arrayItem["datetime"]+"    You:    "+arrayItem["message"]+"</p>");                 
                }
                else{
                $(myvar).append("<p>"+arrayItem["datetime"]+"   "+business[i]["business_name"]+":    "+arrayItem["message"]+"</p>");                
                }
                $(myvar).closest(".collapse").siblings(".c-heading").find("button").text(pro[i]["product_name"] + " - "+business[i]["business_name"]);
                if (arrayItem["is_seen"]=="0" && arrayItem["sentby"]=="1")
                {
                    let btext = $(myvar).closest(".collapse").siblings(".c-heading").find("button").text();
                    btext = btext + '<pre>  </pre><span class="badge badge-light">New</span>';
                    $(myvar).closest(".collapse").siblings(".c-heading").find("button").empty();
                    $(myvar).closest(".collapse").siblings(".c-heading").find("button").append(btext);
                }
        });
                
        }

        $(document).on('click', '.accordion-header', function() {
            if(!$(this).find(".msg-icon").is(':empty')){
                var rid = $(this).attr("rid");
                let btext = $(myvar).closest(".collapse").siblings(".c-heading").find("button").text();
                btext = btext + '<pre>  </pre><span class="badge badge-light">New</span>';
                $(myvar).closest(".collapse").siblings(".c-heading").find("button").empty();
                $(myvar).closest(".collapse").siblings(".c-heading").find("button").append(btext);                var data = {"rid": rid};

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
        $(document).on('click','.send-btn',function(){
            var msg = $(this).parent().siblings("textarea").val();
            var rid = $(this).parent().siblings("textarea").attr("rid");
    
            var bid = $(this).parent().siblings("textarea").attr("bid");
            
            var data = {
                "msg": msg,
                "rid": rid,
                "bid": bid };
    
            $.ajax(
                {
                    url: './api/update/sendmsg.php',
                    type: 'POST',
                    dataType : 'text',
                    data: {mdata:data},
                    success: sent,
                    error: function(err,errt){
                        console.log(errt,err);
                    }
                }
            );
        $(this).parent().siblings("textarea").val("");
        function sent(data) {
            $(".offer-details").empty();
            var da = {    
        "required": "0"}
            getmessages(da);
        }
        });
        const interval = setInterval(function() {
            var da = {    
                "required": "0"};
            getmessages(da);
            }, 5000);
        $(document).on('click', '.acc-btn', function() {
            rid = $(this).parent(".btn-classes").siblings(".m-offer-div").attr("rid");
            bid = $(this).parent(".btn-classes").siblings(".m-offer-div").attr("bid");
            data = {
                "btn" :"accept",
                "rid": rid,
                "bid": bid
            }
            $.ajax(
                {
                    url: './api/update/respondoffer.php',
                    type: 'POST',
                    dataType : 'text',
                    data: {mdata:data},
                    context: this,
                    success: acceptedoffer,
                    error: function(err,errt){
                        console.log(errt);
                    }
                }
            );
        });
        function acceptedoffer(data){
            window.location.reload();
        }
        $(document).on('click', '.rej-btn', function() {
            rid = $(this).parent(".btn-classes").siblings(".m-offer-div").attr("rid");
            bid = $(this).parent(".btn-classes").siblings(".m-offer-div").attr("bid");
            data = {
                "btn" :"reject",
                "rid": rid,
                "bid": bid
  
            }
            $.ajax(
                {
                    url: './api/update/respondoffer.php',
                    type: 'POST',
                    dataType : 'text',
                    data: {mdata:data},
                    context: this,
                    success: acceptedoffer,
                    error: function(err,errt){
                        console.log(errt);
                    }
                }
            );
        });
        function acceptedoffer(data){
            window.location.reload();
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
            console.log(data);
        }

$("#all-req").on("click",function() {
    $("#all-req").addClass("bg-danger");
    $("#all-req").removeClass("text-danger")
    $("#all-req").addClass("text-white");
    $("#all-req").removeClass("bg-white");
    
    $("#acc-off").removeClass("bg-danger");
    $("#acc-off").addClass("text-danger");
    $("#acc-off").addClass("bg-white");

    $("#off-tab").removeClass("bg-danger");
    $("#off-tab").addClass("text-danger");
    $("#off-tab").addClass("bg-white");

    $("#accordionExample").hide();
    $("#ar-table").show();
    $("#acc-table").hide();
});

$("#acc-off").on("click",function() {
    $("#acc-off").addClass("bg-danger");
    $("#acc-off").removeClass("text-danger")
    $("#acc-off").addClass("text-white");
    $("#acc-off").removeClass("bg-white");

    $("#all-req").removeClass("bg-danger");
    $("#all-req").addClass("text-danger");
    $("#all-req").addClass("bg-white");

    $("#off-tab").removeClass("bg-danger");
    $("#off-tab").addClass("text-danger");
    $("#off-tab").addClass("bg-white");

    $("#accordionExample").hide();
    $("#acc-table").show();
    $("#ar-table").hide();
});


    $("#off-tab").on("click",function() {
        $("#off-tab").addClass("bg-danger");
        $("#off-tab").removeClass("text-danger")
        $("#off-tab").addClass("text-white");
        $("#off-tab").removeClass("bg-white");
        
        $("#all-req").removeClass("bg-danger");
        $("#all-req").addClass("text-danger");
        $("#all-req").addClass("bg-white");

        $("#acc-off").removeClass("bg-danger");
        $("#acc-off").addClass("text-danger");
        $("#acc-off").addClass("bg-white");

        $("#accordionExample").show();
        $("#ar-table").hide();
        $("#acc-table").hide();
        
    });




    var accepted = "0";
    var cardno = 0;
    $.ajax(
          {
              url: './api/get/getrequests.php',
              type: 'POST',
              dataType : 'json',
              data: {accepted:accepted},
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

      $("#ar-table").empty();
        req.forEach(function (arrayItem, index) {
            let downloadbtn ='';
            if(req[index]["filename"]){
                downloadbtn ='                            <p class="row col-6 justify-content-start><a href="./requestuploads/'+req[index]["filename"]+'" download><button class="col-5 btn-primary float-right py-1">Download Attachment</button></a>';

            }
            var strVar="";
                strVar += "<div class=\"card col-sm-12 col-md-12 px-0 rounded mb-2 justify-content-center\">";
                strVar += "                    <div class=\" ar-card card-header bg-dark text-white\" rid=\""+arrayItem["request_id"]+"\" data-toggle=\"collapse\" aria-expanded=\"false\" data-target=\"#arcollapse"+cardno+"\" aria-controls=\"collapse"+cardno+"\"><h5 class=\"mb-0 justify-content-between\">";
                strVar += "                        <a class=\"text-left\">";
                strVar += "                        "+prod[index]["product_name"]+" – "+club[index]["club_name"];
                strVar += "                        <\/a>";
                strVar+=  "<div class = \"ar-messages d-none\"></div>";

                strVar += "                        <i class=\"fa fa-caret-down d-inline float-right\" style=\"font-size:24px\"><\/i> <p class=\"d-inline msg-icon mr-2 float-right\" style=\"font-size:24px\"><\/p>";
                strVar += "";
                strVar += "                    <\/h5>";
                strVar += "                    <\/div>";
                strVar += "                    <div aria-labelledby=\"headingOne\" data-parent=\"#ar-table\" class=\"collapse border-top border-light\" id=\"arcollapse"+cardno+"\">";
                strVar += "                    <div class=\"card-body text-dark col-12\">";
                strVar += '                            <div class="row pl-2 text-wrap request-2">';
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
                strVar += '                            <p class="pl-4 row col-12 text-wrap">Additional Information:<br><pre class="d-inline ml-4 text-wrap">'+ arrayItem["description"]+'</pre></p>';
                if(arrayItem["created_on"]!=null){
                    strVar += '                            <p class="pl-4 row col-12">Created on:      '+ arrayItem["created_on"]+'</p>';
                }
                if(arrayItem["accepted_on"]!=null){
                    strVar += '                            <p class="pl-4 row col-12">Accepted on:      '+ arrayItem["accepted_on"]+'</p>';
                }

            strVar += downloadbtn;
            modalbtn ='<button class="col-4 ml-1 justify-content-start btn-primary float-right py-1 chat-btn" req-id="" data-toggle="modal" data-target="#newsModalCenter1">Chat History</button>';
            strVar += modalbtn;

                strVar += '                            </div><hr><div class="messages" clubid="'+club[index]["club_id"]+'" reqid="'+arrayItem["request_id"]+'"></div>';
                strVar += "                        <\/div>";
                strVar += "                    <\/div>";
                strVar += "                <\/div>";
                strVar += "";

            $("#ar-table").append(strVar);
            cardno+=1;
        });
        getmessages2();

      }
      // accepted requests
var accepted = "1";
var cardno = 0;
$.ajax(
    {
        url: './api/get/getrequests.php',
        type: 'POST',
        dataType : 'json',
        data: {accepted:accepted},
        success: successfn1,
        error: function(err,errt){
            console.log(errt);
        }
    }
);

function successfn1(data) {
cardno = 0;
var req = data["req"];
var club = data["user"];
var prod = data["product"];
var additionaldata = data["additionaldata"];
var business = data["business"];
$("#acc-table").empty();
    req.forEach(function (arrayItem, index) {
        let downloadbtn ='';
        if(req[index]["filename"]){
            downloadbtn ='<p class="row col-6 justify-content-start><a href="./requestuploads/'+req[index]["filename"]+'" download><button class="col-5 btn-primary float-right py-1">Download Attachment</button></a>';

        }
        var strVar="";
            strVar += "<div class=\"card col-sm-12 col-md-12 px-0 rounded mb-2 justify-content-center\">";
            strVar += "                    <div class=\"acc-card card-header bg-dark text-white\" rid=\""+arrayItem["request_id"]+"\" bid=\""+arrayItem["accepted_by"]+"\" data-toggle=\"collapse\" aria-expanded=\"false\" data-target=\"#acccollapse"+cardno+"\" aria-controls=\"collapse"+cardno+"\"><h5 class=\"mb-0 justify-content-between\">";
            strVar += "<div class = \"acc-messages d-none\"></div>";
            strVar += "                        <a class=\"text-left\">";
            strVar += "                        "+prod[index]["product_name"]+" – "+club[index]["club_name"];
            strVar += "                        <\/a>";
            strVar += "                        <i class=\"fa fa-caret-down d-inline float-right\" style=\"font-size:24px\"><\/i> <p class=\"d-inline msg-icon mr-2 float-right\" style=\"font-size:24px\"><\/p>";
            strVar += "";
            strVar += "                    <\/h5>";
            strVar += "                    <\/div>";
            strVar += "                    <div aria-labelledby=\"headingOne\" data-parent=\"#ar-table\" class=\"collapse border-top border-light\" id=\"acccollapse"+cardno+"\">";
            strVar += "                    <div class=\"card-body text-dark col-12\">";
            strVar += '                            <div class="row pl-2 text-wrap request-2">';
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
            strVar += '                            <p class="pl-4 row col-12">Additional Information:<br><pre class="d-inline ml-4 text-wrap">'+ arrayItem["description"]+'</pre></p>';
            if(arrayItem["created_on"]!=null){
            strVar += '                            <p class="pl-4 row col-12">Created on:      '+ arrayItem["created_on"]+'</p>';
        }
        if(arrayItem["accepted_on"]!=null){
            strVar += '                            <p class="pl-4 row col-12">Accepted on:      '+ arrayItem["accepted_on"]+'</p>';
        }
        if(arrayItem["accepted_on"]!=null){
            strVar += '                            <p class="pl-4 row col-12">Accepted By:      '+ business[index]["business_name"]+'</p>';
        }

            strVar += downloadbtn;
            modalbtn ='<button class="col-5 ml-1 justify-content-start btn-primary float-right py-1 chat-btn" req-id="" data-toggle="modal" data-target="#newsModalCenter">Chat History</button>';
            strVar += modalbtn;
            strVar += '                            </div><hr><div class="messages" clubid="'+club[index]["club_id"]+'" reqid="'+arrayItem["request_id"]+'"></div>';
            strVar += "                        <\/div>";
            strVar += "                    <\/div>";
            strVar += "                <\/div>";
        

        $("#acc-table").append(strVar);
        cardno+=1;
    });
    getdata = {
        "required": "1"} 
    getmessages1(getdata);
}

    
//getting data inside cards for accepted offers
function getmessages1(getdata) {

    $(".acc-card").each(function(i, object) {
        var rid = $(this).attr("rid");
        var bid = $(this).attr("bid");

        var data = {
            "rid": rid,
            "bid": bid,
            "required": "1" };
        
            $.ajax(
                {
                    url: './api/get/getchat.php',
                    type: 'POST',
                    dataType : 'json',
                    data: {mdata:data},
                    context: this,
                    success: addmsgvalues1,
                    error: function(err,errt){
                        console.log(errt);
                    }
                });
        });
        }
    function addmsgvalues1(data) { //printing data inside cards of accepted offers
        var msg = data["msg"];
        var business = data["business"];
        var pro = data["products"];
        myvar = $(this).find(".acc-messages");
        if (msg) {
            msg.forEach(function (arrayItem, i) {
                if (arrayItem["sentby"] == "0") {
                    $(myvar).append("<p>" + arrayItem["datetime"] + "<br>    You:    " + arrayItem["message"] + "</p>");
                }
                else {
                    $(myvar).append("<p>" + arrayItem["datetime"] + "<br>   " + business[i]["business_name"] + ":    " + arrayItem["message"] + "</p>");
                }
            });
        }
    }
        
//appending to modal    
    $(document).on('click', '.acc-card',function()
    {
        $(".m-para").empty();

        var msgs = $(this).find(".acc-messages").html();
        if(msgs=="")
        {
            msgs = "No history found.";
        }

        $(".m-para").append(msgs);

    })



    // all req messages
    function getmessages2() {

        $(".ar-card").each(function(i, object) {
            var rid = $(this).attr("rid");
            var bid = $(this).attr("bid");
    
            var data = {
                "rid": rid,
                "bid": bid,
                "required": "0" };
            
                $.ajax(
                    {
                        url: './api/get/getchat.php',
                        type: 'POST',
                        dataType : 'json',
                        data: {mdata:data},
                        context: this,
                        success: addmsgvalues2,
                        error: function(err,errt){
                            console.log(errt);
                        }
                    });
            });
            }
        function addmsgvalues2(data) { //printing data inside cards of accepted offers
            var msg = data["msg"];
            var pro = data["products"];
            myvar = $(this).find(".ar-messages");
            if (msg!=null) {
                msg.forEach(function (arrayItem, i) {
                    if (arrayItem["sentby"] == "0") {
                        $(myvar).append("<p>" + arrayItem["datetime"] + "<br>    You:    " + arrayItem["message"] + "</p>");
                    }
                    else {
                        bid = arrayItem["business_id"];
                        let bname = getBusinessName(bid);
                        $(myvar).append("<p>" + arrayItem["datetime"] + "<br>    "+bname+"    " + arrayItem["message"] + "</p>");
                     }
                 });
            }
        }
            
    //appending to modal    
        $(document).on('click', '.ar-card',function()
        {
            $(".m-para1").empty();
    
            var msgs = $(this).find(".ar-messages").html();
            if(msgs=="")
            {
                msgs = "No history found.";
            }
    
            $(".m-para1").append(msgs);
    
        })
    function getBusinessName(bid) {
        var bname_data = b_name["business"];
        for (let index = 0; index < bname_data.length; index++) {
            console.log(b_name[index]);
            if (bname_data[index]["business_id"] == ""+bid+"")
            {
                return bname_data[index]["business_name"]
            }
        }
    }
//end of doc
});

