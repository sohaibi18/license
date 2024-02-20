<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //roles
        $superadminrole = Role::create(['name' => 'Super Admin', 'slug' => 'super-admin']);
        $dirtechnicalrole = Role::create(['name' => 'Director Technical', 'slug' => 'director-technical']);
        $dddivisional = Role::create(['name' => 'DD Divisional', 'slug' => 'dd-divisional']);
        $adfsdistrict = Role::create(['name' => 'ADFS District', 'slug' => 'adfs-district']);
        $district = Role::create(['name' => 'District', 'slug' => 'district']);
        $accountant = Role::create(['name' => 'Accountant', 'slug' => 'accountant']);

        //permissions
        $addapplication = Permission::create(['name' => 'Add lic/prod application', 'slug' => 'add-application']);
        $licprodapplications = Permission::create(['name' => ' lic/prod submitted apps', 'slug' => 'licprod-applications']);

        //assign permissions to role
        $superadminrole->permissions()->save($addapplication);

        //assign roles to users

    }
}
