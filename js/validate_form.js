$(function () {

    $("#firstName_error_message").hide();
    $("#surName_error_message").hide();
    $("#aauMail_error_message").hide();
    $("#currentProgram_error_messagee").hide();
    $("#currentSemester_error_message").hide();
    $("#password_error_message").hide();
    $("#retype_password_error_message").hide();

    var error_firstname = false;
    var error_surname = false;
    var error_aaumail = false;
    var error_program = false;
    var error_semester = false;
    var error_password = false;
    var error_retype_password = false;

    $("#firstName").focusout(function () {

        check_firstname();

    });

    $("#surName").focusout(function () {

        check_surname();

    });

    $("#aauMail").focusout(function () {

        check_aaumail();

    });

    $("#currentProgram").focusout(function () {

        check_program();

    });

    $("#currentSemester").focusout(function () {

        check_semester();

    });

    $("#userPassword").focusout(function () {

        check_password();

    });

    $("#retypePassword").focusout(function () {

        check_retype_password();

    });



    function check_firstname() {

        var firstname_length = $("#firstName").val().length;

        if (firstname_length < 1) {
            $("#firstName_error_message").html("Please write your firstname");
            $("#firstName_error_message").show();
            error_firstname = true;
        } else {
            $("#firstName_error_message").hide();
        }

    }

    function check_surname() {

        var surname_length = $("#surName").val().length;

        if (surname_length < 1) {
            $("#surName_error_message").html("Please write your lastname");
            $("#surName_error_message").show();
            error_surname = true;
        } else {
            $("#surName_error_message").hide();
        }

    }

    function check_aaumail() {

        var pattern = new RegExp(/^[A-Za-z0-9._%+-]+@student.aau.dk/i);

        if (pattern.test($("#aauMail").val())) {
            $("#aauMail_error_message").hide();
        } else {
            $("#aauMail_error_message").html("Please provide an AAU email");
            $("#aauMail_error_message").show();
            error_aaumail = true;
        }

    }

    function check_password() {

        var password_length = $("#userPassword").val().length;

        if (password_length < 8) {
            $("#password_error_message").html("At least 8 characters");
            $("#password_error_message").show();
            error_password = true;
        } else {
            $("#password_error_message").hide();
        }

    }

    function check_retype_password() {

        var password = $("#userPassword").val();
        var retype_password = $("#retypePassword").val();

        if (password != retype_password) {
            $("#retype_password_error_message").html("Passwords don't match");
            $("#retype_password_error_message").show();
            error_retype_password = true;
        } else {
            $("#retype_password_error_message").hide();
        }

    }


    $("#registration_form").submit(function () {

        error_firstname = false;
        error_surname = false;
        error_aaumail = false;
        //error_program = false;
        //error_semester = false;
        error_password = false;
        error_retype_password = false;
        

        check_firstname();
        check_surname();
        check_aaumail();
        //check_program();
        //check_semester();
        check_password();
        check_retype_password();
        

        if (error_firstname == false && error_surname == false && error_aaumail == false && error_password == false && error_retype_password == false) {
            return true;
        } else {
            return false;
        }

    });
    
});


