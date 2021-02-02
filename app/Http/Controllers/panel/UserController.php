<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\URL;
use Illuminate\Support\Str;

class UserController extends Controller
{
    public function create()
    {
        return view('panel.user.create', [
            'header' => 'Create User'
        ]);


    }

    public function store(Request $request)
    {



        $user_info = [
            'name' => $request->get('user_name'),
            'username' => $request->get('user_username'),
            'email' => $request->get('user_email'),
            'password' => $request->get('user_password'),
            'role' => $request->get('role'),
        ];

        $this->validate($request, [
            'user_name' => 'required',
            'user_username' => 'required',
            'user_email' => 'required|unique:users,email|email',
            'user_password' => 'required',
            'role' => 'required',
        ], [
            'user_name.required' => 'وارد کردن نام الزامی است.',
            'user_username.required' => 'وارد کردن نام کاربری الزامی است.',
            'user_email.required' => 'وارد کردن ایمیل الزلمی است.',
            'user_email.email' => 'شکل صحیح اییل را رعایت کنید',
            'user_email.unique' => 'ایمیل مورد نظر قبلا وارد شده است',
            'user_password.required' => 'وارد کردن پسورد الزامی است.',
            'role.required' => 'مشخص کردن وضعیت کاربر مورد نظر الزامی است.'

        ]);


        if ($request->has('user_img')) {
            $user_info['img'] = Str::random(6) . '.' . $request->file('user_img')->getClientOriginalExtension();

            /*save image*/
            $public_path = public_path('panel/images');
            $request->file('user_img')
                ->move($public_path, $user_info['img']);
        }

        //create default user admin


        $user_create = User::create($user_info);


        if ($user_create instanceof User) {
            return redirect()->Route('user.show')
                ->with(['success' => 'کاربر مورد نظر با موفقیت ایجاد گردید.']);
        } else {
            return redirect()->Route('user.create')
                ->with(['error' => 'کاربر مورد نظر نظر متاسفانه ایجاد نشد.']);
        }


    }

    public function show()
    {
        $users = User::all();

        return view('panel.user.show', [
            'header' => 'User Table',
            'users' => $users,
        ]);
    }


    public function destroy($id)
    {
        $find_user = User::findOrFail($id);


        if ($find_user instanceof User) {


                 $find_user->delete();




            return redirect()->Route('user.show')
                ->with(['success' => 'کاربر مورد نظر با موفقیت حذف گردید.']);
        } else {
            return redirect()->Route('user.show')
                ->with(['error' => 'کاربر مورد حذف نشد.']);
        }


    }

    public function edit($id)
    {
        $user_info = User::findOrFail($id);

        return view('panel.user.create', [
            'header' => 'Edit User',
            'user_info' => $user_info,
        ]);
    }

    public function update(Request $request, $id)
    {
        $user_find = User::findOrFail($id);

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


            // if user was in profile
            if (URL::current() == 'http://localhost/Amlak/public/admin/profile/' . $id) {
                return redirect()
                    ->Route('profile.index')
                    ->with(['success' => 'اطلاعات پروفایل با موفقیت تغییر یافت']);
            }
            //


            return redirect()->Route('user.show')
                ->with(['success' => 'اطلاعات کاربر مورد نظر با موفقیت تغییر یافت.']);
        } else {
            return redirect()->Route('user.show')
                ->with(['error' => 'دوباره امتحان کنید.']);
        }

    }
}
