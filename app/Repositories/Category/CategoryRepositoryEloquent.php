<?php
namespace App\Repositories\Category;

use App\Repositories\Category\CategoryRepositoryInterface;
use App\Repositories\Eloquent\RepositoryEloquent;
use App\Models\Category;
class CategoryRepositoryEloquent extends RepositoryEloquent implements CategoryRepositoryInterface
{
    public function model()
    {
        return Category::class;
    }
    public function deleteWithSlug($id)
    {
        $data = $this->model->find($id);
        $count = $this->model->where('pid',$id)->count();
        if($count != 0){
            return $data;
        }else{
            $data->slugs()->delete($data->slug_id);
            $data->delete($id);
        }
    }

}
