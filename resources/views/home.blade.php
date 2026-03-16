<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Laravel</title>
    </head>
    <body>
        <h1> :: HOME :: </h1>
        <p>Welcome, {{session('username')}} </p>

        @if(session('success'))
            <div style="color: green; margin-bottom: 10px;">
                {{ session('success') }}
            </div>
        @endif

        <a href="/user/changepassword">เปลี่ยนรหัสผ่าน</a> | 
        <a href="/user/logout">ออกจากระบบ</a>
    </body>
</html>