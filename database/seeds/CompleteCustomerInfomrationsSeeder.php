<?php

use Illuminate\Database\Seeder;

class CompleteCustomerInfomrationsSeeder extends Seeder {

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run() {
        factory(\App\Models\Customer::class, 50)
                ->create()
                ->each(function ($customer) {
                    $customer->addresses()
                            ->save(factory(App\Models\Address::class)
                                    ->make());
                });
    }

}
