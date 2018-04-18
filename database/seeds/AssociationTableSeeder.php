<?php

use Illuminate\Database\Seeder;
use App\Associations;

class AssociationTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Associations::create([
            'name' => 'Basket club'
        ]);

        Associations::create([
            'name' => 'Foot Club'
        ]);
    }
}
