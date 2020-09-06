<?php

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name'              => 'gerardo',
            'last_name'         => 'martinez',
            'username'          => 'admin01',
            'email'             => 'admin01@app.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('123456789'),
            'image_path'        => 'img/default_profile.png',            
        ]);

        User::create([
            'name'              => 'josue',
            'last_name'         => 'ponce',
            'username'          => 'user01',
            'email'             => 'user01@app.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('123456789'),
            'image_path'        => 'img/default_profile.png',
        ]);

        factory(User::class, 20)->create();
    }
}
