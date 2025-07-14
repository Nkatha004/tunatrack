<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user = User::create([
            "email" => "nkatha.dev@gmail.com",
            "company_id" => null,
            "name" => "Nkatha",
            "phone_number" => "+254725038602",
            "password" => Hash::make("password"),
        ]);
    }
}
