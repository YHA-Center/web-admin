<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\User;
use App\Models\AboutDesc;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {

        AboutDesc::create([
            'desc' => '
            Lorem ipsum, dolor sit amet consectetur adipisicing elit. At deserunt cupiditate minima totam! Necessitatibus aliquid quisquam consequuntur sunt excepturi praesentium ipsam, exercitationem earum rerum distinctio laborum eos ipsum aliquam voluptates.
            ',
        ]);

        User::create([
            'name' => 'admin',
            'email' => 'admin@gmail.com',
            'phone' => '23423235443',
            'city' => 'yangon',
            'township' => 'hlaing',
            'role' => 'admin',
            'gender' => 'male',
            'password' => Hash::make('admin123'),
        ]);
    }
}
