$(function () {

    $("#loginMail_error_message").hide();
    $("#loginPassword_error_message").hide();


    var error_loginmail = false;
    var error_loginpassword = false;

    
    $("#loginMail").focusout(function () {
        check_loginmail();
    });
    
    $("loginPassword").focusout(function () {
        check_loginpassword();
    });


    
    function check_loginmail() {

        var pattern = new RegExp(/^[A-Za-z0-9._%+-]+@student.aau.dk/i);

        if (pattern.test($("#loginMail").val())) {
            $("#loginMail_error_message").hide();
        } else {
            $("#loginMail_error_message").html("Please provide an AAU email");
            $("#loginMail_error_message").show();
            error_aaumail = true;
        }

    }

    function check_loginpassword() {

        var password_length = $("#loginPassword").val().length;

        if (password_length < 8) {
            $("#loginPassword_error_message").html("At least 8 characters");
            $("#loginPassword_error_message").show();
            error_password = true;
        } else {
            $("#loginPassword_error_message").hide();
        }

    }


    $("#login_form").submit(function () {

        error_loginmail = false;
        error_loginpassword = false;
        

        check_loginmail();
        check_loginpassword();
        

        if (error_loginmail == false && error_loginpassword == false) {
            return true;
        } else {
            return false;
        }

    });

});