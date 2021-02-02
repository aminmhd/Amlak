<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\image\ImageResource;
use App\model\Image;
use Illuminate\Http\Request;

class ImageController extends Controller
{
    public function index()
    {
        $images = Image::all();
        $images_data = ImageResource::collection($images);
        return response()->json($images_data , 200);

    }
}
