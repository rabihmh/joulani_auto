<?php

namespace Database\Seeders;

use App\Models\Made;
use App\Models\Mould;
use Illuminate\Database\Seeder;
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
        $mades = include base_path('data/mades.php');
        foreach ($mades as $name => $data) {
            $made = $this->createMade($name, $data['image']);
            $this->createMoulds($made, $data['moulds']);
        }
    }

    private function createMade(string $name, string $image): Made
    {
        return Made::create([
            'name' => $name,
            'slug' => Str::slug($name),
            'image' => $image,
        ]);
    }

    private function createMoulds(Made $made, array $moulds): void
    {
        foreach ($moulds as $mould) {
            if (is_array($mould)) {
                $parent = key($mould);
                $children = $mould[$parent];

                $parentMould = Mould::create([
                    'made_id' => $made->id,
                    'name' => $parent,
                    'slug' => Str::slug($parent),
                ]);

                foreach ($children as $child) {
                    Mould::create([
                        'made_id' => $made->id,
                        'parent_id' => $parentMould->id,
                        'name' => $child,
                        'slug' => Str::slug($child),
                    ]);
                }
            } else {
                Mould::create([
                    'made_id' => $made->id,
                    'name' => $mould,
                    'slug' => Str::slug($mould),
                ]);
            }
        }
    }

}
