<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Staff extends Model
{
   	protected $fillable = [
        'name','staff_post','email','office_no','image'
    ];
}
