<?php

namespace Database\Seeders;

use App\Models\Made;
use App\Models\Mould;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Config;
use Illuminate\Support\Str;

class MadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $mades = Config::get('Mades');
        foreach ($mades as $name => $data) {
            $made = Made::create([
                'name' => $name,
                'slug' => Str::slug($name),
                'image' => $data['image'],
            ]);
            foreach ($data['moulds'] as $mould) {
                Mould::create([
                    'made_id' => $made->id,
                    'name' => $mould,
                    'slug' => Str::slug($mould)
                ]);
            }
        }
    }
}
