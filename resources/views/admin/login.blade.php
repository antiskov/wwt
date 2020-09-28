<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="/styles/admin/admin_login.css" rel="stylesheet">
    <title>Document</title>
</head>
<body>
    <div class="wrapper fadeInDown">
        <div id="formContent">
            <!-- Tabs Titles -->
            <h2 class="active"> Sign In </h2>

            <!-- Icon -->
{{--            <div class="fadeIn first">
                <img src="http://danielzawadzki.com/codepen/01/icon.svg" id="icon" alt="User Icon" />
            </div>--}}

            <!-- Login Form -->
            <form method="POST" target="{{route('admin.login')}}">
                {!! session()->get('error') !!}
                @csrf
                <input type="text" id="login" class="fadeIn second" name="email" placeholder="email">
                <input type="text" id="password" class="fadeIn third" name="password" placeholder="password">
                <input type="submit" class="fadeIn fourth" value="Log In">
            </form>

            <!-- Remind Passowrd -->
{{--            <div id="formFooter">
                <a class="underlineHover" href="#">Forgot Password?</a>
            </div>--}}

        </div>
    </div>
</body>
</html>
