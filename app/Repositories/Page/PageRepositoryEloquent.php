<?php
namespace App\Repositories\Page;

use App\Repositories\Page\PageRepositoryInterface;
use App\Repositories\Eloquent\RepositoryEloquent;
use App\Models\Page;
class PageRepositoryEloquent extends RepositoryEloquent implements PageRepositoryInterface
{
    public function model()
    {
        return Page::class;
    }
    public function deleteWithSlug($id)
    {
        $data = $this->model->find($id);
        $data->slugs()->delete($data->slug_id);
        $data->delete($id);

    }
}