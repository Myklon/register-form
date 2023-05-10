$(document).ready(function() {

    let request;

    $('#register-form').submit(function(event) {
        event.preventDefault();
        let firstname = $('#firstname').val();
        let lastname = $('#lastname').val();
        let email = $('#email').val();
        let password = $('#password').val();
        let repeat_password = $('#repeat_password').val();

        if(request) {
            request.abort();
        }

        request = $.ajax({
            url: 'register.php',
            type: 'post',
            data: {
                firstname: firstname,
                lastname: lastname,
                email: email,
                password: password,
                repeat_password: repeat_password
            },
            success: function(response) {
                response = JSON.parse(response);
                console.log(response.error)
                if('error' in response) {
                    $('.error-message').show();
                    $('#message').html(response.error);
                }
                else {
                    $('.error-message').hide();
                    $('#register-form').hide();
                    $('#result').html('Вход успешно выполнен');
                }  
            }
        });
    });
});