<?php
namespace App\Repositories\Slug;

use App\Repositories\Slug\SlugRepositoryInterface;
use App\Repositories\Eloquent\RepositoryEloquent;
use App\Models\Slug;
class SlugRepositoryEloquent extends RepositoryEloquent implements SlugRepositoryInterface
{
    public function model()
    {
        return Slug::class;
    }
}