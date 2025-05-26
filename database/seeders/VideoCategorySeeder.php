<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class VideoCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('video_categories')->insert([
            [
                'id' => Str::uuid()->toString(),
                'nom' => 'Comedie',
            ],

            [
                'id' => Str::uuid()->toString(),
                'nom' => 'Drame',
            ],
            [
                'id' => Str::uuid()->toString(),
                'nom' => 'Science-fiction'

            ],
            [
                'id' => Str::uuid()->toString(),
                'nom' => 'Action'

            ],
            [
                'id' => Str::uuid()->toString(),
                'nom' => 'Romance'

            ],
            [
                'id' => Str::uuid()->toString(),
                'nom' => 'Adventure'

            ],
            [
                'id' => Str::uuid()->toString(),
                'nom' => 'Horreur'

            ],
            [
                'id' => str::uuid()->toString(),
                'nom' => 'Mystère'
            ],
            [
                'id' => str::uuid()->toString(),
                'nom' => 'Animation'
            ],
            [
                'id' => str::uuid()->toString(),
                'nom' => 'Télé-réalité'
            ],
        ]);
    }
}
