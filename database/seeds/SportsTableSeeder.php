<?php

use Illuminate\Database\Seeder;
use App\Sports;

class SportsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Sports::create([
        'name' => 'Basketball'
      ]);
      Sports::create([
        'name' => 'Football'
      ]);
      Sports::create([
        'name' => 'Handball'
      ]);
      Sports::create([
        'name' => 'Tennis'
      ]);
      Sports::create([
        'name' => 'Badminton'
      ]);
    }
}
