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
    	DB::table('users')->delete();

        DB::table('users')->insert([
            'name' => 'Jitender Kumar Singla',
            'email' => 'jitendersingla9@gmail.com',
            'username' => 'jitendersingla9',
            'password' => bcrypt('admin123'),
        ]);
    }
}
