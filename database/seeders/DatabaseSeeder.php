<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\{Category, User, Post};
use Illuminate\Database\QueryException;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        $user = User::factory()->create([
            'name' => 'Jonathan Zed',
            'username' => 'jonathanzed'
        ]);

        try {
            Post::factory(10)->create([
                'user_id' => $user->id
            ]);
        } catch (QueryException $e) {

        }
    }
}
