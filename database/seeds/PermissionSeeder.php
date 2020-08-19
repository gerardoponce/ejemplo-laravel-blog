<?php

use Illuminate\Database\Seeder;

// Para crear los roles y permisos
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Models\User;

class PermissionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Lista de permisos
        // Para pagina de inicio
        Permission::create(['name' => 'admin.home']);
        Permission::create(['name' => 'writer.home']);
        // Para categories
        Permission::create(['name' => 'categories.index']);
        Permission::create(['name' => 'categories.edit']);
        Permission::create(['name' => 'categories.show']);
        Permission::create(['name' => 'categories.create']);
        Permission::create(['name' => 'categories.destroy']);
        // Para articles
        Permission::create(['name' => 'articles.index']);
        Permission::create(['name' => 'articles.edit']);
        Permission::create(['name' => 'articles.show']);
        Permission::create(['name' => 'articles.create']);
        Permission::create(['name' => 'articles.destroy']);
        
        // Lista de roles
        $admin  = Role::create(['name' => 'admin']);
        $writer = Role::create(['name' => 'writer']);

        // Asignando permisos a roles
        // Para admin
        $admin->givePermissionTo([
            'admin.home',
            'categories.index',
            'categories.edit',
            'categories.show',
            'categories.create',
            'categories.destroy'
        ]);

        $writer->givePermissionTo([
            'writer.home',
        ]);

        //Asignando rol a usuario
        $user_1 = User::find(1);
        $user_1->assignRole('admin');
        $user_2 = User::find(2);
        $user_2->assignRole('writer');
    }
}
