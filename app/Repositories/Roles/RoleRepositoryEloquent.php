<?php
namespace App\Repositories\Roles;

use App\Repositories\Roles\RoleRepositoryInterface;
use App\Repositories\Eloquent\RepositoryEloquent;
use Spatie\Permission\Models\Role;
class RoleRepositoryEloquent extends RepositoryEloquent implements RoleRepositoryInterface
{
    public function model()
    {
        return Role::class;
    }

}