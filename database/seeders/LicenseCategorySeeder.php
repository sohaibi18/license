<?php

namespace Database\Seeders;

use App\Models\District;
use App\Models\LicenseCategory;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class LicenseCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $LicCat = $this->CreateLicCat();

    }

    private function CreateLicCat()
    {
        $LargeScaleUnit = LicenseCategory::factory()->create([
            'License_Category_Name' => 'Large Scale Manufacturing Unit',
            'License_Fee' => '100000',
        ]);

        $Distributor = LicenseCategory::factory()->create([
            'License_Category_Name' => 'Distributor',
            'License_Fee' => '20000',
        ]);

        $WholeSaler = LicenseCategory::factory()->create([
            'License_Category_Name' => 'Whole Saler',
            'License_Fee' => '10000',
        ]);

        $Megamart = LicenseCategory::factory()->create([
            'License_Category_Name' => 'Mega Mart',
            'License_Fee' => '20000',
        ]);

        $Hotel = LicenseCategory::factory()->create([
            'License_Category_Name' => 'Hotel',
            'License_Fee' => '5000',
        ]);

        return [
            'Large Scale Manufacturing Unit' => $LargeScaleUnit,
            'Distributor' => $Distributor,
            'Whole Saler' => $WholeSaler,
            'Mega Mart' => $Megamart,
            'Hotel' => $Hotel,
        ];
    }
}
