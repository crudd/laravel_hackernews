<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class)->create([
            'email' => 'crudd@cruddco.com',
            'name' => 'crudd',
            'password' => bcrypt('password'),
        ]);
        factory(App\User::class)->create([
            'email' => 'user@user.com',
            'name' => 'user',
            'password' => bcrypt('password'),
        ]);
        $this->call(ItemsTableSeeder::class);
    }
}
