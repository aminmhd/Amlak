<?php

namespace App\Http\Resources\blog;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Support\Facades\URL;
use Hatamiarash7\JDF\Generator;


class BlogResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        $date = Carbon::createFromFormat('Y-m-d H:i:s', $this->created_at);
        $jdf = new Generator();
        $data = $jdf->convertDate($date);
        $origin_content =strip_tags($this->blog_content);
        $foo = mb_substr($origin_content,0,200, "utf-8");



        return array(
            'id' => $this->blog_id,
            'title' => $this->blog_title,
            'short_content' => $foo ,
            'content' => $this->blog_content,
            'created_at' => $data,
            'img' => URL::asset('panel/images/'.$this->blog_img),
        );
    }
}
