<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        DB::table('users')->truncate();
        DB::table('news')->truncate();
        DB::table('rtfs')->truncate();
        DB::table('ads')->truncate();

        $this->call(UsersTableSeeder::class);
        $this->call(NewsTableSeeder::class);
        $this->call(AdTableSeeder::class);

        Model::reguard();
    }
}
