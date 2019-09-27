<?php

use Faker\Factory;
use Illuminate\Database\Seeder;
use App\Packages\Address\Models\Address;

class AddressesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         factory(Address::class,20)->create();
    }

}
