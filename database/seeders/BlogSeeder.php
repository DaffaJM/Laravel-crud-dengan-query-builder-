<?php

namespace Database\Seeders;

use App\Models\Blog;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('blogs')->truncate();
        
        Blog::factory()
            ->count(50)
            ->create();
        // DB::table('blogs')->insert([
        //     'title' => 'blog 1',
        //     'description' => 'lorem ipsum sit amet dolur', 
        // ]);
    }
}
