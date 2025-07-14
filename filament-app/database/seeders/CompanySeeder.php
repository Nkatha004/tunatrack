<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Company;
use App\Models\ClientOffices;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Company::factory()->count(1)->create()->each(function ($company) {
            // Create offices for each company
            $company->offices()->saveMany(ClientOffices::factory()->count(2)->make());
        });
    }
}
