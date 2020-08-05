<?php
namespace App\Repositories\Tag;

use App\Repositories\Tag\TagRepositoryInterface;
use App\Repositories\Eloquent\RepositoryEloquent;
use App\Models\Tag;
class TagRepositoryEloquent extends RepositoryEloquent implements TagRepositoryInterface
{
    public function model()
    {
        return Tag::class;
    }
}