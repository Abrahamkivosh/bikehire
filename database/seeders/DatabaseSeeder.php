<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(5)->create();

        User::create([
            'name' => 'Admin',
            'email' =>  'admin@gmail.com',
            'password' => bcrypt('password'),
            'role' => 'admin',
            'phone' => '1234567890',
            'address' => '1234, ABC Street, XYZ City, 123456',
            'city' => 'Juja City',
            'country' => 'Kenya',
        ]);

        // $this->call([
        //     BrandSeeder::class,
        //     BikeSeeder::class,
        //     FeatureSeeder::class,
        //     BookSeeder::class,
        //     PaymentSeeder::class
            
        // ]);

    }
}
