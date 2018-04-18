<?php

use Illuminate\Database\Seeder;
use App\AssociationUser;

class AssociationUserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        AssociationUser::create([
            'user_id' => 3,
            'association_id' => 1
        ]);
    }
}
