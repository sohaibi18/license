<?php

namespace Database\Seeders;

use App\Models\Permission;
use App\Models\Role;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class RolesAndPermissionsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $sohaibadmin = User::factory()->create(['name' => 'khanamm', 'email' => 'khanam@mail.com',
            'password' => Hash::make('password'),'password_confirmation'=>'hi','remember_token'=>'hello']);
        //roles
        $sohaibadminrole = Role::create(['name' => 'Sohaib Admin', 'slug' => 'sohaib-admin']);

        //permissions
        $application = Permission::create(['name' => 'Add application', 'slug' => 'application']);
        $prodapplications = Permission::create(['name' => ' submitted apps', 'slug' => 'licprod-submitted']);

        //assign permissions to role
        $sohaibadminrole->permissions()->saveMany([$application, $prodapplications]);

        //assign roles to users
        $sohaibadmin->roles()->save($sohaibadminrole);
    }
}
