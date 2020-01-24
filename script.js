$(document).ready(function(){
    $("#form-registr").validate({
        rules:{
            login:{
                required: true,
                minlength: 4,
            },
            password:{
                required: true,
                minlength: 6,
            },
            confirm_password:{
                required: true,
                minlength: 6,
                equalTo:"#password",
            },
            email:{
                email: true,
                required: true,
                minlength: 6,
            },
            name:{
                required: true,
                minlength: 2,
            },
        },
        messages:{
            login:{
                required: "Это поле обязательно для заполнения",
                minlength: "Логин должен быть минимум 4 символа",
            },
            password:{
                required: "Это поле обязательно для заполнения",
                minlength: "Пароль должен быть минимум 6 символа",
            },
            confirm_password:{
                required: "Это поле обязательно для заполнения",
                minlength: "Пароль должен быть минимум 6 символа",
                equalTo: "пароли не совпадают",
            },
            email:{
                email: "Некорректный e-mail адрес",
                required: "Это поле обязательно для заполнения",
                minlength: "Пароль должен быть минимум 6 символа",
            },
            name:{
                required: "Это поле обязательно для заполнения",
                minlength: "Пароль должен быть минимум 2 символа",
            },
        },
        submitHandler: function(form) {
            var login = $('#form-registr input[name="login"]').val();
            var password = $('#form-registr input[name="password"]').val();
            var email = $('#form-registr input[name="email"]').val();
            var name = $('#form-registr input[name="name"]').val();

            $.ajax({
                url: '/index.php/',
                type: 'post',
                data: { "name": name,
                    "email": email,
                    "password": password,
                    "login-reg": login,
                },
                success: function(data){

                    if(data.length > 0) {

                        var data = JSON.parse(data);
                        if(data.error.login != null) {
                            $('#form-registr input[name="login"]').parent().append('<label id="login-error" class="error">Этот Логин уже занят</label>');
                            $('#form-registr input[name="login"]').addClass("error");
                        }
                        if(data.error.email != null) {
                            $('#form-registr input[name="email"]').parent().append('<label id="login-error" class="error">Этот E-mail уже занят</label>');
                            $('#form-registr input[name="email"]').addClass("error");
                        }
                    }
                    else {

                        $('.register').hide("2000");
                        $('.modal').show("2000");
                        $("#form-registr")[0].reset();
                    }
                }

            });
        }
    });

    $("#form-aut").validate({
        rules:{
            login:{
                required: true,
            },
            password:{
                required: true,
            },
        },
        messages:{
            login:{
                required: "Это поле обязательно для заполнения",
            },
            password:{
                required: "Это поле обязательно для заполнения",
            },
        },
        submitHandler: function(form) {
            var login = $('#form-aut input[name="login"]').val();
            var password = $('#form-aut input[name="password"]').val();


            $.ajax({
                url: '/index.php/',
                type: 'post',
                data: {"password": password,
                    "login": login,
                },
                success: function(data){
                    console.log(data);
                    if(data.length > 0) {
                        var data = JSON.parse(data);

                        if(data.error != null) {
                            $('#form-aut').append('<label id="login-error">'+data.error+'</label>');
                        }
                    }
                    else {
                        location.reload(true);
                    }

                }

            });
        }
    });

    $(".link").click(function(){
        var value = $(this).attr("data-filter");

            $(".filter").not("."+value).hide("2000");
            $(".filter").filter("."+value).show("2000");

        $(this).siblings().removeClass('active');
        $(this).addClass('active');
    })

    $('.links').click(function() {

        $(this).parent().hide("2000");
        $('.register').hide("2000");
        $('.link[data-filter="aut"]').addClass('active').show("2000");
        $('.link[data-filter="register"]').removeClass('active');
        $('.aut').show("2000");

    })

    $('.exit').click(function() {
        console.log(1);
        $.ajax({
            url: '/index.php/',
            type: 'post',
            data: {"exit": true},

            success: function(data){

                console.log(2);

                location.reload(true);

            }
        });
    })

});