$('document').ready(function()
{
    /* validation */
    $("#registration_form").validate({
       
        messages:
        {
            user_email: "Enter a Valid Email",
        },
        submitHandler: submitForm
    });
    /* validation */

    /* form submit */
    function submitForm()
    {
        var data = $("#registration-form").serialize();

        $.ajax({

            type : 'POST',
            url  : 'register.php',
            data : data,
            beforeSend: function()
            {
                $("#error").fadeOut();
                $("#btn-submit").html('<span class="glyphicon glyphicon-transfer"></span> &nbsp; sending ...');
            },
            success :  function(data)
            {
                if(data==1){

                    $("#error").fadeIn(1000, function(){


                        $("#error").html('<div class="alert alert-danger"> <span class="glyphicon glyphicon-info-sign"></span> &nbsp; Sorry email already taken !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');

                    });

                }
                else if(data=="registered")
                {

                    $("#btn-submit").html('Signing Up');
                    setTimeout('$(".form-signin").fadeOut(500, function(){ $(".signin-form").load("home.php"); }); ',5000);

                }
                else{

                    $("#error").fadeIn(1000, function(){

                        $("#error").html('<div class="alert alert-danger"><span class="glyphicon glyphicon-info-sign"></span> &nbsp; '+data+' !</div>');

                        $("#btn-submit").html('<span class="glyphicon glyphicon-log-in"></span> &nbsp; Create Account');

                    });

                }
            }
        });
        return false;
    }
    /* form submit */

});