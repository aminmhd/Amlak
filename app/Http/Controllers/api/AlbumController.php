<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Http\Resources\album\AlbumResource;
use App\model\Album;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;

class AlbumController extends Controller
{
    public function index()
    {
        $albums = Album::all();
        $album_data = AlbumResource::collection($albums);
        return response()->json( $album_data , 200);
    }
}
