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
            'user_name'         => 'admin01',
            'email'             => 'admin01@app.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('123456789'),

        ]);

        User::create([
            'name'              => 'josue',
            'last_name'         => 'ponce',
            'user_name'         => 'user01',
            'email'             => 'user01@app.com',
            'email_verified_at' => now(),
            'password'          => bcrypt('123456789'),

        ]);
    }
}
