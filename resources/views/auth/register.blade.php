<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"
    integrity="sha384-T3c6CoIi6uLrA9TneNEoa7RxnatzjcDSCmG1MXxSR1GAsXEV/Dwwykc2MPK8M2HN" crossorigin="anonymous">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
    integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
    crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="{{asset('/css/auth.css') }}">
<meta name="csrf-token" content="{{ csrf_token() }}" />

</head>
<body>
    <div class="main">
        <form class="me-auto"  id="register">
            <h2 class="header_logo">Register</h2>
            <label for="account">
                <span>Email</span>
                <input type="text" id="account" class="mt-2">
                <div class="errEmail"></div>
            </label>
            <label for="name_user">
                <span>Tên Người Dùng</span>
                <input type="text" id="name_user" class="mt-2">
                <div class="errName"></div>
            </label>
            <label for="password" class="mt-3">
                <span>Mật Khẩu</span>
                <input type="text" id="password" class="mt-2">
                <div class="errpsw"></div>

            </label>
            <label for="comfirm" class="mt-3 mb-3">
                <span>Mật Lại Khẩu</span>
                <input type="text" id="comfirm" class="mt-2">
                <div class="errcfm"></div>

            </label>
            <button class="btn btn-primary">Submit</button>
        </form>
    </div>
</body>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js"
    integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    console.log(1);
    $('#register').submit(function(e){
        e.preventDefault();
        $.ajax({
        type: "post",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        url: "http://127.0.0.1:8000/api/register",
        data: {
            name: $('#name_user').val(),
            email: $('#account').val(),
            password: $('#password').val(),
            password_confirmation: $('#comfirm').val()
        },
        dataType: "json",
        success: function(response) {
            console.log(response.error);
            $('.errEmail').text(response.error.email[0])
            $('.errName').text(response.error.name[0])
            $('.errpsw').text(response.error.password[0])
        },
        error: function(response){
            $('.errEmail').text(response.responseJSON.errors.email[0]|| '')
            $('.errName').text(''||response.responseJSON.errors.name[0])
            $('.errpsw').text(response.responseJSON.errors.password[0]||'')
        }
    })
    })
</script>
</html>