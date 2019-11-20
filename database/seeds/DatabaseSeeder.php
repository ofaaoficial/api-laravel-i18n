<?php

use Illuminate\Database\Seeder;
use App\User;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UsersTableSeeder::class);

        User::create([
            'name' => 'Oscar Amado',
            'email' => 'oscarfamado@gmail.com',
            'password' => bcrypt('oscar123')
        ]);
    }
}
