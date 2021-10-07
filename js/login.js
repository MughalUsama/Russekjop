$(document).ready(function() {
    if($("#errormsg").hasClass("error")){
    $.notify.defaults({globalPosition: 'bottom right'});
    $.notify("Wrong Credentials", "error");
    }

    $("#reset-btn").on('click', function() {
        var mail = $("#useremail").val();
        if(!mail)
        {
            alert("Please enter in required field");
        }
        else{
            $.ajax(
                {
                    url: './api/update/mail.php',
                    type: 'POST',
                    dataType : 'json',
                    data: {email:mail},
                    success: successfn,
                    error: function(err,errt){
                        console.log(errt);
                    }
                }
            );
        }
    })
    function successfn(data) {
        console.log("OK.")
    }

    $("#nextpass-btn").on('click', function() {
        var rcode = $("#resetcode").val();
        if(!rcode)
        {
            alert("Please enter in required field");
        }
        else{
            $.ajax(
                {
                    url: './api/update/resetcode.php',
                    type: 'POST',
                    dataType : 'text',
                    data: {code:rcode},
                    success: newpass,
                    error: function(err,errt){
                        console.log(errt);
                    }
                }
            );
        }
        function newpass(data) {
            if (data == "OK") {
                $("#newpassmodal").modal("show");                
            }
            else{
                alert("Feil reset-kode. Prøv igjen");
            }
        }
    })

    $("#change-btn").on('click', function() {
        var passwd = $("#newpass").val();
        if(!passwd)
        {
            alert("Please enter in required field");
        }
        else{
            $.ajax(
                {
                    url: './api/update/changepassword.php',
                    type: 'POST',
                    dataType : 'text',
                    data: {password:passwd},
                    success: changed,
                    error: function(err,errt){
                        console.log(errt);
                    }
                }
            );
    }
    })
    function changed(data) {
        if (data == "OK") {
           alert("Password changed successfully!");                
       }
       else{
           alert("Password update failed. Please try again.");
       }
   }


});
