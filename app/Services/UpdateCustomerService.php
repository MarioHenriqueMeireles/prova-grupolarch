<?php

namespace App\Services;

use App\Models\Customer;

class UpdateCustomerService  {

    public function update(array $data, int $customerId) {
        $data['customer']['born_in'] = join("-", array_reverse(explode('/', $data['customer']['born_in'])));
        $customer = Customer::with(['addresses' => function($query) {
                        return $query->orderBy('updated_at', 'desc')->first();
                    }])->find($customerId);
        $address = $customer->addresses->first();
        $address->update($data['address']);
        $data['customer']['born_in'] = join("-",array_reverse(explode('/', $data['customer']['born_in'])));
        $customer->update($data['customer']);
        
        return $customer;
    }

}
