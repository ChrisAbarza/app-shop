<?php

use Illuminate\Database\Seeder;
use App\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
        	'name' => 'cabarza',
        	'email' => 'salv888@gmail.com',
        	'password' => bcrypt('elitegroup'),
            'admin' => true

    	]);
    }
}
