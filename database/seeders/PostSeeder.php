<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        Post::factory(10)->create();

        /* Post::factory()->create([
             'name' => 'Test User',
             'type' => 'test',
         ]);

         $this->call(PropertSeeder::class); */
    }
}
