<?php
namespace App\Repositories\Category;
use App\Repositories\Eloquent\RepositoryInterface;

interface CategoryRepositoryInterface extends RepositoryInterface
{
    public function deleteWithSlug($id);
}