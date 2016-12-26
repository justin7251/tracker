
var SignUp = {
    validate: function () {
        var validate = true;
        $('.required').each(function (){
            if($(this).val() == '') {
                $(this).parent('.controls').addClass('has-error');
                $(this).parent('.controls').find('.help-block').show();
                validate = false;
            } else {
                $(this).parent().removeClass('has-error');
                $(this).parent('.controls').find('.help-block').hide();
            }
        });
        
        if (validate == false) {
            alert('xxx');
            return false;
        }

        console.log($("#password").val());
        console.log($("#repeatPassword").val());
        if ($("#password").val() != $("#repeatPassword").val()) {
            return false;
        } 

        $("#registerForm")[0].submit();
    }
}

$(document).ready(function () {
    $("#registerForm .help-block").hide();
});