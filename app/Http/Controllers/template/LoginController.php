<?php

namespace App\Http\Controllers\template;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login()
    {
        return view('template.login.login');

    }

    public function doLogin(Request $request)
    {
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',

        ], [
            'email.required' => 'وارد کردن ایمیل الزامی است',
            'email.email' => 'شکل صحیح ایمیل را رعایت کنید',
            'password.required' => 'وارد کردن پسورد الزامی است',

        ]);

        if (Auth::attempt(['email' => $request->get('email'), 'password' => $request->get('password')])) {

            return redirect()
                ->Route('profile.index')
                ->with(['success' => 'شما با موفقیت وارد شدید.']);

        }
        return redirect()
            ->Route('user.login')
            ->with(['error' => 'ایمیل یا پسورد شما اشتباه است.']);


    }

    public function logout()
    {
        Auth::logout();

        return redirect()
            ->Route('user.login')
            ->with(['warning' => 'شما با موفقیت از پنل مدیریت خارج شدید']);
    }
}
