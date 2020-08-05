<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Category extends Model
{
    use SoftDeletes;
    //
    protected $fillable = ['title','image','meta_title','keysword','mdescription','description','body','public','pid','index_seo','created_at','updated_at','deleted_at'];

    public function slugs(){
        return $this->belongsTo('App\Models\Slug','id','refid');
    }
    public function parent(){
        return $this->belongsTo('App\Models\Category','pid','id');
    }
    public function child(){

        return $this->hasMany('App\Models\Category','pid');

    }
    public function posts()
    {
        return $this->belongsToMany('App\Models\Post','post_cate','post_id','cate_id');
    }
}
