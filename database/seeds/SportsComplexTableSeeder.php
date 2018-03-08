<?php

use Illuminate\Database\Seeder;
use App\SportsComplex;

class SportsComplexTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      SportsComplex::create([
        'name' => 'Complexe sportif 1',
        'address' => 'Rue de tassigny',
      ]);
    }
}
