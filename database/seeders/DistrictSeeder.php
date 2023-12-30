<?php

namespace Database\Seeders;

use App\Models\BusinessType;
use App\Models\District;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DistrictSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $District = $this->CreateDistt();

    }

    private function CreateDistt()
    {
        $Peshawar = District::factory()->create([
            'District_Name' => 'Peshawar',
            'District_Code' => '1',
        ]);

        $Mardan = District::factory()->create([
            'District_Name' => 'Mardan',
            'District_Code' => '2',
        ]);

        $Swabi = District::factory()->create([
            'District_Name' => 'Swabi',
            'District_Code' => '3',
        ]);

        $Nowshera = District::factory()->create([
            'District_Name' => 'Nowshera',
            'District_Code' => '4',
        ]);

        $Charsadda = District::factory()->create([
            'District_Name' => 'Charsadda',
            'District_Code' => '5',
        ]);

        return [
            'Peshawar' => $Peshawar,
            'Mardan' => $Mardan,
            'Swabi' => $Swabi,
            'Nowshera' => $Nowshera,
            'Charsadda' => $Charsadda,
        ];
    }
}
