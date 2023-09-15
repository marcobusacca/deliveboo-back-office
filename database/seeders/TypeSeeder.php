<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Type;

class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = config('types');
        
        foreach ($types as $item) {

            $type = new Type();

            $type->name = $item['name'];

            $type->cover_image = $item['cover_image'];

            $type->save();

        }
    }
}
