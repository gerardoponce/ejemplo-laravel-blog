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
            'name'          => $slug = 'programación',
            'slug'          => Str::slug($slug, '-'),
            'image_path'    => asset('img/black_background.png'),
            'description'   => 'todo lo relacionado al tema de la programación',
        ]);

        Category::create([
            'name'          => $slug = 'marketing',
            'slug'          => Str::slug($slug, '-'),
            'image_path'    => asset('img/black_background.png'),
            'description'   => 'todo lo relacionado al tema del marketing',
        ]);

        Category::create([
            'name'          => $slug = 'música',
            'slug'          => Str::slug($slug, '-'),
            'image_path'    => asset('img/black_background.png'),
            'description'   => 'todo lo relacionado al tema de la música',
        ]);

        Category::create([
            'name'          => $slug = 'fotografía',
            'slug'          => Str::slug($slug, '-'),
            'image_path'    => asset('img/black_background.png'),
            'description'   => 'todo lo relacionado al tema de la fotografía',
        ]);
    }
}
