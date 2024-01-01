<?php

namespace Database\Seeders;

use App\Models\LicenseCategory;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $LicCat = $this->CreateUser();

    }

    private function CreateUser()
    {
        $asif = User::factory()->create([
            'name' => 'asif',
            'email' => 'asif@gmail.com',
            'password' => '123456789'
        ]);

        $imran = User::factory()->create([
            'name' => 'imran',
            'email' => 'imran@gmail.com',
            'password' => '123456789'
        ]);


        $district = User::factory()->create([
            'name' => 'district',
            'email' => 'district@gmail.com',
            'password' => '123456789'
        ]);


        $farhan = User::factory()->create([
            'name' => 'farhan',
            'email' => 'farhan@gmail.com',
            'password' => '123456789'
        ]);


        return [
            'asif' => $asif,
            'imran' => $imran,
            'district' => $district,
            'farhan' => $farhan,

        ];
    }
}
