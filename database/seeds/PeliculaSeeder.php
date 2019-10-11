<?php

use Illuminate\Database\Seeder;

class PeliculaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Models\Pelicula::class, 50)->create()->each(function ($pelicula) {
            $pelicula->posts()->save(factory(App\Post::class)->make());
        });
    }
}
