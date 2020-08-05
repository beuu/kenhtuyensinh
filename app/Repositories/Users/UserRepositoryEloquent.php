<?php
namespace App\Repositories\Users;

use App\Repositories\Users\UserRepositoryInterface;
use App\Repositories\Eloquent\RepositoryEloquent;
use App\User;
class UserRepositoryEloquent extends RepositoryEloquent implements UserRepositoryInterface
{
    public function model()
    {
        return User::class;
    }

    public function getRole($id){
        return $this->model->find($id)->roles->pluck('id')->toArray();
    }

}