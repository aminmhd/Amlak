<?php

namespace App\Http\Controllers\panel;

use App\Http\Controllers\Controller;
use App\model\Album;
use App\model\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ImageController extends Controller
{
    public function index($album_id)
    {
        $album_find = Album::findOrFail($album_id);
        $image_album = $album_find->images()->get();



        return view('panel.gallery.image', [
            'header' => 'Images',
            'images' => $image_album,
            'album' => $album_find,
        ]);
    }

    public function destroy($img_id)
    {

        $find_img = Image::findOrFail($img_id);

        if ($find_img instanceof Image) {
            //delete image
           $find_img->delete();

           return redirect()
               ->Route('gallery.show' , $find_img->img_album_id)
               ->with(['success' => 'عکس مورد نظر با موفقیت حذف شد ']);
        } else {
            return redirect()
                ->Route('gallery.show' ,  $find_img->img_album_id)
                ->with(['error' => 'عکس مورد نظر حذف نشد دوباره امتحان کنید ']);
        }

    }


}
