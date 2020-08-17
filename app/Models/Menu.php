<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    public static function byName($name)
    {
        return self::where('name', '=', $name)->first();
    }

    public function items()
    {
        return $this->hasMany('App\Models\MenuItem', 'menu')->with('child')->where('parent', 0)->orderBy('sort', 'ASC');
    }
}
