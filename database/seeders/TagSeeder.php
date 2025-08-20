<?php

namespace Database\Seeders;

use Illuminate\Support\Str;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Tag;

class TagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $tags = collect(['Fantastique', 'Drame', 'Humour', 'Creation', 'Saga', 'Action', 'Romance']);

        $tags->each(fn($tag) => Tag::create([

            'name'=> $tag,
            'slug'=> Str::slug($tag),

        ]));
    }
}
