<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Category::create([
            'name' => 'Programming',
            'slug' => 'programming'
        ]);

        Category::create([
            'name' => 'Server',
            'slug' => 'server'
        ]);

        Category::create([
            'name' => 'Front End',
            'slug' => 'front-end'
        ]);

        Category::create([
            'name' => 'Back End',
            'slug' => 'back-end'
        ]);

        Category::create([
            'name' => 'Linux',
            'slug' => 'linux'
        ]);
    }
}
