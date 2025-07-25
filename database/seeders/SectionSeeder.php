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
            'image' => asset('http://localhost:8000/storage/img/philosophical.jpg'),
        ]);
        Section::create([
            'name' => "Police",
            'image' => asset('http://localhost:8000/storage/img/police.jpg'),
        ]);
        Section::create([
            'name' => "Religious",
            'image' =>asset('http://localhost:8000/storage/img/religious.jpg'),
        ]);
        Section::create([
            'name' => "Science fiction",
            'image' =>asset('http://localhost:8000/storage/img/Science fiction.jpg'),
        ]);
        Section::create([
            'name' => "Scientific",
            'image' => asset('http://localhost:8000/storage/img/scientific.jpg'),
        ]);
    }
}
