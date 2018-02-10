<?php

use App\Models\Property;
use Illuminate\Database\Seeder;

class PropertiesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(Property::class, 10)->create();
    }
}
