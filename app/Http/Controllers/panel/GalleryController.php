<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\model\Album;
use App\model\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class GalleryController extends Controller
{
    public function create()
    {

        $session = 'شما میتوانید دراین صفحه البوم و عکس های مربوط به ان را اپلود کنید';
        return view('panel.gallery.create', [
            'header' => 'New Images',
            'info' => $session,

        ]);

    }

    public function store(Request $request)
    {
        $album_file = $request->file('album_img');
        $images_file = $request->file('images');
        $user_find = Auth::user();


        $this->validate($request, [
            'album_status' => 'required',
            'album_img' => 'required',
            'images' => 'required',
            'image_text' => 'required',
        ], [
            'album_status.required' => 'وارد کردن عنوان البوم الزامی است.',
            'album_img.required' => 'وارد کردن عکس البوم الزامی است.',
            'images.required' => 'وارد کردن عکس های گالری الزلمی است.',
            'image_text.required' => 'وارد کردن عنوان هر عکس الزلمی است.',
        ]);


        $album_info = [
            'album_user_id' => $user_find->id,
            'album_status' => $request->get('album_status'),
            'album_content' => $request->get('album_content'),
            'album_img' => Str::random(6) . '.' . $album_file->getClientOriginalExtension(),
        ];

        // create album
        $album_create = Album::create($album_info);


        //save album image
        $public_path = public_path('panel/images');
        $album_file->move($public_path, $album_info['album_img']);


        // create images
        if ($album_create instanceof Album) {
            foreach ($images_file as $v => $i) {
                $img_info = [
                    'img_album_id' => $album_create->album_id,
                    'img_title' => $request->get('image_text')[$v],
                    'img_name' => Str::random(6) . '.' . $i->getClientOriginalExtension(),
                ];


                $images_create = Image::create($img_info);

                //save images
                $public_path = public_path('panel/images');
                $i->move($public_path, $img_info['img_name']);
            }
        }

        return redirect()->Route('image.show')
            ->with(['success' => 'عکس ها و البوم شما با موفقیت ایجاد گردید .']);


    }


    public function show()
    {
        $albums = Album::all();

        return view('panel.gallery.show', [
            'header' => 'Albums',
            'albums' => $albums,
        ]);
    }

    public function destroy($album_id)
    {
        $find_album = Album::findOrFail($album_id);
        $album_images = $find_album->images()->get();


        if ($find_album instanceof Album) {
            //delete album
            $find_album->delete();

            if (count($album_images) > 0) {

                //delete images
                for ($i = 0; $i < count($album_images); $i++) {
                    $album_images[$i]->delete();
                }
            }

            return redirect()
                ->Route('image.show')
                ->with(['success' => 'البوم مورد نظر با موفقیت حذف گردید']);
        } else {

            return redirect()
                ->Route('image.show')
                ->with(['error' => 'البوم مورد نظر حذف نشد.لطفا دوباره امتحان کنید']);
        }
    }

    public function edit($album_id)
    {
        $album_find = Album::findOrFail($album_id);
        //query on images table
        $album_image = $album_find->images()->get();


        if ($album_find instanceof Album) {

            return view('panel.gallery.create', [
                'albums' => $album_find,
                'header' => 'Edit Album',
                'edit_form' => true,
                'images' => $album_image,
            ]);

        }


    }

    public function update(Request $request, $album_id)
    {
        $album_find = Album::findOrFail($album_id);
        $user_find = Auth::user();


        //update albums table
        if ($album_find instanceof Album) {
            $album_info = [
                'album_user_id' => $user_find->id,
                'album_status' => $request->get('album_status'),
                'album_content' => $request->get('album_content'),
            ];

            if ($request->has('album_img')) {
                $album_info['album_img'] = Str::random(6) . '.' . $request->file('album_img')->getClientOriginalExtension();

                //save album image
                $public_path = public_path('panel/images');
                $request->file('album_img')->move($public_path, $album_info['album_img']);
            }

            $album_update = $album_find->update($album_info);
        }
        //end update album table


        //update image table
        for ($i = 0; $i < count($request->get('img_id')); $i++) {
            $img_id = $request->get('img_id')[$i];

            //find image table
            $img_find = Image::findOrFail($img_id);

            $img_info = [
                'img_title' => $request->get('img_title' . '_' . $img_id),
            ];
            if ($request->has('img_name' . '_' . $img_id)) {
                $img_info['img_name'] = Str::random(6) . '.' . $request->file('img_name' . '_' . $img_id)->getClientOriginalExtension();

                //save images
                $public_path = public_path('panel/images');
                $request->file('img_name' . '_' . $img_id)->move($public_path, $img_info['img_name']);

            }
           
            $img_update = $img_find->update($img_info);
        }
        //end update image table


        //add new images in gallery
        if ($request->has('images')) {

            $this->validate($request, [
                'image_text' => 'required',
            ], [
                'image_text.required' => 'وارد کردن عنوان هر عکس الزلمی است.',
            ]);

            if (count($request->file('images')) > 0) {
                foreach ($request->file('images') as $item => $image) {

                    $image_create = Image::create([
                        'img_album_id' => $album_find->album_id,
                        'img_title' => $request->get('image_text')[$item],
                        'img_name' => Str::random(6) . '.' . $image->getClientOriginalExtension(),
                    ]);

                    // save images
                    $public_path = public_path('panel/images');
                    $image->move($public_path, $image_create->img_name);


                }
            }


        }
        return redirect()
            ->Route('image.show')
            ->with(['success' => 'تغییرات با موفقیت اعمال شدند']);


    }

}


