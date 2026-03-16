<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class UserController extends Controller
{
    function index()
    {
        return view('login');
    }
    
    function register_view()
    {
        return view('register');
    }

    function register(Request $request)
    {
        $firstname = $request->input('firstname');
        $lastname = $request->input('lastname');
        $username = $request->input('username');
        $password = $request->input('password');

        // Check if username already exists
        $exists = DB::table('tb_users')->where('username', $username)->first();

        if($exists)
        {
            return redirect('user/register')->with('error', 'Username นี้มีอยู่ในระบบแล้ว');
        }

        // Insert new user
        DB::table('tb_users')->insert([
            'firstname' => $firstname,
            'lastname' => $lastname,
            'username' => $username,
            'password' => $password
        ]);

        return redirect('user')->with('success', 'สมัครสมาชิกสำเร็จ กรุณาเข้าสู่ระบบ');
    }

    function login(Request $request)
    {
        $username = $request->input('username');
        $password = $request->input('password');
       
        $result = DB::table('tb_users')
        ->where('username', $username)
        ->where('password', $password)->first();

        if($result)
        {
            $request->session()->put('username', $username);
            $request->session()->put('check', "passed");
            return redirect('user/home');
        }
        else
        {
            return redirect('user');
        }
        
    }
    function home()
    {
        return view('home');
    }

    function changepassword_view()
    {
        return view('changepassword');
    }

    function changepassword(Request $request)
    {
        $old_password = $request->input('old_password');
        $new_password = $request->input('new_password');
        $confirm_password = $request->input('confirm_password');
        $username = $request->session()->get('username');

        if ($new_password !== $confirm_password) {
            return redirect('user/changepassword')->with('error', 'รหัสผ่านใหม่และยืนยันรหัสผ่านไม่ตรงกัน');
        }

        $user = DB::table('tb_users')->where('username', $username)->first();

        if ($user->password !== $old_password) {
            return redirect('user/changepassword')->with('error', 'รหัสผ่านเดิมไม่ถูกต้อง');
        }

        DB::table('tb_users')->where('username', $username)->update(['password' => $new_password]);

        return redirect('user/home')->with('success', 'เปลี่ยนรหัสผ่านสำเร็จเรียบร้อยแล้ว');
    }

    function logout(Request $request)
    {
        $request->session()->forget('username');
        $request->session()->forget('check');
        return redirect('user');
    }
}
