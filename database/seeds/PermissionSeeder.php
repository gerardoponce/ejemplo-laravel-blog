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
        Permission::create(['name' => 'admin.categories.index']);
        Permission::create(['name' => 'admin.categories.edit']);
        Permission::create(['name' => 'admin.categories.show']);
        Permission::create(['name' => 'admin.categories.create']);
        Permission::create(['name' => 'admin.categories.destroy']);

        // Para las acciones de writer
        Permission::create(['name' => 'writer.edit']);
        Permission::create(['name' => 'writer.update']);
        Permission::create(['name' => 'writer.articles.index']);
        Permission::create(['name' => 'writer.articles.edit']);
        Permission::create(['name' => 'writer.articles.show']);
        Permission::create(['name' => 'writer.articles.create']);
        Permission::create(['name' => 'writer.articles.destroy']);
        
        // Lista de roles
        $admin  = Role::create(['name' => 'admin']);
        $writer = Role::create(['name' => 'writer']);

        // Asignando permisos a roles
        // Para admin
        $admin->givePermissionTo([
            'admin.home',
            'admin.categories.index',
            'admin.categories.edit',
            'admin.categories.show',
            'admin.categories.create',
            'admin.categories.destroy'
        ]);

        $writer->givePermissionTo([
            'writer.home',
            'writer.edit',
            'writer.update',
            'writer.articles.index',
            'writer.articles.edit',
            'writer.articles.show',
            'writer.articles.create',
            'writer.articles.destroy'
        ]);

        //Asignando rol a usuarios
        $admin = User::find(1);
        $admin->assignRole('admin');

        $writers = User::whereNotIn('id', [1])->get();
        foreach ($writers as $writer) {
            $writer->assignRole('writer');
        }
    }
}
