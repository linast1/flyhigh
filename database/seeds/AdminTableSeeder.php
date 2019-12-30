<?php

use Illuminate\Database\Seeder;

class AdminTableSeeder extends Seeder
{

    public function run()
    {
        DB::table('site_admin')->insert([
            'username' => 'admin',
            'password' => bcrypt('admin'),
        ]);

    }

}
