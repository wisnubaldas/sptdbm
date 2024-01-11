<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Menu;
class MenuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Menu::insert([
            [
                'parent_id'=>0,
                'nama'=>'Dashboard',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>0,
                'nama'=>'Master',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'

            ],
            [
                'parent_id'=>2,
                'nama'=>'Master Airlines',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>2,
                'nama'=>'Master Flight',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>0,
                'nama'=>'TPS Online',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>5,
                'nama'=>'GateIn',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>5,
                'nama'=>'GateOut',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>5,
                'nama'=>'UnManifest',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>0,
                'nama'=>'PLP Online',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>9,
                'nama'=>'Permohonan PLP',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>9,
                'nama'=>'Permohonan Batal PLP',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>9,
                'nama'=>'Respon PLP',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>9,
                'nama'=>'Respon Batal PLP',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>0,
                'nama'=>'Document Import',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>0,
                'nama'=>'Document Ekspor',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>14,
                'nama'=>'SPPB BC2.0',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>14,
                'nama'=>'SPPB BC23',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>14,
                'nama'=>'SPPB BC1.6',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>14,
                'nama'=>'Barang Kiriman',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>14,
                'nama'=>'SPJM',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>14,
                'nama'=>'SPPB Rush Handling',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>14,
                'nama'=>'Check Data SPPB',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>15,
                'nama'=>'NPE BC3.0',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>15,
                'nama'=>'PEB',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>15,
                'nama'=>'PKBE',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>0,
                'nama'=>'Reporting',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>26,
                'nama'=>'Log Data XML',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>26,
                'nama'=>'Respon Manual',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>26,
                'nama'=>'Report Data Timbun',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>0,
                'nama'=>'Custom',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>30,
                'nama'=>'Inventory',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'/custom/inventory'
            ],
            [
                'parent_id'=>30,
                'nama'=>'Abandon',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>30,
                'nama'=>'Carrent Now',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>30,
                'nama'=>'Custom Module',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
            [
                'parent_id'=>30,
                'nama'=>'Stock Opname',
                'icon'=>'fa fa-th-large',
                'label'=>'baru',
                'badge'=>10,
                'active'=>false,
                'right_icon'=>'',
                'path'=>'javascript:;'
            ],
        ]);
    }
}
