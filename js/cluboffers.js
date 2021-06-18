$(document).ready(function() {
    

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
            "<button class=\"accordion-button bg-danger\" type=\"button\" data-bs-toggle=\"collapse\" data-bs-target=\"#collapse"+acc_count+"\" aria-expanded=\"true\" aria-controls=\"collapse"+acc_count+"\">\n"+
            " \n"+
            "<\/button>\n"+
            "<\/h2>\n"+
            "<div id=\"collapse"+acc_count+"\" class=\"accordion-collapse collapse show\" aria-labelledby=\"heading"+acc_count+"\" data-bs-parent=\"#accordionExample\">"+
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
            // var strVar="";
            // strVar += "<div class=\"card col-xs-12 col-md-10 rounded mb-2 justify-content-center\">";
            // strVar += "                    <div class=\"card-header\" rid=\""+arrayItem["request_id"]+"\" data-toggle=\"collapse\" aria-expanded=\"false\" data-target=\"#collapse"+cardno+"\" aria-controls=\"collapse"+cardno+"\"><h5 class=\"mb-0 justify-content-between\">";
            // strVar += "                        <a class=\"text-left c-heading text-dark\">";
            // strVar += "                        [Product] – (partners name)";
            // strVar += "                        <\/a>";
            // strVar += "                        <i class=\"fa fa-caret-down d-inline float-right\" style=\"font-size:24px\"><\/i><p class=\"d-inline msg-icon mr-2 float-right\" style=\"font-size:24px\"><\/p>";
            // strVar += "";
            // strVar += "                    <\/h5>";
            // strVar += "                    <\/div>";
            // strVar += "                    <div aria-labelledby=\"headingOne\" data-parent=\"#accordionExample\" class=\"collapse border-top border-light\" id=\"collapse"+cardno+"\">";
            // strVar += "                    <div class=\"card-body col-12\">";
            // strVar += "                            <div class=\"row text-left ml-1\">";
            // strVar += "                                <b>You have got the following offer:<\/b>";
            // strVar += "                            <\/div>";
            // strVar += "                            <div class=\"row text-wrap m-offer-div col-10\" rid=\""+arrayItem["request_id"]+"\" bid=\""+arrayItem["business_id"]+ "\" id=\"text-wrap offer-2\">";
            // strVar += "                                <div class=\"text-wrap offer-details mt-4\"  rid=\""+arrayItem["request_id"]+"\" bid=\""+arrayItem["business_id"]+ "\"><\/div></div> ";
            // strVar += "                             <div class=\"row btn-classes col-10\">  <button class = \"d-inline ml-auto float-right rej-btn\" >Reject Offer<\/button>";
            // strVar += "                                <button class = \"d-inline ml-1 mr-1 float-right acc-btn\">Accept Offer<\/button>";
            // strVar += "                            <\/div>";
            // strVar += "                            <div class=\"row msg-div m-2 col-12 border-light\">";
            // strVar += "                                <textarea rows=\"5\" class=\"tarea row col-10\" rid=\""+arrayItem["request_id"]+"\" bid=\""+arrayItem["business_id"]+"\" id=\"off1-msg\" placeholder=\"or Send a message back to business\"><\/textarea>";
            // strVar += "                                <div class=\"d-flex row col-10 justify-conter-end\"><button class=\"ml-auto mt-1 px-4 send-btn\">Send<\/button><\/div>";
            // strVar += "                            <\/div>";
            // strVar += "                        <\/div>";
            // strVar += "                    <\/div>";
            // strVar += "                <\/div>";
            // strVar += "";

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
        });
                
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
                    url: './api/sendmsg.php',
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
                    url: 'respondoffer.php',
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
                    url: 'respondoffer.php',
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







    });

