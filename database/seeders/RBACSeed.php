<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
class RBACSeed extends Seeder
{
    /**
     * Run the database seeds.
     */
    protected $custom = [1,30,31,32,33,34,35];
    protected $report = [26,27,28,29];
    public function run(): void
    {
        app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();
        $this->create_permission();
        $this->create_role();
        $this->assign_permission();
    }
    protected function create_permission(){
        for ($i=0; $i < count($this->custom); $i++) { 
            Permission::create(['name'=>$this->custom[$i]]);            
        }
        for ($i=0; $i < count($this->report); $i++) { 
            Permission::create(['name'=>$this->report[$i]]);            
        }
    }
    protected function create_role(){
        $custom = Role::create(['name' => 'custom']);
        for ($i=0; $i < count($this->custom); $i++) { 
            $custom->givePermissionTo((string)$this->custom[$i]);            
        }
        $report = Role::create(['name'=>'report']);
        for ($i=0; $i < count($this->report); $i++) { 
            $report->givePermissionTo((string)$this->report[$i]);            
        }
        $report->givePermissionTo('1');
    }
    protected function assign_permission(){
        $admin = User::find(1)->assignRole(['custom','report']);
        $custom = User::find(2)->assignRole('custom');
        $report = User::find(3)->assignRole('report');
    }
}
