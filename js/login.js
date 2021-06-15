$(document).ready(function() {
    if($("#errormsg").hasClass("error")){
    $.notify.defaults({globalPosition: 'bottom right'});
    $.notify("Wrong Credentials", "error");
    }
});
