<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PostalRates extends Model
{
    protected $fillable = [
        'file_name','description','file'
    ];
}
