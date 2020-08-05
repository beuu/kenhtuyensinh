<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Page extends Model
{
    use SoftDeletes;
    //
    public function slugs(){
        return $this->belongsTo('App\Models\Slug','id','refid');
    }
}