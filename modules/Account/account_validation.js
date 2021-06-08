

var emailRegex = "([A-Za-z0-9]+[_%+-]+[A-Za-z0-9]|[A-Za-z0-9]+)+@{1}[A-Za-z]+\.com";


$(document).ready(function() { 
    $("form").submit(function(event) {
        if(!($("#eaddress").val().match(emailRegex))){
            alert("This email address is invalid, try again")
            event.preventDefault();
            $("#confirmpword").val("");
            $("#pword").val("");
        } 
        else if($("#confirmpword").val() != $("#pword").val()){
            alert("Passwords don't match, try again");
            event.preventDefault();
            $("#confirmpword").val("");
            $("#pword").val("");
        }
        else{
            event.preventDefault();
            $.post({
                url:"process_signup.php",           
                data:{
                    eaddress: $("#eaddress").val(),
                    email_check: 1,
                },
                dataType:"text",
                success: function(response){
                    if(response == "taken"){
                        alert("This email already exists");
                        $("#confirmpword").val("");
                        $("#pword").val("");
                        return true;
                    }
                    else{
                        $("form").unbind().submit();
                        return false;
                    }
                },
                error: function(){
                    alert("There was a problem with the Ajax call!");
                    return false;
                }
            });
        }
    });
});

