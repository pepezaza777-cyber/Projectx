<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Change Password</title>
    </head>
    <body>
        <h1> :: Change Password :: </h1>
        
        @if(session('error'))
            <div style="color: red; margin-bottom: 10px;">
                {{ session('error') }}
            </div>
        @endif

        <form action="/user/changepassword" method="post">
            Old Password : <input type="password" name="old_password" required> <br/><br/>
            New Password : <input type="password" name="new_password" required> <br/><br/>
            Confirm New Password : <input type="password" name="confirm_password" required> <br/><br/>

            @csrf
            <input type="submit" value="Change Password">
        </form>
        <br/>
        <a href="/user/home">Back to Home</a>
    </body>
</html>
