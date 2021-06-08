//Logout function


$(document).ready(function(){
$("#logout-btn").click(function(){
$.ajax({
    url: "../index.php",
    data: {logout_pressed : true},
    type: "POST",
    dataType: "text",
    success: function(data){
        window.location.replace("../index.php"); 
    },
    error: function(){
        alert("Logout failed");
    }
})})});
 





