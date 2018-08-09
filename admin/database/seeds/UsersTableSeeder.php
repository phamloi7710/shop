<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
        	'name'      =>'Phạm Lợi',
            'username'  =>    'admin',
            'email'     =>  'phamloi7710@gmail.com',
            'password'  =>  bcrypt('admin'),
            'isAdmin'   => 'true',
        ]);
    }
}
