<?php
namespace App\Repositories\Post;
use App\Repositories\Eloquent\RepositoryInterface;

interface PostRepositoryInterface extends RepositoryInterface
{
    public function deleteWithSlug($id);
}