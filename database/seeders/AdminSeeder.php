<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        User::create([
            "name"=> "Admin 1",
            "email"=> "admin@paudbungapandan.sch.id",
            "password"=> bcrypt("admin123"),
        ]);
    }
}
