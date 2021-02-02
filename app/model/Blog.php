<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Blog extends Model
{
    use SoftDeletes;

    protected $primaryKey = 'blog_id';
    protected $dates = ['deleted_at'];
    protected $guarded = [
        'blog_id',
    ];
}
