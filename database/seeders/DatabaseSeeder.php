<?php

namespace Database\Seeders;

use App\Models\Product;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Storage::deleteDirectory('images/products');
        Storage::makeDirectory('images/products');

        $this->call(CategorySeeder::class);
        Product::factory(15)->create();

    }
}
