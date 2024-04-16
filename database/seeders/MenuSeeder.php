<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $menu_data = database_path('seeders/datas/menu_data.csv');
        $content_data = file($menu_data);
        unset($content_data[0]);
        foreach ($content_data as $line) {
            $data = str_getcsv($line);
            Menu::create([
                'parent_id' => $data[1],
                'nama' => $data[2],
                'icon' => $data[3],
                'label' => $data[4],
                'badge' => $data[5],
                'active' => $data[6],
                'right_icon' => $data[7],
                'path' => $data[8],
            ]);
        }

    }
    
}
