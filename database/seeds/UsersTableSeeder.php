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
        	'name' => 'Pepe108',
        	'email' => 'pepe108@gmail.com',
        	'password' => bcrypt('elpepepepe')

    	]);
    }
}
