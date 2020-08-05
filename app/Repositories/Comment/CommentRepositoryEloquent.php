<?php
namespace App\Repositories\Comment;

use App\Repositories\Comment\CommentRepositoryInterface;
use App\Repositories\Eloquent\RepositoryEloquent;
use App\Models\Comment;
class CommentRepositoryEloquent extends RepositoryEloquent implements CommentRepositoryInterface
{
    public function model()
    {
        return Comment::class;
    }
}