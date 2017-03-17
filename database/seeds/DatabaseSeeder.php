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
        factory(App\Vote::class)->create([
            'link_id' => 2,
            'user_id' => 1,
        ]);
        $this->call(LinksTableSeeder::class);
    }
}
