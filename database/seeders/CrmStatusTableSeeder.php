<?php

namespace Database\Seeders;

use App\Models\CrmStatus;
use Illuminate\Database\Seeder;

class CrmStatusTableSeeder extends Seeder
{
    public function run()
    {
        $crmStatuses = [
            [
                'id'         => 1,
                'name'       => 'Lead',
                'created_at' => '2022-11-03 06:49:57',
                'updated_at' => '2022-11-03 06:49:57',
            ],
            [
                'id'         => 2,
                'name'       => 'Customer',
                'created_at' => '2022-11-03 06:49:57',
                'updated_at' => '2022-11-03 06:49:57',
            ],
            [
                'id'         => 3,
                'name'       => 'Partner',
                'created_at' => '2022-11-03 06:49:57',
                'updated_at' => '2022-11-03 06:49:57',
            ],
        ];

        CrmStatus::insert($crmStatuses);
    }
}
