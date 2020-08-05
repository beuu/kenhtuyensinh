<?php
namespace App\Repositories\Post;

use App\Repositories\Post\PostRepositoryInterface;
use App\Repositories\Eloquent\RepositoryEloquent;
use App\Models\Post;
class PostRepositoryEloquent extends RepositoryEloquent implements PostRepositoryInterface
{
    public function model()
    {
        return Post::class;
    }
    public function deleteWithSlug($id)
    {
        $data = $this->model->find($id);
        $data->slugs()->delete($data->slug_id);
        $data->delete($id);

    }
}