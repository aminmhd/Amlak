<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Album extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'album_id';
    protected $guarded = ['album_id'];

    public function images()
    {
        return $this->hasMany(Image::class , 'img_album_id');
    }

}
