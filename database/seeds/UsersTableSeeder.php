<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('users')->insert([
            'name' => 'Paulo Henrique',
            'email' => 'paulo@gmail.com',
            'password' => app('hash')->make('secret'),
            'img' => 'https://d30y9cdsu7xlg0.cloudfront.net/png/15724-200.png'
        ]);
    }
}
