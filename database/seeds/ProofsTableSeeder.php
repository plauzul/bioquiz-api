<?php

use Illuminate\Database\Seeder;

class ProofsTableSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        DB::table('proofs')->insert([
            'name' => 'UNB'
        ]);

        DB::table('proofs')->insert([
            'name' => 'PAS'
        ]);

        DB::table('proofs')->insert([
            'name' => 'ENEM'
        ]);
    }
}
