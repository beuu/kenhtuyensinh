<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Slug extends Model
{
    use SoftDeletes;
    protected $fillable = ['slug','type','refid','created_at','deleted_at','updated_at','id'];
    //
    public function cate(){
        return $this->hasMany('App\Models\Category', 'id','refid');
    }

    public function post(){
        return $this->hasMany('App\Models\Post', 'id','refid');
    }
}
