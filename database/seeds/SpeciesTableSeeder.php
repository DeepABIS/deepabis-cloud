<?php

use App\Species;
use Illuminate\Database\Seeder;

class SpeciesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Species::class, 124)->create()->each(function (Species $species) {
            $user = \App\User::inRandomOrder()->get()->first();
            $species->user()->associate($user);
            $species->save();
        });
    }
}
