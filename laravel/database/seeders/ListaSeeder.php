<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Lista;

class ListaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        Lista::truncate();

        $faker = \Faker\Factory::create();

        // for( $lista = 0; $lista < 10; $lista++) {
        //     Lista::create([
        //         "username" => $faker->username,
        //         'title' => $faker->title,
        //         'description' => $faker->description
        //     ]);
        // }

        // Lista::factory()->count(1)->create();

        Lista::create([
            'title' => $faker->sentence(),
            'description' => $faker->paragraph(),
            'username' => "bebop23",
            'user_list_count' => 1,
            "public" => 1,
        ]);

        Lista::create([
            'title' => $faker->sentence(),
            'description' => $faker->paragraph(),
            'username' => "bebop23",
            'user_list_count' => 2,
            "public" => 0,
        ]);

        Lista::create([
            'title' => $faker->sentence(),
            'description' => $faker->paragraph(),
            'username' => "pedro",
            'user_list_count' => 1,
            "public" => 1,
        ]);

        Lista::create([
            'title' => $faker->sentence(),
            'description' => $faker->paragraph(),
            'username' => "pedro",
            'user_list_count' => 2,
            "public" => 0,
        ]);
    }
}
