$(document).ready(function() {



function showmsg(message,state) {
    $.notify.defaults({globalPosition: 'bottom right'});
    $.notify(message, state);    
}
    if($("#errormsg").hasClass("error")){
        showmsg("Email already in use!", "error");
    }
    if($("#errormsg").hasClass("signedup")){
        showmsg("Successfully Signed Up!","success");
    }

    $("#reg-form").submit(function(event){
        var passwd = $('#password').val();
        var cpasswd = $('#confirmpassword').val();
        console.log(passwd);
        if(passwd==cpasswd){
            return true;
        }
        else{
            showerror("Password does not match");
            return false;        
        }
    });

});