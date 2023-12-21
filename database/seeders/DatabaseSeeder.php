<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Post;
use App\Models\User;
use App\Models\Category;
use Illuminate\Database\Seeder;


class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        User::create([
            'name'=>'Ruly Abdul Rasyid',
            'username'=> 'ruly',
            'email'=>'ruly@gmail.com',
            'password'=> bcrypt('password'),
        ]);

        User::factory(3)->create();

        Post::factory(30)->create();

        Category::create([
            'name'=> 'Web Programming',
        ]);

        Category::create([
            'name'=> 'Car',
        ]);

        Category::create([
            'name'=> 'Nature',
        ]);

        Category::create([
            'name'=> 'Book',
        ]);
    }
}
