<?php

namespace App\Http\Resources\image;

use App\model\Album;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class ImageResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        $album_find = Album::findOrFail($this->img_album_id);


        return [
            'id' => $this->img_id,
            'album_id' => $this->img_album_id,
            'album_title' => $album_find->album_status,
            'album_content' => $album_find->album_content,
            'title' => $this->img_title,
            'img_src' => URL::asset('panel/images/'.$this->img_name),
        ];
    }
}
