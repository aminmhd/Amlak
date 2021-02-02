<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\model\Blog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class BlogController extends Controller
{
    public function create()
    {
        return view('panel.blog.create', [
            'header' => 'Create Blog'
        ]);
    }

    public function store(Request $request)
    {

        $file = $request->file('blog_img');
        $user_find = Auth::user();





        $this->validate($request, [
            'blog_title' => 'required',
            'blog_description' => 'required',
            'blog_img' => 'required',
        ], [
            'blog_title.required' => 'وارد کردن عنوان بلاگ الزامیست .',
            'blog_description.required' => 'وارد کردن متن بلاگ الزامیست .',
            'blog_img.required' => 'انتخاب عکس برای بلاگ الزامیست .',
        ]);


        /*save image*/
        $file_name = Str::random(6) . '.' . $file->getClientOriginalExtension();
        $public_path = public_path('panel/images');
        $file->move($public_path, $file_name);


        /*create blog*/
        $blog_info = [
            'blog_user_id' => $user_find->id,
            'blog_title' => $request->get('blog_title'),
            'blog_content' => $request->get('blog_description'),
            'blog_img' => $file_name,
        ];

        $blog_create = Blog::create($blog_info);

        if ($blog_create instanceof Blog) {
            return redirect()->Route('blog.show')
                ->with(['success' => 'بلاگ مورد نظر با موفقیت ایجاد گردید.']);
        } else {
            return redirect()->Route('blog.create')
                ->with(['error' => 'ایجاد بلاگ با خطا مواجه شده است لطفا دوباره امتحان کنید.']);
        }


    }

    public function show()
    {
        $blog = Blog::all();

        return view('panel.blog.show', [
            'header' => 'Blog Table',
            'blog' => $blog,
        ]);
    }

    public function destroy($blog_id)
    {
        /*blog delete*/
        $blog_find = Blog::findOrFail($blog_id);


        if ($blog_find instanceof Blog) {
            $blog_find->delete();
            return redirect()->Route('blog.show')
                ->with(['success' => 'بلاگ مورد نظر با موفقیت حذف گردید.']);
        } else {
            return redirect()->Route('blog.show')
                ->with(['error' => 'بلاگ مورد نظر حذف نشد دوباره امتحان کنید.']);
        }

    }

    public function edit($blog_id)
    {

        $blog_info = Blog::find($blog_id);


        if ($blog_info instanceof Blog) {
            return view('panel.blog.create', [
                'blog_info' => $blog_info,
                'header' => 'Edit Blog'
            ]);
        } else {
            return redirect()->Route('blog.show')
                ->with(['error' => 'مشکلی در بارگزاری سیستم به وجود امده است . لطفا دوباره امتحان کنید.']);
        }

    }

    public function update(Request $request, $blog_id)
    {
        $blog_find = Blog::findOrFail($blog_id);


        $this->validate($request, [
            'blog_title' => 'required',
            'blog_description' => 'required',
        ], [
            'blog_title.required' => 'وارد کردن عنوان بلاگ الزامیست .',
            'blog_description.required' => 'وارد کردن متن بلاگ الزامیست .',
        ]);


        $blog_info = [
            'blog_title' => $request->get('blog_title'),
            'blog_content' => $request->get('blog_description'),
        ];


        if ($request->has('blog_img')) {
            $blog_info['blog_img'] = Str::random(6) . '.' . $request->file('blog_img')->getClientOriginalExtension();


            /*save image*/
            $public_path = public_path('panel/images');
            $request->file('blog_img')
                ->move($public_path, $blog_info['blog_img']);
        }


        if ($blog_find instanceof Blog) {
            $blog_find->update($blog_info);
            return redirect()->Route('blog.show')
                ->with(['success' => 'اطلاعات بلاگ با موفقیت تغییر یافت.']);
        } else {
            return redirect()->Route('blog.show')
                ->with(['error' => 'غملیات تغییر اطلاعات با مشکل مواجه شده است.']);
        }


    }
}
