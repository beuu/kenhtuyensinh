<?php
namespace App\Providers;
use Illuminate\Support\ServiceProvider;

class RepositoryServiceProvider extends ServiceProvider
{
    protected static $repositories = [
        'user' => [
            \App\Repositories\Users\UserRepositoryInterface::class,
            \App\Repositories\Users\UserRepositoryEloquent::class,
        ],
        'role' => [
            \App\Repositories\Roles\RoleRepositoryInterface::class,
            \App\Repositories\Roles\RoleRepositoryEloquent::class,
        ],
        'tag' => [
            \App\Repositories\Tag\TagRepositoryInterface::class,
            \App\Repositories\Tag\TagRepositoryEloquent::class,
        ],
        'category' => [
            \App\Repositories\Category\CategoryRepositoryInterface::class,
            \App\Repositories\Category\CategoryRepositoryEloquent::class,
        ],
        'slug' => [
            \App\Repositories\Slug\SlugRepositoryInterface::class,
            \App\Repositories\Slug\SlugRepositoryEloquent::class,
        ],
        'comment' => [
            \App\Repositories\Comment\CommentRepositoryInterface::class,
            \App\Repositories\Comment\CommentRepositoryEloquent::class,
        ],
        'post' => [
            \App\Repositories\Post\PostRepositoryInterface::class,
            \App\Repositories\Post\PostRepositoryEloquent::class,
        ],
        'page' => [
            \App\Repositories\Page\PageRepositoryInterface::class,
            \App\Repositories\Page\PageRepositoryEloquent::class,
        ],

    ];
    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        foreach (static::$repositories as $repository) {
            $this->app->bind(
                $repository[0],
                $repository[1]
            );
        }
    }

}
