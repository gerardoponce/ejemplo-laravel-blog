<?php

use App\Models\Tag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Tag::create([
            'name'  => $slug = 'python',
            'slug'  => Str::slug($slug, '-'),
        ]);

        Tag::create([
            'name'  => $slug = 'java',
            'slug'  => Str::slug($slug, '-'),
        ]);

        Tag::create([
            'name'  => $slug = 'css',
            'slug'  => Str::slug($slug, '-'),
        ]);

        Tag::create([
            'name'  => $slug = 'html',
            'slug'  => Str::slug($slug, '-'),
        ]);
        
    }
}
