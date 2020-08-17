<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use phpDocumentor\Reflection\Types\Null_;

class Post extends Model
{
    use SoftDeletes;
    protected $fillable = ['id','title','image','cid','uid','description','body','feature','public','viewcount','index_seo','meta_title','keywords','mdescription','created_at','updated_at','deleted_at'];
    public function slugs(){
        return $this->belongsTo('App\Models\Slug','id','refid')->whereNull('deleted_at');
    }

    public function users()
    {
        return $this->hasOne('App\Models\User','id','uid');
    }
    public function tag()
    {
        return $this->belongsToMany('App\Models\Tag', 'post_tag');
    }
    public function cate()
    {
        return $this->belongsToMany('App\Models\Category', 'post_cate');
    }
    public function cates()
    {
        return $this->belongsToMany('App\Models\Category','post_cate','post_id','cate_id');
    }
    public function catesview()
    {
        return $this->belongsToMany('App\Models\Category','post_cate','post_id','cate_id')->take(1);
    }
    public function comments()
    {
        return $this->hasMany('App\Models\Comment', 'post_id')->where('parent_id', 0)->where('is_approved',1)->orderBy('id','DESC');
    }
}
