<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class PostSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {

        for ($i = 0; $i < 100; $i++) {
            // Generate a random integer between 0 and 1
            $randomInt = random_int(0, 1);

            // Convert the random integer to a boolean value
            $booleanValue = (bool) $randomInt;

            DB::table('posts')->insert([
                'title' => Str::random(15),
                'description' => Str::random(300),
                'author' => Str::random(10),
                'status' => $booleanValue,
            ]);
        }
    }
}
