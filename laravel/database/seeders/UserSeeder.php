<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

use JWTAuth;
use AppHelper;
use Tymon\JWTAuth\Exceptions\JWTException;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Let's truncate our existing records to start from scratch.
        User::truncate();

        $faker = \Faker\Factory::create();

        $user = User::create([
            'username' => 'bebop23',
            "description" => $faker->text(),
            'email' => 'bebop23@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $token = JWTAuth::fromUser($user);
        AppHelper::instance()->generateStarterPackLists( $user );

        $user = User::create([
            'username' => 'pedro',
            "description" => $faker->text(),
            'email' => 'pedro@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

        $token = JWTAuth::fromUser($user);
        AppHelper::instance()->generateStarterPackLists( $user );

        //Admin
        $user = User::create([
            'username' => 'root',
            'email' => 'root@gmail.com',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi', // password
        ]);

    }
}
