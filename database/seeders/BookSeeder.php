<?php

namespace Database\Seeders;

use App\Models\Book;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class BookSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Book::create([
            'title' => "So That My Heart May Find Peace",
            'image' => "http://localhost:8000/storage/img/books/book1.jpg",
            'description' => "A philosophical and emotional narrative where a man's journey leads him to spiritual insight through conversations with a stranger. The novel gently explores pain, doubt, and belief with poetic depth.",
            'is paid'=> false,
            'price'=> null,
            'author_id'=> 1,
            'section_id'=> 4,
            'file_url' => "https://archive.org/download/arabicnovels00045/Arabic-Novels-00045.pdf"
        ]);
        Book::create([
            'title' => "The Jasmine's Exile",
            'image' => "http://localhost:8000/storage/img/books/book2.jpg",
            'description' => "A young Tunisian woman moves to France for her studies and faces cultural alienation, religious prejudice, and identity conflict. The novel explores the emotional and social struggles of Muslim immigrants in Western societies.",
            'is paid'=> false,
            'price'=> null,
            'author_id'=> 6,
            'section_id'=> 1,
            'file_url' => "https://down.ketabpedia.com/files/bm4u/0B3qzqlRcP02YUGptQkpDVVpBWWc.pdf"
        ]);
        Book::create([
            'title' => "The Spy",
            'image' => "http://localhost:8000/storage/img/books/book3.jpg",
            'description' => "A fictionalized account of Mata Hari, the infamous dancer turned spy during World War I. The novel explores her final days, revealing a woman misunderstood by history and condemned for her allure and independence.",
            'is paid'=> false,
            'price'=> null,
            'author_id'=> 7,
            'section_id'=> 2,
            'file_url' => "https://down.ketabpedia.com/files/bnr/bnr2156-1.pdf"
        ]);
        Book::create([
            'title' => "The Murder on the Links",
            'image' => "http://localhost:8000/storage/img/books/book4.jpg",
            'description' => "Hercule Poirot is summoned to France only to find his client murdered and buried on a golf course. With twists, disguises, and a second corpse, Poirot must untangle a web of secrets from the past to reveal the killer.",
            'is paid'=> false,
            'price'=> null,
            'author_id'=> 2,
            'section_id'=> 3,
            'file_url' => "https://down.ketabpedia.com/files/bm4u/1S7_Y2CHwnfGgj93M2FNfZdPFdreU_GDz.pdf"
        ]);
        Book::create([
            'title' => "Endless Night",
            'image' => "http://localhost:8000/storage/img/books/book5.jpg",
            'description' => "A psychological crime novel where a charming young man marries a wealthy heiress, only to reveal dark motives beneath a romantic façade. Twists unfold as love, greed, and guilt collide in a haunting countryside estate.",
            'is paid'=> true,
            'price'=> 150,
            'author_id'=> 2,
            'section_id'=> 3,
            'file_url' => "https://down.ketabpedia.com/files/bm4u/1PtO26CeJBdwvqwJN6__5F7jzZ4WuAJbr.pdf"
        ]);
        Book::create([
            'title' => "Arsses",
            'image' => "http://localhost:8000/storage/img/books/book6.jpg",
            'description' => "A Saudi sci-fi adventure where a team of scientists investigates a mysterious object in the sky, only to discover a portal to another world. The novel blends space exploration, alien encounters, and psychological tension.",
            'is paid'=> false,
            'price'=> null,
            'author_id'=> 3,
            'section_id'=> 5,
            'file_url' => "https://down.ketabpedia.com/files/ind/arsis-dad.pdf"
        ]);
        Book::create([
            'title' => "Al-Sajil",
            'image' => "http://localhost:8000/storage/img/books/book7.jpg",
            'description' => "A fantasy thriller and the fourth part of the “Clay and Fire” saga, where secrets from the Barzakh threaten to reshape Earth’s history. The story follows Asif as he faces mysterious forces and a revelation that could alter fate itself.",
            'is paid'=> true,
            'price'=> 120,
            'author_id'=> 3,
            'section_id'=> 2,
            'file_url' => "https://ketabpedia.com/wp-content/uploads/2024/07/sejjil.pdf"
        ]);
        Book::create([
            'title' => "The Diary of a Writer",
            'image' => "http://localhost:8000/storage/img/books/book8.jpg",
            'description' => "A collection of essays and reflections where Dostoevsky explores political, religious, and social themes through personal commentary and philosophical depth",
            'is paid'=> false,
            'price'=> null,
            'author_id'=> 5,
            'section_id'=> 1,
            'file_url' => "https://down.ketabpedia.com/files/bm4u/1TyeFh4kx8AARtibyfckZt-7gMKx8Tgwa.pdf"
        ]);
        Book::create([
            'title' => "White Nights",
            'image' => "http://localhost:8000/storage/img/books/book9.jpg",
            'description' => "A short romantic tale about a lonely dreamer who falls in love over four nights with a woman waiting for another, exploring longing and emotional isolation.",
            'is paid'=> true,
            'price'=> 170,
            'author_id'=> 5,
            'section_id'=> 2,
            'file_url' => "https://down.ketabpedia.com/files/bm4u/1cRs_aXf_XCBvHRBA2bDHF2t0Gb3zWLNF.pdf "
        ]);
        Book::create([
            'title' => "Jasmine of Return",
            'image' => "http://localhost:8000/storage/img/books/book10.jpg",
            'description' => "A continuation of the jasmine-themed narrative, this novel explores identity, exile, and emotional return in the face of cultural and personal struggle.",
            'is paid'=> true,
            'price'=> 165,
            'author_id'=> 6,
            'section_id'=> 1,
            'file_url' => "https://book-shadow.com/files/fhrst11/571.pdf"
        ]);
        Book::create([
            'title' => "In My Heart Lives a Hebrew Woman",
            'image' => "http://localhost:8000/storage/img/books/book11.jpg",
            'description' => "Based on a true story, it follows a Jewish girl’s journey toward Islam and resistance in southern Lebanon, tackling themes of tolerance and belief.",
            'is paid'=> true,
            'price'=> 90,
            'author_id'=> 6,
            'section_id'=> 1,
            'file_url' => "https://ketabpedia.com/wp-content/uploads/2019/01/%D9%81%D9%8A-%D9%82%D9%84%D8%A8%D9%8A-%D8%A3%D9%86%D8%AB%D9%89-%D8%B9%D8%A8%D8%B1%D9%8A%D8%A9_%D8%AE%D9%88%D9%84%D8%A9-%D8%AD%D9%85%D8%AF%D9%8A.pdf"
        ]);
        Book::create([
            'title' => "Outlaw Scribbles",
            'image' => "http://localhost:8000/storage/img/books/book12.jpg",
            'description' => "A collection of socially charged thoughts and poetic reflections challenging conventional norms and provoking introspective dialogue.",
            'is paid'=> true,
            'price'=> 125,
            'author_id'=> 1,
            'section_id'=> 1,
            'file_url' => "https://down.ketabpedia.com/files/bnr/bnr779-1.pdf"
        ]);
        Book::create([
            'title' => "Letters from the Qur’an",
            'image' => "http://localhost:8000/storage/img/books/book13.jpg",
            'description' => "Spiritual letters inspired by Qur’anic themes, offering heartfelt reflections on faith, humanity, and everyday struggles with lyrical sensitivity.",
            'is paid'=> true,
            'price'=> 140,
            'author_id'=> 1,
            'section_id'=> 4,
            'file_url' => "https://ketabpedia.com/wp-content/uploads/2024/07/rasaailquranadham.pdf"
        ]);
        Book::create([
            'title' => "Pulse",
            'image' => "http://localhost:8000/storage/img/books/book14.jpg",
            'description' => "A romantic and philosophical tale where emotions are tested by war, faith, and self-discovery, layered with poetic introspection.",
            'is paid'=> true,
            'price'=> 200,
            'author_id'=> 1,
            'section_id'=> 2,
            'file_url' => "https://down.ketabpedia.com/files/bm4u/0B3qzqlRcP02Ycl9raDJmTGR5RVk.pdf"
        ]);
        Book::create([
            'title' => "The Not-Impossible Mission",
            'image' => "http://localhost:8000/storage/img/books/book15.jpg",
            'description' => "A motivational book that merges spiritual purpose with social insight, aiming to inspire meaningful change despite seemingly impossible odds.",
            'is paid'=> true,
            'price'=> 115,
            'author_id'=> 4,
            'section_id'=> 4,
            'file_url' => "https://down.ketabpedia.com/files/bm4u/1gM-y27YRaL1y9gpSnvXaZ42Se3NcVCfO.pdf"
        ]);
        Book::create([
            'title' => "Crime and Punishment",
            'image' => "http://localhost:8000/storage/img/books/book16.jpg",
            'description' => "A psychological masterpiece exploring guilt, redemption, and morality through the mind of a young man who commits murder in search of justice.",
            'is paid'=> true,
            'price'=> 185,
            'author_id'=> 5,
            'section_id'=> 2,
            'file_url' => "https://down.ketabpedia.com/files/bm4u/1xQPFptXGxo5_H-uDxO_hwxOsoT-YiP8r.pdf"
        ]);
        Book::create([
            'title' => "The Gambler",
            'image' => "http://localhost:8000/storage/img/books/book17.jpg",
            'description' => "A semi-autobiographical novel centered on a man consumed by gambling addiction, personal pride, and a doomed romance.",
            'is paid'=> true,
            'price'=> 150,
            'author_id'=> 5,
            'section_id'=> 2,
            'file_url' => "https://down.ketabpedia.com/files/bm4u/0ByC7-1_go92DTHhsSFJjS01LbnM.pdf"
        ]);
        Book::create([
            'title' => "The Power of Letting Go",
            'image' => "http://localhost:8000/storage/img/books/book18.jpg",
            'description' => "A transformative self-help guide encouraging emotional release, healing, and inner peace through acceptance and mindfulness.",
            'is paid'=> true,
            'price'=> 140,
            'author_id'=> null,
            'section_id'=> 6,
            'file_url' => "https://down.ketabpedia.com/files/bnr/bnr3122-1.pdf"
        ]);
        Book::create([
            'title' => "The Pistachio Theory",
            'image' => "http://localhost:8000/storage/img/books/book19.jpg",
            'description' => "A popular Arabic self-development book that uses storytelling and metaphor to explore human behavior, decision-making, and mental clarity.",
            'is paid'=> true,
            'price'=> 210,
            'author_id'=> null,
            'section_id'=> 6,
            'file_url' => "https://down.ketabpedia.com/files/bm4u/1bXu4mdq-WrQvd6soCWwgMYs-ZLQGwBkJ.pdf"
        ]);
        Book::create([
            'title' => "Appointment with Death",
            'image' => "http://localhost:8000/storage/img/books/book20.jpg",
            'description' => "Hercule Poirot investigates a murder in Petra where a tyrannical matriarch’s death uncovers layers of family secrets and motives.",
            'is paid'=> true,
            'price'=> 145,
            'author_id'=> 2,
            'section_id'=> 2,
            'file_url' => "https://down.ketabpedia.com/files/bnr/bnr6920-1.pdf"
        ]);
        Book::create([
            'title' => "I, Robot",
            'image' => "http://localhost:8000/storage/img/books/book21.jpg",
            'description' => "A series of science fiction stories exploring artificial intelligence and ethics, famously introducing the Three Laws of Robotics.",
            'is paid'=> true,
            'price'=> 100,
            'author_id'=> null,
            'section_id'=> 5,
            'file_url' => "https://down.ketabpedia.com/files/bnr/bnr10255-1.pdf"
        ]);


    }
}
