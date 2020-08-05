<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Permission;

class PermissionTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $permissions = [
            'post-list',
            'post-create',
            'post-edit',
            'post-delete',
            'post-view',
            'page-list',
            'page-create',
            'page-edit',
            'page-delete',
            'page-view',
            'user-list',
            'user-create',
            'user-edit',
            'user-delete',
            'user-view',
            'role-list',
            'role-create',
            'role-edit',
            'role-delete',
            'role-view',
            'postc-list',
            'postc-create',
            'postc-edit',
            'postc-delete',
            'postc-view',
            'menu'
         ];

         foreach ($permissions as $permission) {
              Permission::create(['name' => $permission]);
         }
    }
}
