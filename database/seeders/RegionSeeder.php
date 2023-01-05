<?php

namespace Database\Seeders;

use App\Models\Region;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class RegionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Region::create([
            'name' => 'بيروت'
        ]);
        Region::create([
            'name' => 'جبيل'
        ]);
        Region::create([
            'name' => 'طربلس'
        ]);
        Region::create([
            'name' => 'عكار'
        ]);
    }
}
