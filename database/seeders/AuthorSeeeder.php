<?php

namespace Database\Seeders;

use App\Models\Author;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class AuthorSeeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Author::create([
            'name' => 'Adham Sharkawi',
            'about'=> 'Adham Sharkawi is a Palestinian writer born in 1980 in Tyre, Lebanon. He holds a diploma in Physical Education and both a BA and MA in Arabic Literature from the Lebanese University in Beirut. He began his writing career on the online forum "Al-Sakher" and published his first book, Morning Talk, in 2012. He is known for his storytelling style and writes under the pseudonym Quss Ibn Sa‘idah. His works, such as Messages from the Qur’an and With the Prophet, are widely read across the Arab world, especially among youth',
            'photo'=> 'http://localhost:8000/storage/img/AdhamSharkawi.jpg',
        ]);
        Author::create([
            'name' => 'Agatha Christie',
            'about'=>'Agatha Christie (1890–1976) was a British novelist and playwright, widely regarded as the Queen of Crime. She is best known for her 66 detective novels and 14 short story collections, featuring iconic characters like Hercule Poirot and Miss Marple. Her most famous works include Murder on the Orient Express, And Then There Were None, and The Murder of Roger Ackroyd.
                      Christie’s books have sold over two billion copies, making her the best-selling fiction writer of all time, surpassed only by the Bible and Shakespeare. She also wrote the world’s longest-running play, The Mousetrap, which debuted in 1952 and ran continuously in London’s West End for decades.
                      She served as a nurse and pharmacy assistant during World War I, which gave her deep knowledge of poisons—something she used cleverly in her plots. In 1971, she was honored as a Dame Commander of the British Empire for her contribution to literature.',
            'photo'=>'http://localhost:8000/storage/img/AgathaChristie.jpg',
        ]);
        Author::create([
            'name' => 'Ahmed Al Hamdan',
            'about'=>'Ahmed Al Hamdan is a Saudi novelist born on June 14, 1992, in Jeddah, Saudi Arabia. He holds a bachelors degree in mathematics from King Abdulaziz University. He began his literary career in 2017 with the novel The City of Love Is Not Inhabited by the Sane, which gained wide popularity for its emotional depth and unique storytelling.
                      He is known for blending romance, fantasy, and philosophical themes in his writing',
            'photo'=>'http://localhost:8000/storage/img/AhmedAlHamdan.jpg',
        ]);
        Author::create([
            'name' => 'Ahmed Al-Omari',
            'about'=>'Ahmed Khairy Al-Omari is an Iraqi writer and dentist, born in Baghdad in 1970. Though trained in dentistry, he is best known for his influential Islamic writings that blend spiritual reflection with modern thought. His works often focus on cultural revival, personal development, and reinterpreting Islamic concepts in a contemporary context. Among his most popular books are The Quranic Compass, When the Prophet Speaks, Bilal’s Code, and the Chemistry of Prayer series. His writing style is known for being accessible, thought-provoking, and especially appealing to younger readers across the Arab world.',
            'photo'=>'http://localhost:8000/storage/img/AhmedAl-Omari.jpg',
        ]);
        Author::create([
            'name' => 'Dostoevsky',
            'about'=>'Fyodor Dostoevsky (1821–1881) was a Russian novelist, philosopher, and journalist, widely regarded as one of the greatest literary minds in history. His works explore deep psychological, moral, and existential themes, often delving into the human soul’s darkest corners.
                      Dostoevsky’s life was marked by hardship: he was imprisoned in Siberia for political activity, suffered from epilepsy, and struggled with gambling addiction. Yet, these experiences deeply shaped his writing, giving it unmatched emotional and philosophical depth.',
            'photo'=>'http://localhost:8000/storage/img/Dostoevsky.jpg',
        ]);
        Author::create([
            'name' => 'Khawla Hamdi',
            'about'=>'Khawla Hamdi is a Tunisian novelist and university professor, born on July 12, 1984, in Tunis. She holds a PhD in Operations Research from the University of Technology of Troyes in France. In addition to her academic career, she teaches Information Technology at King Saud University in Riyadh.
                       She is best known for her bestselling novel In My Heart a Hebrew Girl (Fi Qalbi Untha ‘Ibriah), which is inspired by a true story of a Jewish Tunisian girl who converts to Islam. Her novels often explore themes of identity, faith, cultural conflict, and the struggles of Muslims in Western societies. Other notable works include Ghurbat al-Yasmin (The Jasmine Exile), An Tabqa (To Stay), and Arni Andhur Ilayk (Let Me Look at You).
                       Her writing style blends emotional storytelling with social and spiritual reflection, making her a prominent voice in contemporary Arabic literature.',
            'photo'=>'http://localhost:8000/storage/img/KhawlaHamdi.jpg',
        ]);
        Author::create([
            'name' => 'Paulo Coelho',
            'about'=>'Paulo Coelho is a Brazilian novelist and lyricist, born on August 24, 1947, in Rio de Janeiro. He is best known for his internationally acclaimed novel The Alchemist, which has sold over 150 million copies and has been translated into more than 80 languages. Before becoming a full-time writer, Coelho worked as a songwriter, theater director, and journalist.
                        His writing blends spirituality, philosophy, and personal growth, often using allegorical storytelling. Many of his novels explore themes like destiny, faith, and the pursuit of one’s dreams. Other notable works include Brida, Veronika Decides to Die, Eleven Minutes, The Zahir, and The Valkyries.
                        Coelho’s personal journey—from rebellion and institutionalization in his youth to spiritual awakening during a pilgrimage to Santiago de Compostela—deeply influences his literary voice. He is also a UN Messenger of Peace and a member of the Brazilian Academy of Letters.',
            'photo'=>'http://localhost:8000/storage/img/PauloCoelho.jpg',
        ]);
    }
}
