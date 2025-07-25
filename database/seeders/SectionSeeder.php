<?php

namespace Database\Seeders;

use App\Models\Section;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class SectionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Section::create([
            'name' => "Cultural",
            'image'=> "storage/img/cultural.jpg",
        ]);
        Section::create([
            'name' => "Philosophical",
            'image' => 'storage/img/philosophical.jpg',
        ]);
        Section::create([
            'name' => "Police",
            'image' => 'storage/img/police.jpg',
        ]);
        Section::create([
            'name' => "Religious",
            'image' => 'storage/img/religious.jpg',
        ]);
        Section::create([
            'name' => "Science fiction",
            'image' =>'storage/img/ScienceFiction.jpg',
        ]);
        Section::create([
            'name' => "Scientific",
            'image' => 'storage/img/scientific.jpg',
        ]);
    }
}
