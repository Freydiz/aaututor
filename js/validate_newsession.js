// Validation of the form to create sessions

$(function () {

    $("#sessName_error_message").hide();
    $("#dateTime_error_message").hide();
    $("#time_error_message").hide();
    $("#desc_error_messagee").hide();
    $("#studMail_error_message").hide();
    $("#fee_error_message").hide();

    var error_sessName = false;
    var error_dateTime = false;
    var error_time = false;
    var error_desc = false;
    var error_studMail = false;
    var error_fee = false;

    $("#sessName").focusout(function () {

        check_sessName();

    });

    $("#sessStart").focusout(function () {

        check_dateTime();

    });

    $("#duration").focusout(function () {

        check_time();

    });

    $("#sessDesc").focusout(function () {

        check_desc();

    });

    $("#sessStudent").focusout(function () {

        check_studMail();

    });

    $("#sessFee").focusout(function () {

        check_fee();

    });



    function check_sessName() {

        var sessname_length = $("#sessName").val().length;

        if (sessname_length < 1) {
            $("#sessName_error_message").html("Please give a title to the session");
            $("#sessName_error_message").show();
            error_sessName = true;
        } else {
            $("#sessName_error_message").hide();
        }

    }

    function check_dateTime() {

        var datetime_length = $("#sessStart").val().length;

        if (datetime_length < 1) {
            $("#sessStart_error_message").html("Please select a date and time for the session");
            $("#sessStart_error_message").show();
            error_dateTime = true;
        } else {
            $("#sessStart_error_message").hide();
        }

    }

    function check_time() {

        var time_length = $("#duration").val().length;

        if (time_length < 1) {
            $("#time_error_message").html("Please select the duration of the session");
            $("#time_error_message").show();
            error_dateTime = true;
        } else {
            $("#time_error_message").hide();
        }

    }

    function check_desc() {

        var time_length = $("#sessDesc").val().length;

        if (time_length < 1) {
            $("#desc_error_message").html("Please write a description for the session");
            $("#desc_error_message").show();
            error_time = true;
        } else {
            $("#desc_error_message").hide();
        }

    }

    function check_studMail() {

        var pattern = new RegExp(/^[A-Za-z0-9._%+-]+@student.aau.dk/i);

        if (pattern.test($("#sessStudent").val())) {
            $("#studMail_error_message").hide();
        } else {
            $("#studMail_error_message").html("Please provide an AAU email");
            $("#studMail_error_message").show();
            error_studMail = true;
        }

    }

     function check_fee() {

        var time_length = $("#sessfee").val().length;

        if (time_length < 1) {
            $("#fee_error_message").html("Please insert a fee value for this session");
            $("#fee_error_message").show();
            error_time = true;
        } else {
            $("#fee_error_message").hide();
        }

    }




    $("#createSess_form").submit(function () {

        error_sessName = false;
        error_dateTime = false;
        error_time = false;
        error_desc = false;
        error_studMail = false;
        error_fee = false;


        check_sessName();
        check_dateTime();
        check_time();
        check_desc();
        check_studMail();
        check_fee();


        if (error_sessName == false && error_dateTime == false && error_time == false && error_desc == false && error_studMail == false && error_fee == false) {
            return true;
        } else {
            return false;
        }

    });

});
