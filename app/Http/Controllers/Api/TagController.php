<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function search(Request $request)
    {
        $tags = Tag::where('name', 'LIKE', '%'.$request->input('q', '').'%')
            ->get(['id', 'name as text']);
        return ['results' => $tags];
    }
}
