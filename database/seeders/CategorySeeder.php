<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $animales=[
            'Gatos'=>'#BA68C8',
            'Perros'=>'#F06292',
            'Pajaros'=>'#FFD54F',
            'Hamsters'=>'#4FC3F7',
            'Conejos'=>'#26A69A',
        ];
        ksort($animales);
        foreach($animales as $nombre=>$color){
            Category::create(compact('nombre', 'color'));
        }
    }
}
