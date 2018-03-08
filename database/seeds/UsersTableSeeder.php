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
          'name' => 'root',
          'firstname' => 'root',
          'birth_date' => '1997-10-19',
          'address' => '1 rue test',
          'phone' => '0606060606',
          'email' => 'root@root.com',
          'password' => bcrypt('123456')
        ]);
    }
}