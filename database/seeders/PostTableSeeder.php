<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class PostTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('posts')->insert([
            [
                'title'     => "Super Admin",
                'slug'    => "super-admin",
                'thumbnail'    => now(),
                'description'  => Hash::make('superadmin'),
                'content'  => Str::random(10),
                'status'       => 'publish',
                'created_at' => now(),
                'user_id'         => 1

            ],
            [
                'title'     => "The Best Test",
                'slug'    => "the-best-test",
                'thumbnail'    => now(),
                'description'  => Hash::make('superadmin'),
                'content'  => Str::random(10),
                'status'       => 'publish',
                'created_at' => now(),
                'user_id'         => 1

            ], [
                'title'     => "Test",
                'slug'    => "test",
                'thumbnail'    => now(),
                'description'  => Hash::make('superadmin'),
                'content'  => Str::random(10),
                'status'       => 'publish',
                'created_at' => now(),
                'user_id'         => 1

            ], [
                'title'     => "Ini Percobaan",
                'slug'    => "ini-percobaan",
                'thumbnail'    => now(),
                'description'  => Hash::make('superadmin'),
                'content'  => Str::random(10),
                'status'       => 'publish',
                'created_at' => now(),
                'user_id'         => 1

            ], [
                'title'     => "Gagal",
                'slug'    => "gagal",
                'thumbnail'    => now(),
                'description'  => Hash::make('superadmin'),
                'content'  => Str::random(10),
                'status'       => 'publish',
                'created_at' => now(),
                'user_id'         => 1

            ],

        ]);
    }
}
