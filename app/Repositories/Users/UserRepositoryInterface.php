<?php
namespace App\Repositories\Users;
use App\Repositories\Eloquent\RepositoryInterface;

interface UserRepositoryInterface extends RepositoryInterface
{
    public function getRole($id);
}
