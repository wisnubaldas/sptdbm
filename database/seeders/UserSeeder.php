<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu_data = database_path('seeders/datas/user_data.csv');
        $content_data = file($menu_data);
        unset($content_data[0]);
        foreach ($content_data as $line) {
            $data = str_getcsv($line);
            \App\Models\User::factory()->create([
                'name' => $data[1],
                'email' => $data[2],
                'password' => Hash::make($data[3]),
            ]);
        }
        // \App\Models\User::factory(5)->create();
    }
}
