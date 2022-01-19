$(function () {

    $('.close').click(function() {

        $('.alert').fadeOut(200);
        
    });

    var userError = true,
        emailError = true,
        msgError = true;

        function checkError() {
            if(userError === true || emailError === true || msgError === true) {

                console.log("error");
            }
            else {
                console.log("valid");
            }
        }

        checkError();

    $(".userName").blur(function() {

        if($(this).val().length <= 3) {

            $(this).css("border", "1px solid red");

            // $(".mmm .custom-alert").fadeIn(200);
            $(this).parent().find(".custom-alert").fadeIn(200);

            $(this).parent().find(".astrix").fadeIn(200);

            userError = true;
    
        }
        else {

            $(this).css("border", "1px solid #ced4da");

            $(this).parent().find(".custom-alert").fadeOut(200);

            $(this).parent().find(".astrix").fadeOut(200);

            userError = false;
        }

        checkError();
    });

    $(".email").blur(function() {

        if($(this).val() === "") {

            $(this).css("border", "1px solid red");

            $(this).parent().find(".custom-alert").fadeIn(200);

            $(this).parent().find(".astrix").fadeIn(200);

            emailError = true;
    
        }
        else {

            $(this).css("border", "1px solid #ced4da");

            $(this).parent().find(".custom-alert").fadeOut(200);

            $(this).parent().find(".astrix").fadeOut(200);

            emailError = false;
        }

        checkError();
    });

    $(".msge").blur(function() {

        if($(this).val().length <= 10) {

            $(this).css("border", "1px solid red");

            $(this).parent().find(".custom-alert").fadeIn(200);

            $(this).parent().find(".astrix").fadeIn(200);

            msgError = true;
    
        }
        else {

            $(this).css("border", "1px solid #ced4da");

            $(this).parent().find(".custom-alert").fadeOut(200);

            $(this).parent().find(".astrix").fadeOut(200);

            msgError = false;
        }

        checkError();
    });

    $(".cont-form").submit(function(e) {

        if(userError === true || emailError === true || msgError === true) {

            e.preventDefault();

            $(".userName, .email, .msge").blur();

        }
    });

    
});


