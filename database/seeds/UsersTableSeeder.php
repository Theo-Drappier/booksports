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
          'role' => 0,
          'email' => 'root@root.com',
          'password' => bcrypt('123456')
        ]);

        User::create([
          'name' => 'DRAPPIER',
          'firstname' => 'Theo',
          'birth_date' => '1997-10-19',
          'address' => '1 rue test',
          'phone' => '0606060606',
          'role' => 5,
          'email' => 'theo.drappier@gmail.com',
          'password' => bcrypt('123456')
        ]);

        User::create([
            'name' => 'DRAPPIER',
            'firstname' => 'Theo',
            'birth_date' => '1997-10-19',
            'address' => '1 rue test',
            'phone' => '0606060606',
            'role' => 1,
            'email' => 'theo.drappier@assoc.com',
            'password' => bcrypt('123456')
        ]);
    }
}
