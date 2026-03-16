<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>
        <h1> :: Login2 :: </h1>

        @if(session('success'))
            <div style="color: green; margin-bottom: 10px;">
                {{ session('success') }}
            </div>
        @endif

        <form action="/user/login" method="post">
            Username : <input type="text" name="username" required> <br/>
            Password : <input type="password" name="password"> <br/>

            <br/>
            @csrf
            <input type="submit" value="Login">
            <input type="reset">
        </form>
        <br/>
        <a href="/user/register">Register new account</a>
    </body>
</html>