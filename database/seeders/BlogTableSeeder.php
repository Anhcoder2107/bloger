<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\DB;

class BlogTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // $fake  = Faker\Factory::create();
        $limit = 4;

        for ($i = 0; $i < $limit; $i++){
            DB::table('blogs')->insert([
                'authorBlog' => fake()->name(),
                'releaseDateBlog' => now(),
                'titleBlog' => fake()->sentence(),    
                'postBlog' => fake()->text(100),
                'photoBlog' => fake()->imageUrl($width = 200, $height = 200),
                'created_at' => date("Y-m-d H:i:s"),
                'updated_at' => date("Y-m-d H:i:s"),
            ]);
        }
    }
}
