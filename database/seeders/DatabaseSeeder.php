<?php

namespace Database\Seeders;

use App\Models\Post;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Storage;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Storage::deleteDirectory('posts');
        Storage::makeDirectory('posts');
        //Storage::deleteDirectory('posts');
        // \App\Models\User::factory(10)->create();
        //Storage::makeDirectory('posts');
        Post::factory(20)->create();
    }
}
