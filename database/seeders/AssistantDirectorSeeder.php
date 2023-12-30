<?php

namespace Database\Seeders;

use App\Models\AssistantDirector;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Arr;
use PhpParser\Node\Expr\Array_;

class AssistantDirectorSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $ADFS = $this->CreateADFS();

    }

    private function CreateADFS()
    {
        $ADAsad = AssistantDirector::factory()->create([
            'ADFS_Name' => 'Asad Khan',
            'ADFS_Code' => '1',
            'Status' => 'Active',
        ]);

        $ADAneela = AssistantDirector::factory()->create([
            'ADFS_Name' => 'Aneela Khan',
            'ADFS_Code' => '2',
            'Status' => 'Active',
        ]);

        $ADUzair = AssistantDirector::factory()->create([
            'ADFS_Name' => 'Uzair Khan',
            'ADFS_Code' => '3',
            'Status' => 'Active',
        ]);

        $ADFarhan = AssistantDirector::factory()->create([
            'ADFS_Name' => 'Farhan Ahmed',
            'ADFS_Code' => '4',
            'Status' => 'InActive',
        ]);

        $ADAmir = AssistantDirector::factory()->create([
            'ADFS_Name' => 'Amir Baloch',
            'ADFS_Code' => '5',
            'Status' => 'InActive',
        ]);

        return [
            'Asad Khan' => $ADAsad,
            'Aneela Khan' => $ADAneela,
            'Uzair khan' => $ADUzair,
            'Farhan Ahmed' => $ADFarhan,
            'Amir Baloch' => $ADAmir,
        ];
    }
}
