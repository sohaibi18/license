<?php

namespace Database\Seeders;

use App\Models\AssistantDirector;
use App\Models\BusinessType;
use Database\Factories\BusinessTypeFactory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BusinessTypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $BusinessType = $this->CreateBT();

    }

    private function CreateBT()
    {
        $Industry = BusinessType::factory()->create([
            'Business_Types' => 'Industry',
            'Description' => 'Make Products',
        ]);

        $Beverages = BusinessType::factory()->create([
            'Business_Types' => 'Beverages',
            'Description' => 'Make Drinks',
        ]);

        $Karyana = BusinessType::factory()->create([
            'Business_Types' => 'Karyana',
            'Description' => 'Home Store',
        ]);

        $Juice = BusinessType::factory()->create([
            'Business_Types' => 'Juice',
            'Description' => 'Fresh Juices',
        ]);

        $Tandoor = BusinessType::factory()->create([
            'Business_Types' => 'Tandoor',
            'Description' => 'Make Nan',
        ]);

        return [
            'Industry' => $Industry,
            'Beverages' => $Beverages,
            'Karyana' => $Karyana,
            'Juice' => $Juice,
            'Tandoor' => $Tandoor,
        ];
    }
}
