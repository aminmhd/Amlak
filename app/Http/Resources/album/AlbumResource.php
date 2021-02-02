<?php

namespace App\Http\Resources\album;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;

class AlbumResource extends JsonResource
{



    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id' => $this->album_id,
            'title' => $this->album_status,
            'content' => $this->album_content,
            'img' => URL::asset('/panel/images/'.$this->album_img),
        ];
    }
}
