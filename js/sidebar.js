$(document).ready(function() {
    $("#sidebar").hide();
    $("#menu").on("click",function(){
        if($("#sidebar").is(":visible")){
            $("#sidebar").hide();
        }else{
            $("#sidebar").show();
        }

    });
    $('#sidebarCollapse').on('click', function () {
        $('#sidebar').toggleClass('active');
    });
});