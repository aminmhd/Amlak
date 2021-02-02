<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\blog\BlogResource;
use App\Http\Resources\image\ImageResource;
use App\model\Blog;
use Illuminate\Http\Request;

class BlogController extends Controller
{
    public function index()
    {
        $blogs = Blog::all();
        $blog_data = BlogResource::collection($blogs);

        return response()->json( $blog_data , 200 );

    }

}
