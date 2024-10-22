<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        DB::statement('SET FOREIGN_KEY_CHECKS=0;');

        \App\Models\Post::truncate();
        \App\Models\User::truncate();

        DB::statement('SET FOREIGN_KEY_CHECKS=1;');

        \App\Models\User::factory(1)->create();

        $this->call([
            PostSeeder::class,
        ]);
    }
}
