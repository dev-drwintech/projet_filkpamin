<?php

namespace Database\Seeders;

use App\Models\coming_videos as ComingVideo;
use Illuminate\Database\Seeder;

class ComingVideoSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $videos = [
            [
                'title' => 'Deadpool',
                'duration' => '2h 14min',
                'genres' => ['Comédie', 'Romance', 'Action'],
                'description' => "L'intérêt d'utiliser Lorem Ipsum est qu'il a une distribution de lettres plus ou moins normale, contrairement à l'utilisation de « Contenu ici ».",
                'image' => './img/covers/deadpoom.webp'
            ],
            [
                'title' => "L'évasion",
                'duration' => '1h45',
                'genres' => ['Action', 'Thriller'],
                'description' => "Un prisonnier cherche à s'échapper d'une prison de haute sécurité, avec l'aide d'alliés inattendus.",
                'image' => './img/covers/cover3.jpg'
            ],
            [
                'title' => 'X-Men',
                'duration' => '1h45',
                'genres' => ['Science-Fiction', 'Action'],
                'description' => "Des mutants dotés de pouvoirs extraordinaires luttent pour leur place dans une société qui les craint.",
                'image' => './img/covers/cover2.jpg'
            ],
            [
                'title' => 'Le Royaume Perdu',
                'duration' => '2h05',
                'genres' => ['Aventure', 'Fantastique'],
                'description' => "Une équipe d'explorateurs découvre un royaume oublié au cœur de la jungle amazonienne.",
                'image' => './img/covers/cover4.jpg'
            ],
            [
                'title' => 'Odyssée Spatiale',
                'duration' => '2h30',
                'genres' => ['Science-Fiction', 'Drame'],
                'description' => "Un voyage interstellaire qui teste les limites de l'humanité et de la technologie.",
                'image' => './img/covers/cover2.jpg'
            ],
            [
                'title' => 'La Dernière Mission',
                'duration' => '1h55',
                'genres' => ['Action', 'Guerre'],
                'description' => "Un groupe de soldats d'élite est envoyé pour une mission de sauvetage périlleuse en territoire ennemi.",
                'image' => './img/covers/cover2.jpg'
            ],
        ];

        foreach ($videos as $video) {
            // On utilise le chemin sans le asset() car Laravel le gèrera lors de l'affichage
            $video['image'] = str_replace("{{ asset('", "", str_replace("') }}", "", $video['image']));
            ComingVideo::create($video);
        }
    }
}