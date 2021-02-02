<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use SoftDeletes;
    protected $primaryKey = 'img_id';
    protected $guarded = ['img_id'];

    public function album()
    {
        return $this->belongsTo(Album::class , 'img_album_id');
    }

}
