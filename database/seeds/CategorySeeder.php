<?php

use Illuminate\Database\Seeder;
use App\Models\Category;
use Illuminate\Support\Str;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'name'          => 'programación',
            'slug'          => Str::slug('programacion', '-'),
            'description'   => 'todo relacionado al tema de la programación',
        ]);

        Category::create([
            'name'          => 'ux',
            'slug'          => Str::slug('ux', '-'),
            'description'   => 'todo relacionado al tema de la experiencia de usuario',
        ]);

        Category::create([
            'name'          => 'economía',
            'slug'          => Str::slug('economia', '-'),
            'description'   => 'todo relacionado al tema de la economía',
        ]);
    }
}
