<?php

namespace Database\Seeders;

use App\Models\Admin;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Admin::query()->create([
            'name' => 'Admin ZirSoft',
            'email' => 'admin@rabihmh.com',
            'username' => Str::slug('Admin ZirSoft'),
            'phone' => '+96176318226',
            'password' => Hash::make('password'),
            'status' => 'active',
            'type' => 'super_admin'
        ]);
    }
}
