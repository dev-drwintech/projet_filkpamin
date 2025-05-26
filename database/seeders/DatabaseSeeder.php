<?php

namespace Database\Seeders;

use App\Models\Comment;
use App\Models\CommentLike;
use App\Models\Review;
use App\Models\User;
use App\Models\Video;
use App\Models\VideoLike;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleSeeder::class);

         User::factory(0)->create();
         $this->call(UserSeeder::class);
       //  Video::factory(10)->create();
       $this->call(VideoCategorySeeder::class);
       // $this->call(GeneratedVideosTableSeeder::class);
        //Review::factory(10)->create();
        //Comment::factory(10)->create();
        //VideoLike::factory(10)->create();
        //CommentLike::factory(10)->create();
    }
}
