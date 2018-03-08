<?php

use Illuminate\Database\Seeder;
use App\Fields;

class FieldsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Fields::create([
          'name' => 'Salle A',
          'sport_complex_id' => 1,
          'sport_id' => 1
        ]);
        Fields::create([
          'name' => 'Salle B',
          'sport_complex_id' => 1,
          'sport_id' => 2
        ]);
    }
}
