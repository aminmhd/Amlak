<?php

namespace App\model;

use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    protected $primaryKey = 'contact_id';
    protected $guarded = [
        'contact_id'
    ];
}
