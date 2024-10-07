<?php

namespace Database\Seeders;

use App\Models\Artical;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ArticalSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Artical::factory(100)->create();

        Artical::factory()->create([
            'title' => 'titel test',
            'content' => 'content abcd',
        ]);
    }
}
