<?php
namespace App\Repositories\Page;
use App\Repositories\Eloquent\RepositoryInterface;

interface PageRepositoryInterface extends RepositoryInterface
{
    public function deleteWithSlug($id);
}