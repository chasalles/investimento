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
    	User::create([
    		'cpf'			=> '11133322245', 
    		'name'			=> 'João Salles', 
    		'phone'			=> '4532522525', 
    		'birth'			=> '2016-06-14', 
    		'gender'		=> 'M',
    		'email'			=> 'salles@hotmail.com', 
    		'password'		=> env('PASSWORD_HASH') ? bcrypt('123456') : '123456',
    	]);
        // $this->call(UsersTableSeeder::class);
    }
}
