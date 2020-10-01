<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \App\posts::insert([
            'title' => 'John Doe',
            'category' => 'Laravel'
        ]);
    }
}
