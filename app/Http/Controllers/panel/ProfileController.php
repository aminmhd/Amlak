<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\model\Blog;
use App\model\Contact;
use App\model\Image;
use App\model\Partner;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;


class ProfileController extends Controller
{
    public function index(Request $request)
    {
        $auth = Auth::user();
        $user_find = User::findOrFail($auth->id);

        //database info
        $user_table = User::all();
        $blog_table = Blog::all();
        $image_table = Image::all();
        $contact_table = Contact::all();
        $partner_table = Partner::all();

        return view('panel.profile.index', [
            'user' => $user_find,
            'user_table' => $user_table,
            'blog_table' => $blog_table,
            'image_table' => $image_table,
            'contact_table' => $contact_table,
            'partner_table' => $partner_table,
        ]);
    }

    public function edit()
    {
        $auth_find = Auth::user();
        $user_info = User::findOrFail($auth_find->id);

        return view('panel.user.create', [
            'header' => 'Edit User',
            'user_info' => $user_info,
        ]);

    }

    public function update(Request $request)
    {
        $auth = Auth::user();
        $user_find = User::findOrFail($auth->id);

        if ($request->has('role')) {

            $this->validate($request, [
                'user_name' => 'required',
                'user_username' => 'required',
                'user_email' => 'required|email',
                'role' => 'required',


            ], [
                'user_name.required' => 'وارد کردن نام الزامی است.',
                'user_username.required' => 'وارد کردن نام کاربری الزامی است.',
                'user_email.required' => 'وارد کردن ایمیل الزلمی است.',
                'user_email.email' => 'شکل صحیح اییل را رعایت کنید',
                'role.required' => 'مشخص کردن وضعیت کاربر مورد نظر الزامی است.'

            ]);
        } else {
            $this->validate($request, [
                'user_name' => 'required',
                'user_username' => 'required',
                'user_email' => 'required|email',



            ], [
                'user_name.required' => 'وارد کردن نام الزامی است.',
                'user_username.required' => 'وارد کردن نام کاربری الزامی است.',
                'user_email.required' => 'وارد کردن ایمیل الزلمی است.',
                'user_email.email' => 'شکل صحیح اییل را رعایت کنید',

            ]);
        }


        $user_info = [
            'name' => $request->get('user_name'),
            'username' => $request->get('user_username'),
            'email' => $request->get('user_email'),
            'role' => $request->get('role'),
        ];



        if ($request->has('user_img')) {
            $user_info['img'] = Str::random(6) . '.' . $request->file('user_img')->getClientOriginalExtension();

            /*save image*/
            $public_path = public_path('panel/images');
            $request->file('user_img')
                ->move($public_path, $user_info['img']);
        }


        if ($user_find instanceof User) {


            if (!$request->has('role')){
                unset($user_info['role']);
            }


            $user_find->update($user_info);



            return redirect()
                ->Route('profile.index')
                ->with(['success' => 'اطلاعات پروفایل با موفقیت تغییر یافت']);
        } else {
            return redirect()
                ->Route('profile.index')
                ->with(['error' => 'دوباره امتحان کنید.']);
        }

    }



}
