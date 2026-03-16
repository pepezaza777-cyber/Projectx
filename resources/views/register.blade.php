<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Register</title>
    </head>
    <body>
        <h1> :: Register :: </h1>
        
        @if(session('error'))
            <div style="color: red; margin-bottom: 10px;">
                {{ session('error') }}
            </div>
        @endif

        <form action="/user/register" method="post">
            Username : <input type="text" name="username" required> <br/><br>
            Password : <input type="password" name="password" required> <br/><br>
            Firstname : <input type="text" name="firstname" required> <br/><br>
            Lastname : <input type="text" name="lastname" required> <br/><br>
           

            <br/>
            @csrf
            <input type="submit" value="Register">
            <input type="reset">
        </form>
        <br/>
        <a href="/user">Back to Login</a>
    </body>
</html>
